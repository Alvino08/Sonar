<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jadwal;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/audiopost', function () {
//     return view('audiopost');
// })->name("audiopost");

Route::get('/audiopost2', function () {
    return view('audiopost2');
})->name("audiopost2");

Route::get('/loading', function () {
    return view('loading');
})->name("loading");

Route::get('/logo', function () {
    return view('logo-sonar');
})->name("logo");

Route::get('/admin', function () {
    return view('admin');
})->name("admin");

Route::post('/jadwal/store', [\App\Http\Controllers\JadwalController::class, 'store'])->name('jadwal.store');

Route::get('/audiopost', function () {
    // Ambil semua tanggal dari jadwal, dan ubah ke format string Y-m-d
    
    $tanggalTerisi = Jadwal::pluck('tanggal')->map(function ($date) {
        return Carbon::parse($date)->format('Y-m-d');
    });

    return view('audiopost', ['tanggalTerisi' => $tanggalTerisi]);
})->name("audiopost");

// use Laravel\Socialite\Facades\Socialite;

// Route::get('/google/redirect', function () {
//     return Socialite::driver('google')
//         ->scopes(['https://www.googleapis.com/auth/calendar'])
//         ->stateless()
//         ->redirect();
// });

// Route::get('/google/callback', function () {
//     $user = Socialite::driver('google')->stateless()->user();

//     // Simpan token ke session (atau nanti bisa ke database)
//     session(['google_token' => $user->token]);

//     return redirect('/'); // Kembali ke dashboard atau halaman admin
// });
