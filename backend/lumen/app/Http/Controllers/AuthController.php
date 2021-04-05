<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {

    /*
     * Register new user.
     * 
     * @param Request $request
     * @return Response
     */
    public function register(Request $request) {
        // Validate input
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
            $user = new User;

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = app('hash')->make($request->input('password'));
            
            $user->save();
            
            return response()->json([
                'user' => $user,
                'message' => 'success'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'message' => 'User registration failed!'
            ], 409);
        }
    }
}
