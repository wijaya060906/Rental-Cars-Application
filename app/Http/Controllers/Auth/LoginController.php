<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.pengelola_login');
    }

    public function pengelola_login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Debugging: Log the credentials

        if(Auth::guard('pengelola')->attempt($credentials)){
            $pengelola = Auth::guard('pengelola')->user();

            if($pengelola->lvl == 'admin'){
                return redirect()->route('admin.dashboard');
            }elseif($pengelola->lvl == 'petugas'){
                return redirect()->route('petugas.dashboard');
            }else{
                return redirect()->back()->with('error','Anda tidak memiliki akses');
            }
        } else {
            // Debugging: Log the failed attempt
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function logout(Request $request){
        Auth::guard('pengelola')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}