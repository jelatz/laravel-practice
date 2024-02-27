<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

/*ROUTE MODEL BINDING

Common Resource Routes:
index - Show all listings
show - show single listings
create - Show form to create new Listing
store - store new Listing
edit - show form to edit listing
update - update listiing
destroy - delete listing */

Route::get('/', [ListingController::class, 'index'])->name('home');

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'login'])->name('login');

//SHOW CREATE FORM
Route::get('/listings/create', [ListingController::class, 'create'])->name('create-job');

// STORE NEW LISTING
Route::post('/listings', [ListingController::class, 'store'])->name('store-job');

// SINGLE LISTING
Route::get('/listings/{listing}', [ListingController::class, 'show']);