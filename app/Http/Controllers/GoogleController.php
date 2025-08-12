<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication(){

        try {
            $googleUser = Socialite::driver('google')->user();

            // Ambil user berdasarkan google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('welcome'); // atau route tujuan setelah login
            } else {
                // Jika user belum ada, buat user baru misal:
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(16)),
                    'email_verified_at' => now(), // langsung verified
                    // password bisa diisi null atau random string kalau tidak dipakai
                ]);
                Auth::login($user);
                return redirect()->route('welcome');
            }
        } catch (Exception $e) {
            dd($e);
        }

        
    }

}
