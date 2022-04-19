<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function addQuestion(Request $request){
        $question = Question::create([
            'image'=>$request['image'],
            'word'=>$request['word'],
            'parts'=>$request['parts']
        ]);
        return response()->json([
            'data' => $question,
            'message' => 'Successfully created',
            'error' => false,
        ], 201);

    }
}
