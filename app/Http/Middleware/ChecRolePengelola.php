<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ChecRolePengelola
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user =Auth::guard('pengelola')->user();

        if (! $user) {
            return redirect()->route('login.pengelola');
        }

        if ($role === 'admin' && $user->lvl !== 'admin') {
            return redirect()->route('admin.dashboard');
        }elseif ($role === 'petugas' && $user->lvl !== 'petugas') {
            return redirect()->route('petugas.dashboard');
        }
        return $next($request);
    }
}
