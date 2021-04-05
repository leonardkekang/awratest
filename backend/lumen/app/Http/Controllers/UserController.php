<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    /**
     * class Constructor
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Get all Users
     * 
     * @return Response
     */
    public function getAll() {
        return response()->json([
            'data' => User::all(),
        ], 200);
    }
}
