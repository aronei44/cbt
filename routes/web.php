<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FillController;
use App\Http\Controllers\LoginController;

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






// Login
Route::get('/login',            function () { return view('login');})->name('login')->middleware('guest');
Route::post('/login',           [LoginController::class, 'authenticate']);     

// Register
Route::get('/register',         function () { return view('register');})->middleware('guest');
Route::post('/register',        [LoginController::class, 'register']);

// Logout
Route::get('/logout',           [LoginController::class, 'logout']);

// dahsboard
Route::get('/',                 function () {return view('index');})->middleware('auth');

// edit
Route::get('/edit',             function () {return view('edit');})->middleware('auth');
Route::post('/edit',            [UserController::class, 'edit'])->middleware('auth');
Route::post('/editfoto',        [UserController::class, 'editfoto'])->middleware('auth');

// absensi
Route::get('/absensi',          [AbsentController::class,'lihat'])->middleware('auth');
Route::post('/absensi',         [AbsentController::class,'absen'])->middleware('auth');
Route::get('/tambah-absensi',   [AbsentController::class, 'add'])->middleware('auth'); 
Route::post('/tambah-absensi',  [AbsentController::class, 'tambah'])->middleware('auth');
Route::get('/lihat-absen',      [AbsentController::class,'lihatsemua'])->middleware('auth');

// profil
Route::get('/profil',           function () {return view('profil');})->middleware('auth');

// tugas
Route::get('/tambah-tugas',     function () {return view('tambahtugas');})->middleware('auth'); 
Route::post('/tambah-tugas',    [TaskController::class,'tambahtugas'])->middleware('auth');
Route::get('/tugas',            [TaskController::class,'lihat'])->middleware('auth');
Route::get('/lihat-tugas',      [TaskController::class,'lihatsemua'])->middleware('auth');
Route::get('/lihat-tugas/hapus/{id}',      [TaskController::class,'hapus'])->middleware('auth');
Route::get('/edit_tugas_{id}',      [TaskController::class,'edit'])->middleware('auth');
Route::post('/edit_tugas_{id}',      [TaskController::class,'edittugas'])->middleware('auth');

// kerjakan
Route::get('/kerjakan{id}',     [TaskController::class,'kerjakan'])->middleware('auth');
Route::post('/kerjakan{id}',     [FillController::class,'tambah'])->middleware('auth');

// nilai
Route::get('/lihat-nilai',      [TaskController::class,'lihatnilai'])->middleware('auth');

// password
Route::get('/password',         function () {return view('password');})->middleware('auth');
Route::post('/password',        [UserController::class, 'password'])->middleware('auth');


Route::get('/cek', function(){
    return URL('storage/app/img/'.auth()->user()->image);
});