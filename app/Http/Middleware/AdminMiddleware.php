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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // تحقق إذا كان المستخدم مسجلاً وله صلاحية الأدمن
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // إذا لم يكن أدمن، يعاد توجيهه إلى الصفحة الرئيسية أو صفحة تسجيل الدخول
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
