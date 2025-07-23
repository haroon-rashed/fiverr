<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signUpUser(Request $req)
    {
      $formField = $req->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6',
]);


        $formField['password'] = bcrypt($formField['password']);
        $user = User::create($formField);
        $myUser = auth()->login($user);
        return response()->json([
            'message' => 'User created successfully',
            'user' => $myUser
        ])->setStatusCode(201);
    }
}
