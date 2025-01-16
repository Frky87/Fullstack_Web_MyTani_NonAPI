<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if (($role === 'seller' && $user->role_id != 0) || ($role === 'user' && $user->role_id != 1)) {
            abort(403, 'Unauthorized access.');
        } 

        return $next($request);
    }
}
