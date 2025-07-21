<?php

use App\Http\Controllers\GigController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [GigController::class, 'gitGigs'])->name('gigs');

Route::prefix('seller')->group(function () {
Route::view('/dashboard', 'seller.pages.dashboard')->name('seller-dashboard'); 
    Route::view('/gigs', 'seller.pages.gigs')->name('seller-gigs');
    Route::view('/create-gigs', 'seller.pages.create-gig')->name('seller-add-gigs');




    //get routes

    Route::get('/create-gigs', [GigController::class, 'getCategories'])->name('seller-get-categories');


    //post routes
    Route::post('/get-relevant-values', [GigController::class,  'getReleventValues'])->name('seller-get-relevent-values');
    Route::post('/add-gig', [GigController::class, 'addGig'])->name('seller-add-gig');
});


