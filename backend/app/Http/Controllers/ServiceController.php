<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreServiceRequest;
use App\Http\Requests\Auth\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
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

        if ($userOrResponse['admin'] == true) {
            $services = Service::all();
        } else {
            $services = Service::where('enabled', true)->get();
        }


        return response()->json([
            'services' => $services
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $validatedData = $request->validated();
        $validatedData['enabled'] = $request->has('enabled') ? (bool)$request->input('enabled') : false;
        $service = new Service($validatedData);

        $service->save();

        return response()->json([
            'message' => 'Service stored',
            'service' => $service,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $service = Service::findOrFail($id);

        return response()->json([
            'service' => $service
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $service = Service::findOrFail($id);

        $validatedData = $request->validated();
        $service->enabled = (bool) $validatedData['enabled'];

        $service->update($validatedData);

        return response()->json([
            'message' => 'Service updated successfully',
            'service' => $service
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $service = Service::findOrFail($id);
        $service->enabled = false;

        $service->save();

        return response()->json([], 204);
    }
}
