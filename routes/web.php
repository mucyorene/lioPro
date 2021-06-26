<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormControllerImages;
use App\Http\Controllers\AdminControllers\Dashboard;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageControllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

|
*/

Route::get('/', [StudentController::class,'index']);
//Route::get('studentTest','StudentController@indexTest');
Route::get('/getImages',[FormControllerImages::class, 'create']);
Route::post('postImages',[FormControllerImages::class,'store']);

//DASHBOARD

Route::get('/logout',[LoginController::class,'logouts'])->name('endSession');

Route::post('/registerPostDummy',[LoginController::class,'dummies']);

Route::post('/postLogins',[LoginController::class,'authantication'])->name('auth.login');
Route::get('/dummyLoged',[LoginController::class,'pubDashboard']);
Route::get('/login',[LoginController::class,'loginPage']);

//DASHBOARD ROUTES

Route::group(['middleware'=>['authlio']],function(){
    Route::get('/registerDummy',[LoginController::class,'dRegisteration'])->name('admin.dRegister');
    Route::get('/dashs',[Dashboard::class,'index']);
    Route::get('/listProjects',[PageControllers::class, 'listProject']);
    Route::get('/newPro',[Dashboard::class, 'create']);

    Route::post('/postProject',[Dashboard::class,'store']);
    Route::get('/back',function(){ return redirect('/listProjects'); });
    Route::get('/removeProject/{id}',[Dashboard::class,'destroy']);
    Route::get('/editProject.{id}',[Dashboard::class,'show']);
    Route::post('/postEditProject/{id}',[Dashboard::class,'update']);

});