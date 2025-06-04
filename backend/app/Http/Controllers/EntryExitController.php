<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreEntryRequest;
use App\Models\Company;
use App\Models\EntryExit;
use App\Models\FamilyVisit;
use App\Models\ProfessionalVisit;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // TODO: CAMBIAR A SWITCH
        $date_entry = $request->input('date_entry');
        $date_exit  = $request->input('date_exit');
        $time_entry = $request->input('time_entry');
        $time_exit  = $request->input('time_exit');

        if ($date_entry && !$date_exit && !$time_entry && !$time_exit) {
            $query->whereDate('date_entry', '>=', $date_entry);
        }

        elseif (!$date_entry && $date_exit && !$time_entry && !$time_exit) {
            $query->whereDate('date_exit', '<=', $date_exit);
        }

        elseif ($date_entry && $date_exit && !$time_entry && !$time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ]);
        }

        elseif ($date_entry && $date_exit && $time_entry && $time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ])
                ->whereTime('date_entry', '>=', $time_entry)
                ->whereTime('date_exit', '<=', $time_exit);
        }

        elseif ($date_entry && $date_exit && $time_entry && !$time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ])->whereTime('date_entry', '>=', $time_entry);
        }

        elseif ($date_entry && $date_exit && !$time_entry && $time_exit) {
            $query->whereBetween('date_entry', [
                $date_entry . ' 00:00:00',
                $date_exit . ' 23:59:59'
            ])->whereTime('date_exit', '<=', $time_exit);
        }

        elseif (!$date_entry && !$date_exit && $time_entry && !$time_exit) {
            $query->whereTime('date_entry', '>=', $time_entry);
        }

        elseif (!$date_entry && !$date_exit && !$time_entry && $time_exit) {
            $query->whereTime('date_exit', '<=', $time_exit);
        }

        elseif ($date_entry && !$date_exit && $time_entry && !$time_exit) {
            $start = $date_entry . ' ' . $time_entry;
            $query->where('date_entry', '>=', $start);
        }

        elseif ($date_entry && !$date_exit && !$time_entry && $time_exit) {
            $end = $date_entry . ' ' . $time_exit;
            $query->where('date_entry', '>=', $date_entry)
                ->where('date_exit', '<=', $end);
        }

        if ($visitState === 'active') {
            $query->whereNull('date_exit');
        } elseif ($visitState === 'finished') {
            $query->whereNotNull('date_exit');
        }

        $query->orderBy('date_entry', 'desc'); // Ordena por fecha de entrada de la mas nueva a la mas antigua

        $perPage = $request->input('per_page', 10);
        $entryExits = $query->paginate($perPage);

        return response()->json($entryExits, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEntry(StoreEntryRequest $request)
    {
        // TODO: MANEJAR ENVIO DE MAIL
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $user = $userOrResponse;
        $validatedData = $request->validated();

        DB::beginTransaction();

        try {
            $visit = Visit::firstOrCreate(
                ['email' => $validatedData['email']],
                [
                    'name' => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                ]
            );

            $entry = new EntryExit();
            $entry->user_id = $user->id;
            $entry->visit_id = $visit->id;
            $entry->visit_type = $validatedData['visit_type'];
            $entry->date_entry = now();
            $entry->date_exit = null;
            $entry->save();

            if ($validatedData['visit_type'] === 'family') {
                $familyVisit = new FamilyVisit();
                $familyVisit->visit_id = $visit->id;
                $familyVisit->student_name = $validatedData['student_name'];
                $familyVisit->student_surname = $validatedData['student_surname'];
                $familyVisit->student_course = $validatedData['student_course'];
                $familyVisit->motive_id = $validatedData['motive_id'];
                $familyVisit->custom_motive = $validatedData['custom_motive'] ?? null;
                $familyVisit->save();
            } elseif ($validatedData['visit_type'] === 'professional') {
                $company = Company::firstOrCreate(
                    ['CIF' => $validatedData['CIF']],
                    [
                        'name' => $validatedData['company_name'],
                        'telephone' => $validatedData['company_telephone'],
                    ]
                );

                $professionalVisit = ProfessionalVisit::firstOrCreate(
                    ['NIF' => $validatedData['NIF']],
                    [
                        'visit_id' => $visit->id,
                        'age' => $validatedData['age'],
                        'task' => $validatedData['task'],
                        'service_id' => $validatedData['service_id'],
                        'company_id' => $company->id,
                    ]
                );
                $professionalVisit->visit_id = $visit->id;
                $professionalVisit->NIF = $validatedData['NIF'];
                $professionalVisit->age = $validatedData['age'];
                $professionalVisit->task = $validatedData['task'];
                $professionalVisit->service_id = $validatedData['service_id'];
                $professionalVisit->company_id = $company->id;
                $professionalVisit->save();
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

        $entryExit = EntryExit::findOrFail($id);
        $entryExit->date_exit = now();

        $entryExit->save();

        return response()->json([
            'message' => 'Exit store successfully',
            'entry-exit' => $entryExit
        ], 200);
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
    public function update(Request $request, string $id)
    {
        //
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

        DB::beginTransaction();

        try {
            $entryExit = EntryExit::findOrFail($id);

            if ($entryExit->visit_type === 'family' && $entryExit->visit->familyVisit) {
                $entryExit->visit->familyVisit->delete();
            }

            if ($entryExit->visit_type === 'professional' && $entryExit->visit->professionalVisit) {
                $entryExit->visit->professionalVisit->delete();
            }

            $entryExit->visit->delete();
            $entryExit->delete();

            DB::commit();

            return response()->json([], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error to deleting entry: ' . $e->getMessage(),], 500);
        }
    }
}
