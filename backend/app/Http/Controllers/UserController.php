<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUserByToken(Request $request)
    {
        $user = $this->authenticateUser($request);

        return response()->json(['user' => $user], 200);
    }

    // Admin
    public function index(Request $request)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }


        $users = User::where('id', '!=', $adminOrResponse['id'])->get();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function store(StoreUserRequest $request)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $validatedData = $request->validated();

        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'admin' => (bool) $validatedData['admin'],
            'enabled' => true,
        ]);

        $user->save();

        return response()->json([
            'message' => 'User stored',
            'user' => $user,
        ], 200);
    }


    public function update(UpdateUserRequest $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $user = User::findOrFail($id);

        $validatedData = $request->validated();

        $user->admin = (bool) $validatedData['admin'];
        $user->enabled = (bool) $validatedData['enabled'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $user = User::findOrFail($id);
        $user->enabled = false;

        $user->save();

        return response()->json([], 204);
    }

    public function enable(Request $request, string $id)
    {
        $adminOrResponse = $this->authenticateAdmin($request);

        if ($adminOrResponse instanceof JsonResponse) {
            return $adminOrResponse;
        }

        $user = User::findOrFail($id);
        $user->enabled = true;

        $user->save();

        return response()->json([], 204);
    }
}
