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
    public function index() {
        return response()->json([
            'data' => User::all(),
        ], 200);
    }

    /**
     * Get individual data
     * 
     * @param Integer $id
     * @return Response
     */
    public function show($id) {
        return response()->json([
            'data' => User::findOrFail($id),
        ], 200);
    }
}
