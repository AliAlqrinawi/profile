<?php

namespace App\Http\Controllers\CategoryOfWorkers;

use App\Http\Controllers\Controller;
use App\Models\CategoryOfWorkers;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryOfWorkersController extends Controller
{
    public function create()
    {
        $categores =  CategoryOfWorkers::paginate(5);
        $category =  CategoryOfWorkers::paginate(5);
        return view('Categores.index');
    }

    public function get_categories()
    {
        $categories =  CategoryOfWorkers::all();
        if($categories){
            return response()->json([
                'message' => 'Data Found',
                'status' => 200,
                'data' => $categories
            ]);
        }
        else{
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
            ]);
        }
    }


    public function store(Request $request)
    {
        $messges  = [
            'name_ar.required' => 'قم بتعبئة الأسم بشكل صحيح',
            'name_en.required' => 'قم بتعبئة الأسم بشكل صحيح',
        ];
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ] , $messges);

        if ($validator->passes()) {
//            for ($f=0 ; $f<=2000 ; $f++){
                CategoryOfWorkers::create($request->all());
//            }
            $categores =  CategoryOfWorkers::latest()->first();
            return response()->json([$categores , 'success'=>'Added new records.']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function edit($id)
    {
        $categorey = CategoryOfWorkers::find($id);
        if ($categorey) {
            return response()->json([
                'status' => 200,
                'Category' => $categorey,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found',
            ]);
        }
    }

    public function update(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $category = CategoryOfWorkers::find($id);
            if ($category){
                $category->update($request->all());
                return response()->json([
                    'status' => 200,
                    'message' => 'Update Category is Successfully.',
                ]);
            }else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Category Not Found',
                ]);
            }

        }



        return redirect()->route('categore.create')->with('success' , 'Edite record.');
    }

    public function destroy($id)
    {
        $categorey = CategoryOfWorkers::destroy($id);
        return response()->json(['success'=>'Delete record.']);
    }

}
