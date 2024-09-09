<?php

use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about.index');

// Route::get('/contact-us', function () {
//     return view('contact_us');
// })->name('contact.index');

// Route::post('/contact-us',[ContactUsController::class, 'store'])->name('contact.store');

Route::group(['prefix'=>'contact-us'], function(){

    Route::get('/',[ContactUsController::class, 'index'])->name('contact.index');
    Route::post('/',[ContactUsController::class, 'store'])->name('contact.store');
});