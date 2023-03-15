<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    // if(Auth::check()){
    //     return view('welcome');

    // }
    // return redirect('/login');
    return view('welcome');
});

Route::group(['middleware'=>'guest'],function(){
    Route::get('login',function(){
        return view('layouts.login');
    })->name('login');

    Route::post('/login',[UserController::class,'login']);

    Route::get('/register',function(){
    return view('layouts.register');
});

    Route::post('/register',[UserController::class,'register']);
});


Route::group(['middleware'=>['auth']],function(){
    Route::get('home',[UserController::class,'index']);
    Route::post('home',[UserController::class,'index']);

    Route::get('logout',[UserController::class,'logout']);
});

Route::get('search',[UserController::class,'search']);



// Route::get('/register',function(){
//     return view('layouts.register');
// });

// Route::get('/login', function () {
//     return view('layouts.login');
// });

// Route::post('/login',[UserController::class,'login']);

// Route::post('/customer',[UserController::class,'register']);

// Route::get('home',function(){
//     return view('home');
// });

// Route::get('logout',[UserController::class,'logout']);


