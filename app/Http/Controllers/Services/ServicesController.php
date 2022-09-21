<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::latest()->Paginate(5);
        return  view( 'services.index', compact('services'));
    }

    public function get_service()
    {
        $services = Service::all();
        if($services){
            return response()->json([
                'message' => 'Data Found',
                'status' => 200,
                'data' => $services
            ]);
        }
        else{
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
            ]);
        }
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = $request->except(['icon']);
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            if($icon->isValid()){
                $path = $icon->store('service_icon' , ['disk' => 'uploads']);
                $data ['icon'] = $path;
            }
        }
        Service::create($data);

        return redirect()->route('service.index');
    }

    public function edite($id)
    {
        $service = Service::find($id);
        return view('services.edite' , compact('service'));
    }

    public function update(Request $request , $id)
    {
        $service = Service::find($id);
        $data = $request->except(['icon']);
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            if($icon->isValid()){
                $path = $icon->store('service_icon' , ['disk' => 'uploads']);
                $data ['icon'] = $path;
            }
        }
        $service->update($data);
    }

    public function destroy($id)
    {
        $service = Service::destroy($id);
    }
}
