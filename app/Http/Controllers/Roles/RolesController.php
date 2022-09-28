<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\role_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('role.view')){
            abort(403);
        }
        $roles = Role::withCount('users')->with('users')->get();
        // foreach($roles as $post){
        //     return $post->users[0]->name;
        // }
        // dd($roles->users->email);
        return view('roles.index' , ['roles' => $roles , 'i' => $i=0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('role.create')){
            abort(403);
        }
        $role = new Role();
        $user = new User();
        return view('roles.create' , compact('role' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        // if(Gate::denies('role.create')){
        //     abort(403);
        // }
        // $request->validate(['name' => 'required' , 'permissions' => 'required'] );

        // $role = new Role();
        // $role->name = $request->name;
        // $role->permissions = $request->permissions;
        // $role->save();
        // $user = new User();
        // $user->name = $request->user_name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();
        // $role_user = new role_user();
        // $role_user->role_id = $role->id;
        // $role_user->user_id = $user->id;
        // $role_user->save();
        // // dd($role->id ." ". $user->id);
        // return redirect()->route('roles.index')->with('success' , 'created is success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if(Gate::denies('role.update')){
            abort(403);
        }
        // $hashed = "";
        $r = role_user::get();
        foreach($r as $e){
            $user = User::where('id' , $e->user_id)->with('roles')->first();
        }
        // return Hash::get ($user->password);
         
        
 //       return $user->name;
        return view('roles.edit' , compact('role' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if(Gate::denies('role.update')){
            abort(403);
        }
        $request->validate(['name' => 'required' , 'permissions' => 'required'] );
        // $role->update($request->all());
        $r = role_user::get();
        foreach($r as $e){
            $user = User::where('id' , $e->user_id)->first();
        }
        // $role = new Role();
        $role->name = $request->name;
        $role->permissions = $request->permissions;
        $role->update();
        // $user = new User();
        $user->name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();
        // $role_user = new role_user();
        // $role_user->role_id = $role->id;
        // $role_user->user_id = $user->id;
        // $role_user->update();

        return redirect()->route('roles.index')->with('success' , 'updated is success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('role.delete')){
            abort(403);
        }
        $r = role_user::where('role_id' , $id)->first();
        $user = User::where('id' , $r->user_id)->first();
        $user->delete($id);
        Role::destroy($id);
    }
}
