<?php
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\EntryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
Route::get('/social-icons', [VideoController::class, 'getSocialIcons']);

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
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/links', [ProjectController::class, 'getAllLinks']);
Route::get('/entries', [EntryController::class, 'apiIndex']);
Route::post('/entries', [EntryController::class, 'apiStore']);