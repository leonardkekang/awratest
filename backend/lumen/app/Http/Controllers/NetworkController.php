<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Network;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetworkController extends Controller {
    /**
     * class Constructor
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Get all Networks
     * 
     * @return Response
     */
    public function index() {
        return response()->json([
            'data' => Network::all(),
        ], 200);
    }

    /**
     * Store new data
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        // Validate input
        $this->validate($request, [
            'ip' => 'required|ipv4|unique:networks',
            'label' => 'required|string',
        ]);

        try {
            $log = new Log;
            $log->table = 'networks';
            $log->action = 'store';
            $log->new_value = 'IP: ' . $request->input('ip') . ', Label: ' . $request->input('label');
            $log->created_by = Auth::id();
            $log->updated_by = Auth::id();
            $log->save();

            $network = new Network;
            $network->ip = $request->input('ip');
            $network->label = $request->input('label');
            $network->last_log = $log->id;
            $network->save();
            
            return response()->json([
                'network' => $network,
                'message' => 'success'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'message' => 'Input Network data failed!'
            ], 409);
        }
    }

    /**
     * Modify data
     * 
     * @param Integer $id
     * @return Response
     */
    public function edit(Request $request, $id) {
        // Validate input
        $this->validate($request, [
            'ip' => 'required|ipv4',
            'label' => 'required|string',
        ]);

        try {
            $network = Network::findOrFail($id);

            $log = new Log;
            $log->table = 'networks';
            $log->action = 'edit';
            $log->old_value = 'IP: ' . $network->ip . ', Label: ' . $network->label;
            $log->new_value = 'IP: ' . $request->input('ip') . ', Label: ' . $request->input('label');
            $log->updated_by = Auth::id();
            $log->save();

            $network->ip = $request->input('ip');
            $network->label = $request->input('label');
            $network->last_log = $log->id;
            $network->save();
            
            return response()->json([
                'network' => $network,
                'message' => 'success'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'message' => 'Modify Network data failed!'
            ], 409);
        }
    }
}
