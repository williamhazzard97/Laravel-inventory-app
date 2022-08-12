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
Route::put('update/{id}', [itemController::class, 'update'])->middleware('auth');

//Show Register/Create Form
Route::get('/register', [userController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [userController::class, 'store']);

//Logout user
Route::post('/logout', [userController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login', [userController::class, 'login'])->name('login')->middleware('guest');

//Login authentication
Route::post('/authenticate', [userController::class, 'authenticate']);

//Search 
Route::get('/search', [itemController::class, 'search']);

//File Upload
Route::get('/upload-file', [itemController::class, 'createForm']);
Route::post('/upload-file', [itemController::class, 'fileUpload'])->name('fileUpload');

//File Download
Route::get('/download/{id}', [itemController::class, 'fileDownload']);

//Sort by Category
Route::get('/sortCategory', [itemController::class, 'sortCategory']);

//Sort by stock levels
Route::get('/sortStock', [itemController::class, 'sortStock']);

//View low stock items
Route::get('/lowStock', [itemController::class, 'lowStock']);

//Add stock by 1
Route::get('/addStock/{id}', [itemController::class, 'addStock'])->middleware('auth');

//Subtract stock by 1
Route::get('/subStock/{id}', [itemController::class, 'subStock'])->middleware('auth');

//Send Email
Route::get('/sendEmail', [itemController::class, 'sendEmail']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
