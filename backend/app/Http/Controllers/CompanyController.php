<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreCompanyRequest;
use App\Http\Requests\Auth\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $companies = Company::all();

        return response()->json([
            'companies' => $companies
        ], 200);
    }

    public function store(StoreCompanyRequest $request)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $validatedData = $request->validated();

        $company = new Company([
            'name' => $validatedData['name'],
            'CIF' => $validatedData['CIF'],
            'telephone' => $validatedData['telephone'],
            'enabled' => true,
        ]);

        $company->save();

        return response()->json([
            'message' => 'Company stored',
            'company' => $company,
        ], 200);
    }


    public function update(UpdateCompanyRequest $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $company = Company::findOrFail($id);

        $validatedData = $request->validated();

        $company->enabled = (bool) $validatedData['enabled'];

        $company->update($validatedData);

        return response()->json([
            'message' => 'Company updated successfully',
            'company' => $company
        ], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $company = Company::findOrFail($id);
        $company->enabled = false;

        $company->save();

        return response()->json([], 204);
    }

    public function enable(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $company = Company::findOrFail($id);
        $company->enabled = true;

        $company->save();

        return response()->json([], 204);
    }
}
