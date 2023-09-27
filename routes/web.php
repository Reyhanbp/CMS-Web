<?php

use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterContactController;
use App\Http\Controllers\MasterProjectController;
use App\Http\Controllers\MasterSiswaController;
use App\Models\MasterProject;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [DashboardController::class, 'Index'])->name('dashboard');


Route::get('/about', [AboutController::class, 'Index'])->name('about');
Route::get('/home', [HomeController::class, 'Index'])->name('home');
Route::get('/project', [ProjectController::class, 'Index'])->name('project');
Route::get('/contact', [ContactController::class, 'Index'])->name('contact');
Route::get('/admin', [AdminController::class, 'Index'])->name('admin');
Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');

// Master Siswa
Route::get('/mastersiswa', [MasterSiswaController::class, 'Index'])->name('mastersiswa');
Route::get('/tambahmastersiswa', [MasterSiswaController::class, 'Tambah'])->name('tambahmastersiswa');
Route::get('/editmastersiswa/{id}', [MasterSiswaController::class, 'Edit'])->name('editmastersiswa');
Route::post('/siswa/send', [MasterSiswaController::class, 'send'])->name('sendsiswa');
Route::post('/siswa/update/{id}', [MasterSiswaController::class, 'Update'])->name('updatesiswa');
Route::DELETE('/siswa/delete/{id}', [MasterSiswaController::class, 'Delete'])->name('deletesiswa');

//Master Contact
Route::get('/mastercontact', [MasterContactController::class, 'Index'])->name('mastercontact');
Route::get('/tambahmastercontact', [MasterContactController::class, 'Tambah'])->name('tambahmastercontact');
Route::post('/contact/send', [MasterContactController::class, 'send'])->name('sendcontact');

//Master Contact_Types
Route::get('/contact_type', [ContactTypeController::class, 'IndexType'])->name('contact_type');
Route::get('/tambahcontact_type', [ContactTypeController::class, 'TambahType'])->name('tambahcontact_type');
Route::post('/contact_type/send', [ContactTypeController::class, 'sendtype'])->name('sendtype');

//project
Route::get('/masterproject', [MasterProjectController::class, 'Index'])->name('masterproject');
Route::get('/masterproject/show/{id}', [MasterProjectController::class, 'show'])->name('showmasterproject');
Route::get('/tambahmasterproject/{id}', [MasterProjectController::class, 'Tambah'])->name('tambahmasterproject');
Route::get('/editmasterproject/{id}', [MasterProjectController::class, 'Edit'])->name('editmasterproject');
Route::post('/project/send', [MasterProjectController::class, 'send'])->name('sendproject');
Route::post('/project/update/{id}', [MasterProjectController::class, 'Update'])->name('updateproject');
Route::DELETE('/project/delete/{id}', [MasterProjectController::class, 'Delete'])->name('deleteproject');
