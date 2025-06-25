<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreVisitorRequest;
use App\Http\Requests\Auth\UpdateVisitorRequest;
use App\Models\Company;
use App\Models\ProfessionalVisit;
use App\Models\Visit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $visitors = Visit::with(['professionalVisit.company', 'familyVisit'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($visit) {
                if ($visit->professionalVisit) {
                    $visit->visit_type = 'professional';
                } else {
                    $visit->visit_type = 'family';
                }
                return $visit;
            });

        return response()->json([
            'visitors' => $visitors
        ], 200);
    }

    public function store(StoreVisitorRequest $request)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $validatedData = $request->validated();

        $visit = Visit::create([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'email' => $validatedData['email'],
        ]);

        if ($validatedData['visit_type'] == 'professional') {
            $company = Company::updateOrCreate(
                [
                    'CIF' => $validatedData['CIF'],
                ],
                [
                    'name' => $validatedData['company_name'],
                    'telephone' => $validatedData['company_telephone'],
                ]
            );

            ProfessionalVisit::create([
                'visit_id' => $visit->id,
                'NIF' => $validatedData['NIF'],
                'age' => $validatedData['age'],
                'company_id' => $company->id,
            ]);
        }

        return response()->json([
            'message' => 'Visitor stored',
        ], 200);
    }

    public function update(UpdateVisitorRequest $request, string $id)
    {
        $userOrResponse = $this->authenticateUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        $validatedData = $request->validated();

        $visitor = Visit::findOrFail($id);

        $visitor->update([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'email' => $validatedData['email'],
        ]);


        if ($validatedData['visit_type'] == 'professional') {
            $company = Company::where('CIF', $validatedData['CIF'])->firstOrFail();

            $professionalVisit = ProfessionalVisit::where('visit_id', $visitor->id)->firstOrFail();

            $professionalVisit->update([
                'NIF' => $validatedData['NIF'],
                'age' => $validatedData['age'],
                'company_id' => $company->id,
            ]);
        }

        return response()->json([
            'message' => 'Visitor updated successfully',
        ], 200);
    }
}
