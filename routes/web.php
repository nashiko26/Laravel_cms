<?php

use App\Http\Controllers\ProfileController; // 居場所を指定しておくと読み解きに便利
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Models\Job;

//写経用
// use App\Http\Controllers\BookController;
// use App\Models\Book;


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

// Route::get('/', function () {
//     return view('welcome');
// });


//Jobb Artist：ダッシュボード表示(jobs.blade.php)
Route::get('/', [JobController::class,'index'])->middleware(['auth'])->name('job_index');
Route::get('/dashboard', [JobController::class,'index'])->middleware(['auth'])->name('dashboard');

//求人登録処理
Route::post('/jobs',[JobController::class,"store"])->name('job_store');

//削除 
Route::delete('/job/{job}', [JobController::class,"destroy"])->name('job_destroy');

//更新画面
Route::post('/jobsedit/{job}',[JobController::class,"edit"])->name('jobs_edit'); //通常
Route::get('/jobsedit/{job}', [JobController::class,"edit"])->name('edit');      //Validationエラーありの場合

//更新画面
Route::post('/jobs/update',[JobController::class,"update"])->name('jobs_update');




// ここから下はデフォルトで使う
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
