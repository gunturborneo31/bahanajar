<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('pages.home');
})->name('home');

Route::get('/tentang', function () {
	return view('pages.tentang');
})->name('tentang');
Route::get('/profil', fn() => view('pages.profil'))->name('profil');
Route::get('/kontak', fn() => view('pages.kontak'))->name('kontak');
Route::get('/materi', fn() => view('pages.materi'))->name('materi');
Route::get('/materi/{slug}', fn($slug) => view('pages.materi-detail', compact('slug')))->name('materi.detail');


use App\Http\Controllers\PeraturanController;

Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan');
Route::get('/peraturan/{id}', [PeraturanController::class, 'show'])->name('peraturan.detail');

Route::get('/materi', fn() => view('pages.materi'))->name('materi');
Route::get('/materi/{slug}', fn($slug) => view('pages.materi-detail', compact('slug')))->name('materi.detail');

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
Route::get('/admin/materi/edit', fn() => view('admin.edit-material'))->name('admin.edit-material');


Route::get('/scrape-inaproc', [PeraturanController::class, 'scrapeInaprocSections']);
Route::get('/update-inaproc-final', [PeraturanController::class, 'updateInaproc3Jenis']);