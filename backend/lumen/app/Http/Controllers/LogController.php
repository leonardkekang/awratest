<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller {
    /**
     * class Constructor
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Get all Log
     * 
     * @return Response
     */
    public function index() {
        return response()->json([
            'data' => Log::all(),
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
            'data' => Log::findOrFail($id),
        ], 200);
    }
}
