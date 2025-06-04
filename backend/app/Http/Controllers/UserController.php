<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserByToken(Request $request)
    {
        $user = $this->authenticateUser($request);

        return response()->json(['user' => $user], 200);
    }
}
