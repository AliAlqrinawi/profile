<?php

namespace App\Http\Controllers\UserAndAdmin;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersAndAdminController extends Controller
{
    public function admin()
    {
        if(Gate::denies('admins.view')){
            abort(403);
        }
        $admin = User::get();
        return view('userandadmin.admin');
    }

    public function get_admins()
    {
        if(Gate::denies('clients.view')){
            abort(403);
        }
        $admin = User::get();
        if($admin){
            return response()->json([
                'message' => 'Data Found',
                'status' => 200,
                'data' => $admin
            ]);
        }
        else{
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
            ]);
        }
    }

    public function clients()
    {
        $clients = client::latest()->Paginate(5);
        return view('userandadmin.client' , compact('clients'));
    }

}
