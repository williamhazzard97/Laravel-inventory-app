<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Http\Controllers\itemController;
use App\Http\Controllers\userController;


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

//Load home page
Route::get('/', function () {
    return view('home', [
        'items' => Item::all()
    ]);
});

//Load add item form
Route::get('add', [itemController::class, 'addForm'])->middleware('auth');

//Insert item to database table
Route::post('saveData', [itemController::class, 'insertItem']);

//Delete item
Route::get('delete/{id}', [itemController::class, 'delete'])->middleware('auth');

//Edit item
Route::get('edit/{id}', [itemController::class, 'edit'])->middleware('auth');
Route::put('update/{id}', [itemController::class, 'update']);

//Show Register/Create Form
Route::get('/register', [userController::class, 'create']);

//Create new user
Route::post('/users', [userController::class, 'store']);

//Logout user
Route::post('/logout', [userController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login', [userController::class, 'login'])->name('login');

//Login authentication
Route::post('/authenticate', [userController::class, 'authenticate']);


//Search 
Route::get('/search', [itemController::class, 'search']);