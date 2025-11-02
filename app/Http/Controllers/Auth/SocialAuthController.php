<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    // Redirect ke Google (untuk user biasa)
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Redirect ke Google untuk Admin
    public function redirectToGoogleAdmin()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Handle Google callback untuk Admin
    public function handleGoogleCallbackAdmin()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if (!$user) {
                return redirect('/admin/login')->with('error', 'Email tidak terdaftar sebagai admin.');
            }
            
            if (!$user->is_admin) {
                return redirect('/admin/login')->with('error', 'Akun ini bukan admin.');
            }
            
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]);
            
            Auth::login($user, true);
            return redirect()->route('admin.dashboard')->with('success', 'Login admin berhasil!');
            
        } catch (\Exception $e) {
            \Log::error('Google Admin Login Error: ' . $e->getMessage());
            return redirect('/admin/login')->with('error', 'Login dengan Google gagal.');
        }
    }

    // Handle Google callback (untuk user biasa)
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => Hash::make(uniqid()),
                    'is_admin' => false,
                    'email_verified_at' => now(),
                ]);
            } else {
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
                
                if (!$user->hasVerifiedEmail()) {
                    $user->markEmailAsVerified();
                }
            }
            
            Auth::login($user, true);
            return redirect()->intended('/')->with('success', 'Login berhasil!');
            
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/auth/login')->with('error', 'Login dengan Google gagal.');
        }
    }

    // Redirect ke GitHub
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    // Handle GitHub callback
    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            
            // GitHub mungkin tidak memberikan email, jadi kita perlu handle
            $email = $githubUser->getEmail() ?? $githubUser->getNickname() . '@github.com';
            
            $user = User::where('email', $email)->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                    'email' => $email,
                    'github_id' => $githubUser->getId(),
                    'avatar' => $githubUser->getAvatar(),
                    'password' => Hash::make(uniqid()),
                    'is_admin' => false,
                    'email_verified_at' => now(), // Auto-verify untuk GitHub
                ]);
            } else {
                $user->update([
                    'github_id' => $githubUser->getId(),
                    'avatar' => $githubUser->getAvatar(),
                ]);
                
                if (!$user->hasVerifiedEmail()) {
                    $user->markEmailAsVerified();
                }
            }
            
            Auth::login($user, true);
            return redirect()->intended('/')->with('success', 'Login dengan GitHub berhasil!');
            
        } catch (\Exception $e) {
            \Log::error('GitHub Login Error: ' . $e->getMessage());
            return redirect('/auth/login')->with('error', 'Login dengan GitHub gagal: ' . $e->getMessage());
        }
    }

    // Redirect ke GitHub untuk Admin
    public function redirectToGithubAdmin()
    {
        return Socialite::driver('github')->redirect();
    }

    // Handle GitHub callback untuk Admin
    public function handleGithubCallbackAdmin()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            
            $email = $githubUser->getEmail() ?? $githubUser->getNickname() . '@github.com';
            
            $user = User::where('email', $email)->first();
            
            if (!$user) {
                return redirect('/admin/login')->with('error', 'Email tidak terdaftar sebagai admin.');
            }
            
            if (!$user->is_admin) {
                return redirect('/admin/login')->with('error', 'Akun ini bukan admin.');
            }
            
            $user->update([
                'github_id' => $githubUser->getId(),
                'avatar' => $githubUser->getAvatar(),
            ]);
            
            Auth::login($user, true);
            return redirect()->route('admin.dashboard')->with('success', 'Login admin dengan GitHub berhasil!');
            
        } catch (\Exception $e) {
            \Log::error('GitHub Admin Login Error: ' . $e->getMessage());
            return redirect('/admin/login')->with('error', 'Login dengan GitHub gagal.');
        }
    }
}