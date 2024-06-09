<?php

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

/*  Example of API Routes

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

// To access the API from the browser, use http://localhost:8000/api

// All routes need to begin with /

/* Routes of CRUD */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;

// To get all students
Route::get('/students', [studentController::class, 'index']);

// To get a single student
// To use an id or parameter of the uri you need to declare it in the param of the function
Route::get('/students/{id}', [studentController::class, 'show']);

// To create a new student
Route::post('/students', [studentController::class, 'store']);

// To update an existing student (entire object) 
// {id} is a parameter to the route
Route::put('/students/{id}', [studentController::class, 'update']);

// To update an existing student (partial object)
Route::patch('/students/{id}', [studentController::class, 'updatePartial']);

// To delete an existing student
Route::delete('/students/{id}', [studentController::class, 'destroy']);
