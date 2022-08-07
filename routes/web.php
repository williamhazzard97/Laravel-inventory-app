<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Http\Controllers\itemController;


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

Route::get('/', function () {
    return view('home', [
        'items' => Item::all()
    ]);
});

Route::get('add', function() {
    return view('add');
});

Route::post('saveData', [itemController::class, 'insertItem']);