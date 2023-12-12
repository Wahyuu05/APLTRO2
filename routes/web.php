<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\PenggunaController;
Use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
//use App\Models\Inventory;

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
    return view('welcome');
});

Route::get('/main', function () {
    return view('layouts.main');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
});

//ROUTE UNUTUK LECTURERS
Route::get('/penggunas/lecturers', [PenggunaController::class, 'index_lecturers'])->name('penggunas.index_lecturers');
Route::get('/penggunas/lecturers/create', [PenggunaController::class,'create_lecturers'])->name('penggunas.create_lecturers');
Route::post('/penggunas/lecturers', [PenggunaController::class, 'store_lecturers'])->name('penggunas.store_lecturers');
Route::put('/penggunas/lecturers/{id}', [PenggunaController::class, 'update_lecturers'])->name('penggunas.update_lecturers');
Route::get('/penggunas/lecturers/{id}', [PenggunaController::class, 'show_lecturers'])->name('penggunas.show_lecturers');
Route::get('/penggunas/lecturers/{id}/edit_lecturers', [PenggunaController::class, 'edit_lecturers'])->name('penggunas.edit_lecturers');
Route::delete('/penggunas/lecturers/{id}', [PenggunaController::class, 'destroy_lecturers'])->name('penggunas.destroy_lecturers');

//ROUTE UNUTUK STUDENTS
Route::get('/penggunas/students', [PenggunaController::class, 'index_students'])->name('penggunas.index_students');
Route::get('/penggunas/students/create', [PenggunaController::class,'create_students'])->name('penggunas.create_students');
Route::post('/penggunas/students', [PenggunaController::class, 'store_students'])->name('penggunas.store_students');
Route::put('/penggunas/students/{id}', [PenggunaController::class, 'update_students'])->name('penggunas.update_students');
Route::get('/penggunas/students/{id}', [PenggunaController::class, 'show_students'])->name('penggunas.show_students');
Route::get('/penggunas/students/{id}/edit_students', [PenggunaController::class, 'edit_students'])->name('penggunas.edit_students');
Route::delete('/penggunas/students/{id}', [PenggunaController::class, 'destroy_students'])->name('penggunas.destroy_students');

//ROUTE UNUTUK INVENTORYS
Route::get('/inventorys', [InventoryController::class, 'index'])->name('inventorys.index');
Route::get('/inventorys/add', [InventoryController::class, 'create'])->name('inventorys.create');
Route::post('/inventorys/store', [InventoryController::class, 'store'])->name('inventorys.store');
Route::put('/inventorys/{id}', [InventoryController::class, 'update'])->name('inventorys.update');
Route::get('/inventorys/{id}', [InventoryController::class, 'show'])->name('inventorys.show');
Route::get('/inventorys/{id}', [InventoryController::class, 'edit'])->name('inventorys.edit');
Route::delete('/inventorys/{id}', [InventoryController::class, 'destroy'])->name('inventorys.destroy');

//ROUTE UNUTUK USAGES
Route::prefix('usages')->group(function () {
    Route::get('', [UsageController::class, 'index'])->name('usages.index');
    Route::get('create', [UsageController::class, 'create'])->name('usages.create');
    Route::post('store', [UsageController::class, 'store'])->name('usages.store');
    Route::get('show/{idpb}', [UsageController::class, 'show'])->name('usages.show');
    Route::get('edit/{idpb}', [UsageController::class, 'edit'])->name('usages.edit');
    Route::put('edit/{idpb}', [UsageController::class, 'update'])->name('usages.update');
    Route::delete('destroy/{idpb}', [UsageController::class, 'destroy'])->name('usages.destroy');
});