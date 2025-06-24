<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreEntryRequest;
use App\Http\Requests\Auth\UpdateEntryRequest;
use App\Http\Requests\Auth\UpdateFamilyVisitRequest;
use App\Mail\ProfessionalVisitExitMail;
use App\Models\Company;
use App\Models\EntryExit;
use App\Models\FamilyVisit;
use App\Models\ProfessionalService;
use App\Models\ProfessionalVisit;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class EntryExitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userOrResponse = $this->authenticateUser($request);
        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $query = EntryExit::with([
            'visit.familyVisit.motive',
            'visit.professionalVisit.company',
            'professionalService.service',
        ]);

        $visitState = $request->input('visit_state', 'all');

        if ($request->has('visit_type')) {
            $query->where('visit_type', $request->visit_type);

            if ($request->visit_type === 'family') {
                $query->whereHas('visit.familyVisit', function ($q) use ($request) {
                    if ($request->filled('student_name')) {
                        $q->where('student_name', 'like', '%' . $request->student_name . '%');
                    }
                    if ($request->filled('student_surname')) {
                        $q->where('student_surname', 'like', '%' . $request->student_surname . '%');
                    }
                    if ($request->filled('student_course')) {
                        $q->where('student_course', 'like', '%' . $request->student_course . '%');
                    }
                    if ($request->filled('motive_id')) {
                        $q->where('motive_id', $request->motive_id);
                    }
                });
            }

            if ($request->visit_type === 'professional') {
                $query->whereHas('visit.professionalVisit', function ($q) use ($request) {
                    if ($request->filled('professional_NIF')) {
                        $q->where('NIF', 'like', '%' . $request->professional_NIF . '%');
                    }
                    if ($request->filled('professional_age')) {
                        $q->where('age', 'like', '%' . $request->professional_age . '%');
                    }
                    if ($request->filled('company_name')) {
                        $q->whereHas('company', function ($q2) use ($request) {
                            $q2->where('name', 'like', '%' . $request->company_name . '%');
                        });
                    }
                    if ($request->filled('company_telephone')) {
                        $q->whereHas('company', function ($q2) use ($request) {
                            $q2->where('telephone', 'like', '%' . $request->company_telephone . '%');
                        });
                    }
                    if ($request->filled('company_CIF')) {
                        $q->whereHas('company', function ($q2) use ($request) {
                            $q2->where('CIF', 'like', '%' . $request->company_CIF . '%');
                        });
                    }
                });

                $query->whereHas('professionalService', function ($q) use ($request) {
                    if ($request->filled('service_id')) {
                        $q->where('service_id', $request->service_id);
                    }
                    if ($request->filled('task')) {
                        $q->where('task', 'like', '%' . $request->task . '%');
                    }
                });
            }
        }

        if ($request->filled('visit_name')) {
            $query->whereHas('visit', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->visit_name . '%');
            });
        }

        if ($request->filled('visit_surname')) {
            $query->whereHas('visit', function ($q) use ($request) {
                $q->where('surname', 'like', '%' . $request->visit_surname . '%');
            });
        }

        if ($request->filled('visit_email')) {
            $query->whereHas('visit', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->visit_email . '%');
            });
        }

        $date_entry = $request->input('date_entry');
        $date_exit  = $request->input('date_exit');
        $time_entry = $request->input('time_entry');
        $time_exit  = $request->input('time_exit');

        if ($date_entry && !$date_exit && !$time_entry && !$time_exit) {
            $query->whereDate('date_entry', '>=', $date_entry);
        } elseif (!$date_entry && $date_exit && !$time_entry && !$time_exit) {
            $query->whereDate('date_exit', '<=', $date_exit);
        } elseif ($date_entry && $date_exit && !$time_entry && !$time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ]);
        } elseif ($date_entry && $date_exit && $time_entry && $time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ])
                ->whereTime('date_entry', '>=', $time_entry)
                ->whereTime('date_exit', '<=', $time_exit);
        } elseif ($date_entry && $date_exit && $time_entry && !$time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ])->whereTime('date_entry', '>=', $time_entry);
        } elseif ($date_entry && $date_exit && !$time_entry && $time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ])->whereTime('date_exit', '<=', $time_exit);
        } elseif (!$date_entry && !$date_exit && $time_entry && !$time_exit) {
            $query->whereTime('date_entry', '>=', $time_entry);
        } elseif (!$date_entry && !$date_exit && !$time_entry && $time_exit) {
            $query->whereTime('date_exit', '<=', $time_exit);
        } elseif ($date_entry && !$date_exit && $time_entry && !$time_exit) {
            $start = $date_entry . ' ' . $time_entry;
            $query->where('date_entry', '>=', $start);
        } elseif ($date_entry && !$date_exit && !$time_entry && $time_exit) {
            $end = $date_entry . ' ' . $time_exit;
            $query->where('date_entry', '>=', $date_entry)
                ->where('date_exit', '<=', $end);
        }

        if ($visitState === 'active') {
            $query->whereNull('date_exit');
        } elseif ($visitState === 'finished') {
            $query->whereNotNull('date_exit');
        }

        $query->orderBy('date_entry', 'desc');

        $perPage = $request->input('per_page', 10);
        $entryExits = $query->paginate($perPage);

        return response()->json($entryExits, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEntry(StoreEntryRequest $request)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $user = $userOrResponse;
        $validatedData = $request->validated();

        DB::beginTransaction();

        try {
            $visit = Visit::updateOrCreate(
                ['email' => $validatedData['email']],
                [
                    'name' => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                ]
            );

            $entry = EntryExit::create(
                [
                    'user_id' => $user->id,
                    'visit_id' => $visit->id,
                    'visit_type' => $validatedData['visit_type'],
                    'date_entry' => now(),
                    'date_exit' => null,
                ]
            );
            // "Failed to store entry: SQLSTATE[HY000]: General error: 1364 Field 'entry_exit_id' doesn't have a default value (Connection: mysql, SQL: insert into `family_visits` (`visit_id`, `student_name`, `student_surname`, `student_course`, `motive_id`, `custom_motive`, `updated_at`, `created_at`) values (1, asd, dasd, 3 ESO, 1, asdasdasd, 2025-06-22 21:01:25, 2025-06-22 21:01:25))"
            //   }
            if ($validatedData['visit_type'] == 'family') {
                FamilyVisit::create(
                    [
                        'entry_exit_id' => $entry->id,
                        'visit_id' => $visit->id,
                        'student_name' => $validatedData['student_name'],
                        'student_surname' => $validatedData['student_surname'],
                        'student_course' => $validatedData['student_course'],
                        'motive_id' => $validatedData['motive_id'],
                        'custom_motive' => $validatedData['custom_motive'],
                    ]
                );
            } elseif ($validatedData['visit_type'] == 'professional') {
                $company = Company::updateOrCreate(
                    ['CIF' => $validatedData['CIF']],
                    [
                        'name' => $validatedData['company_name'],
                        'telephone' => $validatedData['company_telephone'],
                    ]
                );

                $professionalVisit = ProfessionalVisit::updateOrCreate(
                    ['NIF' => $validatedData['NIF']],
                    [
                        'visit_id' => $visit->id,
                        'age' => $validatedData['age'],
                        'company_id' => $company->id,
                    ]
                );

                ProfessionalService::create(
                    [
                        'entry_exit_id' => $entry->id,
                        'professional_id' => $professionalVisit->id,
                        'task' => $validatedData['task'],
                        'service_id' => $validatedData['service_id'],
                    ]
                );
            }

            DB::commit();

            return response()->json([
                'message' => 'Entry stored successfully',
                'entry' => $entry,
                'visit' => $visit,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to store entry: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function storeExit(Request $request, string $id)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }
        try {
            $entryExit = EntryExit::findOrFail($id);
            $entryExit->date_exit = now();

            if ($entryExit->visit_type == 'professional') {
                $visit = $entryExit->visit;
                $professional = $visit->professionalVisit;
                $company = $professional->company;

                $pdf1 = Pdf::loadView('pdf.annex_a', [
                    'visit' => $visit,
                    'entry' => $entryExit,
                    'professional' => $professional,
                    'company' => $company,
                ]);

                $pdf2 = Pdf::loadView('pdf.annex_b', [
                    'visit' => $visit,
                    'professional' => $professional,
                ]);

                $pdf3 = Pdf::loadView('pdf.annex_c', [
                    'visit' => $visit,
                    'professional' => $professional,
                ]);

                $pdf4 = Pdf::loadView('pdf.annex_d', [
                    'visit' => $visit,
                    'professional' => $professional,
                    'company' => $company,
                ]);

                $pdf5 = Pdf::loadView('pdf.annex_e', [
                    'visit' => $visit,
                    'professional' => $professional,
                    'company' => $company,
                ]);

                Mail::to($visit->email)->send(new ProfessionalVisitExitMail([
                    'annex_a.pdf' => $pdf1->output(),
                    'annex_b.pdf' => $pdf2->output(),
                    'annex_c.pdf' => $pdf3->output(),
                    'annex_d.pdf' => $pdf4->output(),
                    'annex_e.pdf' => $pdf5->output()
                ], $visit->name));
            }

            $entryExit->save();

            return response()->json([
                'message' => 'Exit stored successfully',
                'entry-exit' => $entryExit
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al almacenar la salida o enviar el correo: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $entryExit = EntryExit::with(['visit.familyVisit', 'visit.professionalVisit'])->findOrFail($id);

        return response()->json([
            'entry-exit' => $entryExit,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEntry(UpdateEntryRequest $request, string $id)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $validated = $request->validated();
        DB::beginTransaction();

        try {
            $entry = EntryExit::findOrFail($id);

            $entry->date_entry = $validated['date_entry'];

            $entry->date_exit = $validated['date_exit'] ?? null;

            $entryNewVisitType = $validated['visit_type'];

            $visit = Visit::where('email', $validated['email'])->first();

            if (!$visit) {
                $visit = Visit::create([
                    'email' => $validated['email'],
                    'name' => $validated['name'],
                    'surname' => $validated['surname']
                ]);
            } else {
                $visit->update([
                    'name' => $validated['name'],
                    'surname' => $validated['surname']
                ]);
            }
            $entry->visit_id = $visit->id;
            $entry->visit_type = $entryNewVisitType;

            if ($entry->visit_type != $entryNewVisitType) {
                if ($entryNewVisitType == "professional") {
                    FamilyVisit::destroy($validated['family_visit_id']);

                    $company = Company::updateOrCreate(
                        ['CIF' => $validated['CIF']],
                        [
                            'name' => $validated['company_name'],
                            'telephone' => $validated['company_telephone'],
                        ]
                    );

                    $professionalVisit = ProfessionalVisit::updateOrCreate(
                        ['NIF' => $validated['NIF']],
                        [
                            'visit_id' => $visit->id,
                            'age' => $validated['age'],
                            'company_id' => $company->id,
                        ]
                    );

                    ProfessionalService::create([
                        'entry_exit_id' => $entry->id,
                        'professional_id' => $professionalVisit->id,
                        'service_id' => $validated['service_id'],
                        'task' => $validated['task'],
                    ]);
                } else {
                    ProfessionalService::where('entry_exit_id', $entry->id)->delete();

                    FamilyVisit::create(
                        [
                            'visit_id' => $visit->id,
                            'student_name' => $validated['student_name'],
                            'student_surname' => $validated['student_surname'],
                            'student_course' => $validated['student_course'],
                            'motive_id' => $validated['motive_id'],
                            'custom_motive' => $validated['custom_motive'],
                        ]
                    );
                }
            }

            if ($entry->visit_type == $entryNewVisitType) {
                if ($entryNewVisitType == "family") {
                    FamilyVisit::where('id', $validated['family_visit_id'])->update([
                        'visit_id' => $visit->id,
                        'student_name' => $validated['student_name'],
                        'student_surname' => $validated['student_surname'],
                        'student_course' => $validated['student_course'],
                        'motive_id' => $validated['motive_id'],
                        'custom_motive' => $validated['custom_motive'],
                    ]);
                } else {
                    $company = Company::updateOrCreate(
                        ['CIF' => $validated['CIF']],
                        [
                            'name' => $validated['company_name'],
                            'telephone' => $validated['company_telephone'],
                        ]
                    );

                    $professionalVisit = ProfessionalVisit::updateOrCreate(
                        ['NIF' => $validated['NIF']],
                        [
                            'visit_id' => $visit->id,
                            'age' => $validated['age'],
                            'company_id' => $company->id,
                        ]
                    );

                    ProfessionalService::where('entry_exit_id', $entry->id)->update([
                        'professional_id' => $professionalVisit->id,
                        'service_id' => $validated['service_id'],
                        'task' => $validated['task'],
                    ]);
                }
            }

            $entry->save();

            DB::commit();

            return response()->json([
                'message' => 'Visit updated successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to update visit: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        try {
            $entryExit = EntryExit::findOrFail($id);
            $entryExit->delete();

            return response()->json(['message' => 'Entry successfully deleted '], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to deleting entry: ' . $e->getMessage(),], 500);
        }
    }
}
