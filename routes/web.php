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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/audiopost2', fn () => view('audiopost2'))->name("audiopost2");
Route::get('/loading', fn () => view('loading'))->name("loading");
Route::get('/logo', fn () => view('logo-sonar'))->name("logo");
// Route::get('/admin', fn () => view('admin'))->name("admin");
Route::get('/label', fn () => view('label'))->name('label');

// ===============================
// 🔒 Hanya untuk user BELUM login
// ===============================
Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => view('login'))->name("login");

    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // redirect ke halaman utama
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    })->name('login.post');

    Route::get('/register', fn () => view('register'))->name("register");
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});

// ===============================
// 🔒 Hanya untuk user yang login & email terverifikasi
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/audiopost', [AudiopostController::class, 'audiopost'])->name("audiopost");
});

// ===============================
// 📧 Email Verification Routes
// ===============================
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', fn () => view('auth.verify-email'))
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/profile');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

// ===============================
// 👤 Profile (hanya untuk login user)
// ===============================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ===============================
// 🔑 Logout
// ===============================
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ===============================
// 🌐 Google Auth
// ===============================
Route::get('auth/google', [GoogleController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback', [GoogleController::class, 'googleAuthentication'])->name('auth.google-callback');

// ===============================
// 🔒 Hanya untuk Admin
// ===============================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        if (!Auth::check() || Auth::user()->is_admin !== 1) {
            return redirect('/')->with('error', 'Anda tidak punya akses ke halaman admin');
        }
        return view('admin');
    })->name('admin');

    // Admin bisa kelola Audiopost
    Route::post('/audiopost/store', [AudiopostController::class, 'store'])->name('audiopost.store');
    Route::delete('/audiopost/{id}', [AudiopostController::class, 'destroy'])->name('audiopost.destroy');

    // Admin bisa kelola Jadwal
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
});