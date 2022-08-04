<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function addQuestion(Request $request){
        $img =  $this->uploadImage($request['image']);

        $question = Question::create([
            'image'=>$img,
            'word'=>$request['word'],
            'parts'=>$request['parts'],
            'deleted'=>0,
            'approved'=>0,
        ]);
        return response()->json([
            'data' => $question,
            'message' => 'Successfully created',
            'error' => false,
        ], 201);

    }

    public function allQuestions(Request $request){
        $questions = Question::where("deleted","0")->get();
        return response()->json([
            'data' => $questions,
            'message' => 'Successfully retrieved',
            'error' => false
        ]);
    }

    public function deleteQuestion(Request $request){
        $id = $request->id;
        $question = Question::find($id);
        $question->deleted = "1";
        $question->save();
        return response()->json([
            'data' => $question,
            'message'=>'Deleted',
            'error' => false
        ]);
    }
    public function approveQuestion(Request $request){
        $id = $request->id;
        $question = Question::find('id',$id);
        $question->approved = "1";
        $question->save();
        return response()->json([
            'data' => $question,
            'message'=>'Deleted',
            'error' => false
        ]);
    }
    public function uploadImage($imgString)
    {
        // try {
        $image_64 = $imgString; //your base64 encoded data

        // $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $extension = "bmp";

        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);

        // find substring fro replace here eg: data:image/png;base64,

        $image = str_replace($replace, '', $image_64);

        $image = str_replace(' ', '+', $image);

        $imageName = date("Y-m-d-h-i-s") . Str::random(5) . '.' . $extension;

        Storage::disk('public')->put('images/' . $imageName, base64_decode($image));
        return 'images/' . $imageName;
    }
}
