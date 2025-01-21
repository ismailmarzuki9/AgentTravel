<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\controllerboking;
use App\Http\Controllers\controllerLogin;
use App\Http\Controllers\controllerRegister;
use App\Http\Controllers\controll_mobil;
use App\Http\Controllers\ctrll_kuliner;
use App\Http\Controllers\ctrl_wisata;
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

// Route utama
Route::get('/', [Controller::class, 'viewdasboard'])->name('home');
// Route::get('/', function () {
//     return view('dasbord');
// })->name('home');

Route::get('login', [controllerLogin::class, 'login'])->name('login');
Route::post('actionlogin', [controllerLogin::class, 'ceklogin'])->name('ceklogin');
Route::get('logout', [controllerLogin::class, 'actionlogout'])->name('logout');

Route::get('/register', [controllerRegister::class, 'register'])->middleware('guest');
Route::post('register', [controllerRegister::class, 'regiserCek'])->name('cekregis');
Route::get('changepassword', [controllerRegister::class, 'changepasswordview'])->name('changepassword');
Route::patch('/changepasswordCek', [controllerRegister::class, 'changepasswordCek'])->name('changepasswordCek');


Route::get('/mobil', [controll_mobil::class, 'viewmobile'])->name('mobil');


Route::middleware(['admin'])->group(function(){
    Route::get('/boking', [controllerboking::class, 'view']);
    Route::get('/mobiladd', [controll_mobil::class, 'addmobile'])->name('mobiladd');
    Route::Post('mobilepost', [controll_mobil::class,'store'])->name('mobil.store');
    Route::get('/mobil/{id}/edit', [controll_mobil::class, 'viewedit'])->name('viewedit');
    Route::Post('/mobil/{id}', [controll_mobil::class, 'updatemobil'])->name('updatemobil');
    Route::delete('/mobil/{id}', [controll_mobil::class, 'deletmobil'])->name('mobil.deletmobil');

    Route::get('/kulineradd', [ctrll_kuliner::class, 'addkulinerview'])->name('kulineradd');
    Route::Post('/kuliner', [ctrll_kuliner::class, 'addkulinerPost'])->name('kulinerstore');
    Route::get('/kuliner', [ctrll_kuliner::class, 'viewkuliner'])->name('viewkuliner');
    Route::get('/kuliner_edit/{id}/edit',  [ctrll_kuliner::class, 'vieweditkuliner'])->name('kulineredit');
    Route::patch('/kulineredit/{id}',  [ctrll_kuliner::class, 'editkulinerstore'])->name('kulineredit_Store');
    Route::delete('/kulinerdelet/{id}', [ctrll_kuliner::class, 'deletkuliner'])->name('data.deletkuliner');

    Route::get('/wisata', [ctrl_wisata::class, 'ctrl_viewwisata'])->name('wisataview');

    Route::get('/wisatadd', [ctrl_wisata::class, 'ctrl_addwisataview'])->name('wisataadd');
    Route::Post('/wisataPost', [ctrl_wisata::class, 'ctrl_addwisatastore'])->name('wisataadd_store'); // untuk store data Add

    Route::get('/wisataedit/{id}', [ctrl_wisata::class, 'ctrl_editwisata'])->name('data.wisatedit');
    Route::patch('/wisatastore/{id}', [ctrl_wisata::class, 'ctrl_editwisatastore'])->name('ctrl_editwisatastore');// untuk store data dari edit_wisata
    Route::delete('/wisatadelet/{id}', [ctrl_wisata::class, 'ctrl_wisataDelete'])->name('data.wisatdelet');

});
