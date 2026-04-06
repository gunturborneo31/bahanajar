<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/tentang', fn() => view('pages.tentang'))->name('tentang');
Route::get('/profil', fn() => view('pages.profil'))->name('profil');
Route::get('/kontak', fn() => view('pages.kontak'))->name('kontak');
Route::get('/materi', fn() => view('pages.materi'))->name('materi');
Route::get('/materi/{slug}', fn($slug) => view('pages.materi-detail', compact('slug')))->name('materi.detail');
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
Route::get('/admin/materi/edit', fn() => view('admin.edit-material'))->name('admin.edit-material');
