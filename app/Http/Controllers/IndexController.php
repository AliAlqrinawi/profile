<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        return view('index');
    }

    public function get_client(){

        $clients = client::all();
        if($clients){
            return response()->json([
                'message' => 'Data Found',
                'status' => 200,
                'data' => $clients
            ]);
        }
        else{
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
            ]);
        }
    }

}
