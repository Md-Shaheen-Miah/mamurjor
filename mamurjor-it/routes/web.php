<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformationController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/description', function () {
    return view('description');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/image-upload/image', [ImageController::class, 'create'])->name('image-upload.create');
Route::post('/image-upload', [ImageController::class, 'store'])->name('image-upload.store');





Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts/store', [ContactController::class, 'store']);
Route::post('/contacts/update/{id}', [ContactController::class, 'update']);
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit']);
Route::delete('/contacts/delete/{id}', [ContactController::class, 'destroy']);


Route::get('/info1', [InformationController::class, 'stepOne'])->name('info1');
Route::post('/info1', [InformationController::class, 'postStepOne'])->name('form.post.info1');

Route::get('/info2', [InformationController::class, 'stepTwo'])->name('info2');
Route::post('/info2', [InformationController::class, 'postStepTwo'])->name('form.post.info2');
