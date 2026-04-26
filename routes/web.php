<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('pages.home');
})->name('home');


use App\Models\Pelatihan;
Route::get('/lab-lpse', function (\Illuminate\Http\Request $request) {
	// Query builder dasar
	$query = Pelatihan::query();

	// Search
	if ($request->filled('search')) {
		$search = $request->input('search');
		$query->where(function($q) use ($search) {
			$q->where('nama', 'like', "%$search%")
			  ->orWhere('jenis', 'like', "%$search%")
			  ->orWhere('lokasi', 'like', "%$search%")
			  ->orWhere('status', 'like', "%$search%")
			  ;
		});
	}
	// Filter Jenis
	if ($request->filled('jenis')) {
		$query->where('jenis', $request->input('jenis'));
	}
	// Filter Bulan (asumsi ada field tanggal_mulai)
	if ($request->filled('bulan')) {
		$bulan = $request->input('bulan'); // format YYYY-MM
		$query->whereRaw('DATE_FORMAT(tanggal_mulai, "%Y-%m") = ?', [$bulan]);
	}
	// Filter Metode (asumsi ada field metode)
	if ($request->filled('metode')) {
		$query->where('metode', $request->input('metode'));
	}
	// Sort (opsional, default terbaru)
	$query->orderByDesc('created_at');

	$pelatihans = $query->paginate(10)->withQueryString();
	return view('pages.lab-lpse', compact('pelatihans'));
})->name('lab-lpse');

Route::get('/tentang', function () {
	return view('pages.tentang');
})->name('tentang');
Route::get('/profil', fn() => view('pages.profil'))->name('profil');
Route::get('/kontak', fn() => view('pages.kontak'))->name('kontak');

Route::get('/materi', fn() => view('pages.materi'))->name('materi');
Route::get('/materi/{slug}', fn($slug) => view('pages.materi-detail', compact('slug')))->name('materi.detail');


use App\Http\Controllers\DokumenPengadaanController;
Route::get('/dokumen', [DokumenPengadaanController::class, 'index'])->name('dokumen');
Route::get('/dokumen/{id}', [DokumenPengadaanController::class, 'show'])->name('dokumen.detail');


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

Route::get('/pengaturan', fn() => view('pages.pengaturan'))->name('pengaturan');
