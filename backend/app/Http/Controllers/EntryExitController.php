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

class EntryExitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEntry(StoreEntryRequest $request)
    {
        // AÑADIR: MANEJAR ENVIO DE MAIL
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $user = $userOrResponse;
        $validatedData = $request->validated();

        DB::beginTransaction();

        try {
            $visit = new Visit();
            $visit->name = $validatedData['name'];
            $visit->surname = $validatedData['surname'];
            $visit->email = $validatedData['email'];
            $visit->save();

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
                        'telephone' => $validatedData['telephone'],
                    ]
                );
                $professionalVisit = new ProfessionalVisit();
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
    public function show(string $id)
    {
        //
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