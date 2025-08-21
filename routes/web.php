<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\VendorController;

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

Route::resource('vendors', VendorController::class);
// This registers:
// GET    /vendors            -> index
// GET    /vendors/create     -> create
// POST   /vendors            -> store
// GET    /vendors/{vendor}   -> show
// GET    /vendors/{vendor}/edit -> edit
// PUT    /vendors/{vendor}   -> update
// DELETE /vendors/{vendor}   -> destroy

Route::get(
    '/',
    [
        HelloController::class,
        'index'
    ]
);

// Route::get(
//     '/vendors/create',
//     [
//         VendorController::class,
//         'create'
//     ]
// );
Route::get(
    '/partials',
    function () {
        return (view('vendors._form'));
    }
);
Route::get(
    '/layouts/app',
    function () {
        return (view('layouts/app'));
    }
);

