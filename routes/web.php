<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\FilepondController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('dropzone', DropzoneController::class);
/*Route::get(
    '/dropzone/store',
    [UserProfileController::class, 'create']
)->name('profile');*/

Route::controller(DropzoneController::class)->group(function(){
    Route::get('dropzone', 'index');
    Route::post('dropzone/store', 'store')->name('dropzone.store');
    Route::post('dropzone/delete', 'destroy')->name('dropzone.destroy');
});

Route::controller(FilepondController::class)->group(function(){
    Route::get('filepond', 'index');
    //Route::post('filepond/store', 'store')->name('filepond.store');
});