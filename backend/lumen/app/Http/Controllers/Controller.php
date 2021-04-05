<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function respondWithToken($token) {
        return response()->json([
            'token' => $token,
            'topen_type' => 'Bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ], 200);
    }
}
