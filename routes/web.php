<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DataController;
use App\Http\Controllers\ExcelController;
// use App\Http\Controllers\ResponseController;
Route::get('/upload', [ExcelController::class, 'showUploadForm']);
Route::post('/upload', [ExcelController::class, 'upload']);
Route::get('/extract-questions', [DataController::class, 'extractQuestionsAndOptions']);
Route::post('/save-response', [DataController::class, 'saveResponse']);
Route::post('/initialize-responses', [DataController::class, 'initializeResponses']);
Route::post('/test-end', [DataController::class, 'testend']);
Route::get('/test-end', [DataController::class, 'testend']);
?>