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

Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->name('users')->middleware('guest');

Route::get('manage-listings', [ListingController::class, 'manage'])->name('manage-listings')->middleware('auth');

// USER LOGIN FORM
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// LOGIN USER
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users-authenticate');

// USER LOGOUT
Route::post('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

//SHOW CREATE FORM
Route::get('/listings/create', [ListingController::class, 'create'])->name('create-job')->middleware('auth');

// STORE NEW LISTING
Route::post('/listings', [ListingController::class, 'store'])->name('store-job')->middleware('auth');


// SHOW EDIT FORM
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('edit-job')->middleware('auth');

// EDIT SUBMIT TO UPDATE
Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('update-job')->middleware('auth');

// DELETE LISTING
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('delete-job')->middleware('auth');

// MANAGE LISTINGS
Route::get('/listings/manage', [ListingController::class, 'manage'])->name('manage-listings')->middleware('auth');

// SINGLE LISTING
Route::get('/listings/{listing}', [ListingController::class, 'show']);