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
Route::get('add', function() {
    return view('add');
});

//Insert data to database table
Route::post('saveData', [itemController::class, 'insertItem']);

//Show Register/Create Form
Route::get('/register', [userController::class, 'create']);

Route::post('/users', [userController::class, 'store']);