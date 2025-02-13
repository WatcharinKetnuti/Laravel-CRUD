<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthAdmin;

// Route::get('/', [ContentController::class, 'index']);


// Route::get('/', function(){
//     return view('test.index');
// });




Route::get('/welcome', function(){
    return view('welcome');
});

Route::get('/loginn', function(){
    return view('test.login');
});

Route::get('/register', function(){
    return view('test.register');
});



Route::get('/', [ContentController::class, 'categories'])->name('index');
Route::get('/categories/{id}/view',[ContentController::class,'detail']);

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'checkLogin']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register/add',[AuthController::class,'RegisterAdd']);




// Route::get('/register',[AuthController::class,'register_view']);
// Route::post('/register',[AuthController::class,'register_post']);

Route::middleware(['auth.admin'])->group(function(){

    Route::get('/logout', [AuthController::class, 'logout']);



    Route::get('/categories/add', [ContentController::class, 'categories_view']);
    Route::get('/categories/{id}/edit', [ContentController::class, 'categories_edit']);

    Route::post('/categories/add', [ContentController::class, 'categories_add']);
    Route::put('/categories/add/{id}', [ContentController::class, 'categories_update']);
    Route::get('/categories/delete/{id}', [ContentController::class, 'categories_delete']);



    Route::get('/product/add/view', [ContentController::class, 'product_view']);
    Route::get('/product/{id}/edit', [ContentController::class, 'product_edit']);

    Route::post('/product/add', [ContentController::class, 'product_add']);
    Route::put('/product/add/{id}', [ContentController::class, 'product_update']);
    Route::get('/product/delete/{id}', [ContentController::class, 'product_delete']);






//    ==========================  example   ==========================


    Route::get('/content', [ContentController::class, 'index']);
    Route::get('/content/create', [ContentController::class, 'create']);
    Route::get('/content/{id}/edit', [ContentController::class, 'edit']);



    Route::post('/content', [ContentController::class, 'store']);

    Route::put('/content/{id}', [ContentController::class, 'update']);

    Route::delete('/content/{id}', [ContentController::class, 'destroy']);
});




