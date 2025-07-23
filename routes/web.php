<?php

use App\Http\Controllers\GigController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [GigController::class, 'gitGigs'])->name('gigs');

Route::prefix('seller')->group(function () {
Route::view('/dashboard', 'seller.pages.dashboard')->name('seller-dashboard')->middleware('auth'); 
    Route::view('/gigs', 'seller.pages.gigs')->name('seller-gigs');
    Route::view('/single-gig/{id}', 'seller.pages.single-gig')->name('seller-single-gig');
    Route::view('/create-gigs', 'seller.pages.create-gig')->name('seller-add-gigs');
    Route::view('/login', 'seller.pages.login')->name('login')->middleware('guest');
    Route::view('/signup', 'seller.pages.signup')->name('seller-signup')->middleware('guest');




    //get routes

    Route::get('/create-gigs', [GigController::class, 'getCategories'])->name('seller-get-categories');
    Route::get('/get-single-gig/{id}', [GigController::class, 'getSingleGig'])->name('seller-get-single-gig');

    //post routes
    Route::post('/get-relevant-values', [GigController::class,  'getReleventValues'])->name('seller-get-relevent-values');
    Route::post('/add-gig', [GigController::class, 'addGig'])->name('seller-add-gig');
    Route::post('/signup-user', [UserController::class, 'signUpUser'])->name('seller-signup-user');
});


