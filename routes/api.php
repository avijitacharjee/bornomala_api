<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[AuthController::class, 'login']);

//Question
// Route::post('/add-question',[QuestionController::class, 'addQuestion']);
// Route::get('/questions',[QuestionController::class,'allQuestions']);
// Route::post('/delete-question',[QuestionController::class,'deleteQuestion']);
// Route::post('/approve-question',[QuestionController::class,'approveQuestion']);
