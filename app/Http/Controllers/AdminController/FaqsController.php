<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{
    public function store(Request $request, $post_id)
    {
        try {
            $user = Auth::user();
            $user_id = $user->id;
            $validator = Validator::make($request->all(), [
                'question.*' => 'required|string|max:255', // Use * for array validation
                'answer.*' => 'required|string', // Adjust maximum length as needed
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            foreach ($request->question as $key => $question) {
                $answer = $request->answer[$key];
                $store = Faqs::create([
                    'question' => $question,
                    'answer' => $answer,
                    'user_id' => $user_id,
                    'post_id' => $post_id
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Faqs Successfully Store']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function update(Request $request, $post_id)
    {
        try {
            $user = Auth::user();
            $user_id = $user->id;
            $validator = Validator::make($request->all(), [
                'question.*' => 'required|string|max:255', // Use * for array validation
                'answer.*' => 'required|string', // Adjust maximum length as needed
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            Faqs::where('post_id', $post_id)->destory();

            foreach ($request->question as $key => $question) {
                $answer = $request->answer[$key];
                $store = Faqs::create([
                    'question' => $question,
                    'answer' => $answer,
                    'user_id' => $user_id,
                    'post_id' => $post_id
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Faqs Successfully Update']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
