<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có role = 1
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }

        // Nếu không, chuyển hướng đến trang khác (ví dụ: trang chủ)
        return redirect()->route('client.index');
    }
}
