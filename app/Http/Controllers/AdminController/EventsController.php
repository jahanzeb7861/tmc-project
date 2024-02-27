<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    public function viewForm()
    {
        try {
            return view('admin.events.form');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function viewList()
    {
        try {
            $data = Event::orderBy('id', 'DESC')->get();
            return view('admin.events.list', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function viewUpdateForm($id)
    {
        try {
            $data = Event::where('id', $id)->first();
            return view('admin.events.form', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'start_date' => 'required|max:220',
                'end_date' => 'required',
                'address' => 'required', 
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            // Create Slug name
            $slug = Str::slug($request->input('title'), '-');

            $event = Event::create([
                'title' => $request->input('title'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'slug' => $slug,
                'address' =>  $request->input('address'),
                'is_publish' => $request->boolean('is_publish') ? 'publish' : 'archive',

            ]);
            return response()->json(['status' => 'success', 'message' => 'Event successfully stored', 'data' => $event]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'start_date' => 'required|max:220',
                'end_date' => 'required',
                'address' => 'required', 
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            // Create Slug name
            $slug = Str::slug($request->input('title'), '-');

            $event = Event::where('id', $id)->update([
                'title' => $request->input('title'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'slug' => $slug,
                'address' =>  $request->input('address'),
                'is_publish' => $request->boolean('is_publish') ? 'publish' : 'archive',

            ]);
            return response()->json(['status' => 'success', 'message' => 'Event successfully updated', 'data' => $event]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function destory($id)
    {
        try {
            Event::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Post Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
