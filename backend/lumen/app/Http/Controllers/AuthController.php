<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    /**
     * Register new user
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

    /**
     * Login and get token
     * 
     * @param Request $request
     * @return Response
     */
    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only([
            'email', 'password'
        ]);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $log = new Log;
        $log->table = 'users';
        $log->action = 'login';
        $log->created_by = Auth::id();
        $log->save();

        return $this->respondWithToken($token);
    }
}
