<?php

namespace App\Http\Controllers\Works;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\CategoryOfWorkers;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorksController extends Controller
{
    public function index()
    {
        $category = CategoryOfWorkers::get();
        $categories = CategoryOfWorkers::get();
        return view('works.index', compact('category', 'categories'));
    }

    public function get_works()
    {
        $works = Work::with('has_categores')->get();
        if ($works) {
            return response()->json([
                'message' => 'Data Found',
                'status' => 200,
                'data' => $works
            ]);
        } else {
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
            ]);
        }
    }

    public function create()
    {
        $category = CategoryOfWorkers::get();

        return view('works.create', compact('category'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            Work::create($request->all());
            $data = $request->except(['images']);
//            return response()->json([
//                'status' => 200,
//                'message' => 'Add New Recode1',
//            ]);
            if (!$request->hasFile('images')) {

                return response()->json([
                    'status' => 200,
                    'message' => 'Add New Work is Successfully But have not any image',
                ]);
            } else {

                $files = $request->file('images');
                $attachments = [];
//                return response()->json([
//                    'status' => 200,
//                    'message' => 'Add New Recode2',
//                ]);
                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('/work-attachments', ['disk' => 'uploads']);
                        $attachments[] = $path;
                    };
                }
                $Work = Work::latest()->first('id');
                foreach ($attachments as $key => $value) {
                    Attachment::create([
                        'images' => $value,
                        'id_work' => $Work->id
                    ]);
                }
                return response()->json([
                    'status' => 200,
                    'message' => 'Add Work is Successfully.',
                ]);
            }
//            else{
//                return response()->json([
//                    'status' => 500,
//                    'message' => 'error'
//                ]);
//            }
        }
    }


    public function edite($id)
    {
        $work = Work::find($id);
        $category = CategoryOfWorkers::get();
        $attachments = Attachment::where('id_work', $work->id)->get();
//        $attachment = Attachment::where('id_work', $work->id)->get();
        if ($work) {
            if ($attachments or null) {
                return response()->json([
                    'status' => 200,
                    'work' => $work,
                    'attachments' => $attachments
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Work Not Found!'
            ]);
        }
    }


    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $work = Work::find($id);
            if ($work) {
                $work->update($request->all());
                $data = $request->except(['images']);
                if (!$request->hasFile('images')) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Add New Work is Successfully But have not any image',
                    ]);
                }
                $files = $request->file('images');
                $attachments = [];
                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('/work-attachments', ['disk' => 'uploads']);
                        $attachments[] = $path;
                    };
                }
                foreach ($attachments as $key => $value) {
                    Attachment::create([
                        'images' => $value,
                        'id_work' => $work->id
                    ]);
                }
                return response()->json([
                    'status' => 200,
                    'brand' => $work,
                    'message' => 'Update Work is Successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Work Not Found',
                ]);
            }
        }
    }

    public function destroy_work($id)
    {
        $work = Work::find($id);
        if ($work) {
            $work->destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'Delete Work is Successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Work Not Found',
            ]);
        }
    }

    public function destroy_attachment($id)
    {
        $attachment = Attachment::find($id);
        if ($attachment) {
            $attachment->destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'Delete Attachment is Successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Attachment Not Found',
            ]);
        }
    }

}
