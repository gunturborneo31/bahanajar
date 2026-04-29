
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PeraturanController;
use App\Models\Pelatihan;

// Home
Route::get('/', fn() => view('pages.home'))->name('home');



// Peraturan
Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan');
Route::get('/peraturan/{id}', [PeraturanController::class, 'show'])->name('peraturan.detail');

// Dokumen
Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');
Route::get('/dokumen/{id}', [DokumenController::class, 'show'])->name('dokumen.detail');

// Panduan
use App\Http\Controllers\PanduanController;
Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');
Route::get('/panduan/{slug}', fn($slug) => view('pages.panduan-detail', compact('slug')))->name('panduan.detail');

// FAQ
use App\Http\Controllers\FaqController;
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Lab LPSE
use Illuminate\Support\Carbon;
Route::get('/lab-lpse', function (\Illuminate\Http\Request $request) {
    $query = Pelatihan::query();
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
    if ($request->filled('jenis')) {
        $query->where('jenis', $request->input('jenis'));
    }
    if ($request->filled('bulan')) {
        $bulan = $request->input('bulan');
        $query->whereRaw('DATE_FORMAT(tanggal_mulai, "%Y-%m") = ?', [$bulan]);
    }
    if ($request->filled('metode')) {
        $query->where('metode', $request->input('metode'));
    }
    // Hanya pelatihan yang akan datang
    $query->where('tanggal_mulai', '>=', Carbon::today());
    $query->orderBy('tanggal_mulai');
    $pelatihans = $query->paginate(10)->withQueryString();

    // Data event kalender (semua pelatihan akan datang)
    $events = [];
    foreach (Pelatihan::where('tanggal_mulai', '>=', Carbon::today())->get() as $p) {
        $events[] = [
            'id' => $p->id,
            'title' => $p->nama,
            'start' => $p->tanggal_mulai,
            'end' => $p->tanggal_selesai > $p->tanggal_mulai ? Carbon::parse($p->tanggal_selesai)->addDay()->format('Y-m-d') : null,
            'color' => $p->jenis === 'SERTIFIKASI' ? '#16a34a' : ($p->jenis === 'PBJP DASAR' ? '#2563eb' : '#b91c1c'),
        ];
    }
    return view('pages.lab-lpse', compact('pelatihans', 'events'));
})->name('lab-lpse');

// Halaman statis
Route::get('/tentang', fn() => view('pages.tentang'))->name('tentang');
Route::get('/profil', fn() => view('pages.profil'))->name('profil');
Route::get('/kontak', fn() => view('pages.kontak'))->name('kontak');
Route::get('/pengaturan', fn() => view('pages.pengaturan'))->name('pengaturan');

// Auth & Admin
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
Route::get('/admin/materi/edit', fn() => view('admin.edit-material'))->name('admin.edit-material');

// Peraturan tools
Route::get('/scrape-inaproc', [PeraturanController::class, 'scrapeInaprocSections']);
Route::get('/update-inaproc-final', [PeraturanController::class, 'updateInaproc3Jenis']);
