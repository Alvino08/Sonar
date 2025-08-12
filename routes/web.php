<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jadwal;
use Carbon\Carbon;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AudiopostController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

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

Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');

// Route::get('/audiopost', function () {
//     // Ambil semua tanggal dari jadwal, dan ubah ke format string Y-m-d
    
//     $tanggalTerisi = Jadwal::pluck('tanggal')->map(function ($date) {
//         return Carbon::parse($date)->format('Y-m-d');
//     });

//     return view('audiopost', ['tanggalTerisi' => $tanggalTerisi]);
// })->name("audiopost");

// Hanya pakai satu ini saja
// Route::get('/audiopost', [AudiopostController::class, 'audiopost'])->name("audiopost");

Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

// Route::post('/audiopost/store', [AudiopostController::class, 'store'])->name('audiopost.store');
// Route::delete('/audiopost/{id}', [AudiopostController::class, 'destroy'])->name('audiopost.destroy');

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::get('auth/google', [GoogleController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback',[GoogleController::class, 'googleAuthentication'])->name('auth.google-callback');

// Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/audiopost', [AudiopostController::class, 'audiopost'])->name("audiopost");
    Route::post('/audiopost/store', [AudiopostController::class, 'store'])->name('audiopost.store');
    Route::delete('/audiopost/{id}', [AudiopostController::class, 'destroy'])->name('audiopost.destroy');

    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
});

// Halaman verifikasi email
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/profile');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');

    // Route::get('/profile', function () {
    //     $user = Auth::user(); // Ambil data user yang sedang login
    //     return view('profile', compact('user'));
    // })->name('profile');
});

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Route::get('/profile', function () {
//     return view('profile');
// })->name("profile");

Route::middleware(['auth'])->get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::middleware(['auth'])->put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/'); // arahkan ke halaman utama setelah login
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
})->name('login.post');