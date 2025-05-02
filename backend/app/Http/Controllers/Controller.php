<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function getAuthenticatedUser(Request $request)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'No token provided'], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json(['message' => 'Authentication required. Please log in.'], 401);
        }

        return $accessToken->tokenable;
    }

    public function authenticateUser(Request $request)
    {
        $userOrResponse = $this->getAuthenticatedUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        return $userOrResponse;
    }

    protected function authenticateAdmin(Request $request)
    {
        $userOrResponse = $this->getAuthenticatedUser($request);

        if ($userOrResponse instanceof JsonResponse) {
            return $userOrResponse;
        }

        if ($userOrResponse->admin == 0) {
            return response()->json(['message' => 'You do not have permissions to perform this action'], 403);
        }

        return $userOrResponse;
    }
}
