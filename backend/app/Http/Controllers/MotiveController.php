<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreMotiveRequest;
use App\Http\Requests\Auth\UpdateMotiveRequest;
use App\Models\Motive;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MotiveController extends Controller
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
            $motives = Motive::all();
        } else {
            $motives = Motive::where('enabled', true)->get();
        }


        return response()->json([
            'motives' => $motives
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMotiveRequest $request)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $validatedData = $request->validated();
        $validatedData['enabled'] = $request->has('enabled') ? (bool)$request->input('enabled') : false;
        $motive = new Motive($validatedData);

        $motive->save();

        return response()->json([
            'message' => 'Motive stored',
            'motive' => $motive,
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

        $motive = Motive::findOrFail($id);

        return response()->json([
            'motive' => $motive
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotiveRequest $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $motive = Motive::findOrFail($id);

        $validatedData = $request->validated();
        $motive->enabled = (bool) $validatedData['enabled'];

        $motive->update($validatedData);

        return response()->json([
            'message' => 'Motive updated successfully',
            'motive' => $motive
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

        $motive = Motive::findOrFail($id);
        $motive->enabled = false;

        $motive->save();

        return response()->json([], 204);
    }
}
