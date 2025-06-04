<?php

namespace App\Http\Controllers;

use App\Models\FamilyVisit;
use App\Models\Visit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function update(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $visit = Visit::findOrFail($id);
        
        $validatedData = $request->validated();
        $service->enabled = (bool) $validatedData['enabled'];

        $service->update($validatedData);

        return response()->json([
            'message' => 'Service updated successfully',
            'service' => $service
        ], 200);
    }
}
