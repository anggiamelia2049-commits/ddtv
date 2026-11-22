<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Videos;
use App\Models\Flyers;
use App\Models\Banners;
use App\Models\RunningText;

class AuthController extends Controller
{
    // 🔹 TAMPILKAN HALAMAN LOGIN
    public function showLogin()
    {
        // kalau sudah login, langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // 🔹 PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard'); // ✅ FIX redirect
        }

        return back()->with('error', 'Email atau password salah');
    }

    // 🔹 DASHBOARD
    public function dashboard()
    {
        $totalVideo = Videos::count();
        $totalFlyer = Flyers::count();
        $totalBanner = Banners::count();
        $totalRunningText = RunningText::count();

        $videoAktif = Videos::where('status', 'aktif')->latest()->take(5)->get();
        $flyerAktif = Flyers::where('status', 'aktif')->latest()->take(5)->get();
        $bannerAktif = Banners::where('status', 'aktif')->latest()->take(5)->get();
        $runningTextAktif = RunningText::where('status', 'aktif')->latest()->take(5)->get();

        $countVideoAktif = Videos::where('status', 'aktif')->count();
        $countFlyerAktif = Flyers::where('status', 'aktif')->count();
        $countBannerAktif = Banners::where('status', 'aktif')->count();
        $countRunningTextAktif = RunningText::where('status', 'aktif')->count();

        return view('auth.dashboard', compact(
            'totalVideo',
            'totalFlyer',
            'totalBanner',
            'totalRunningText',
            'videoAktif',
            'flyerAktif',
            'bannerAktif',
            'runningTextAktif',
            'countVideoAktif',
            'countFlyerAktif',
            'countBannerAktif',
            'countRunningTextAktif'
        ));
    }

    // 🔹 LOGOUT (PAKAI POST BIAR AMAN)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
