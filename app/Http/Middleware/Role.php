<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if (in_array($request->user()->role, $role)) {
            return $next($request);
        }

        if ($request->user()->role === 'user') {

            return redirect()->back()->with('message', 'Anda tidak memiliki hak akses yang valid');
        } else {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
