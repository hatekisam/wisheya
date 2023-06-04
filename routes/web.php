<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/signin',[Auth::class,'signinView']);
Route::get('/signup',[Auth::class,'signupView']);
Route::post('/signin-user',[Auth::class,'signin'])->name('signin-user');
Route::post('/signup-user',[Auth::class,'signup'])->name('signup-user');

Route::get('/dashboard',function(){
    $data = array();
    if(Session::has('userId')){
        $data = User::where('id','=',Session::get('userId'))->first();
    }
    return view('dashboard',compact('data'));
});
