<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramProspectusController;
use App\Http\Controllers\StudentProspectusController;
use App\Http\Controllers\GradeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('students', StudentController::class);
Route::apiResource('program-prospectuses', ProgramProspectusController::class);
Route::apiResource('student-prospectuses', StudentProspectusController::class);
Route::apiResource('grades', GradeController::class);
