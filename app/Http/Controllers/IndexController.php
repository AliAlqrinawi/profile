<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfWorkers;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IndexController extends Controller
{
    public function index(){
        if(Gate::denies('index.show')){
            abort(403);
        }
        // dd(Gate::denies('index.show'));
        // $this->authorize('index.show' , CategoryOfWorkers::class);
        // dd();
        return view('index');
    }

    public function get_client(){
        if(Gate::denies('index.show')){
            abort(403);
        }
        // $this->authorize('index.show' , CategoryOfWorkers::class);
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
