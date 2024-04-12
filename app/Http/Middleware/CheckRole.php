<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        
        if (Auth::check()) {
            
            $user = Auth::user();
            if (Auth::check() && (Auth::user()->hasRole($role) || Auth::user()->hasRole('admin'))) {
                return $next($request);
            }    
        }
       
        abort(403, 'Access denied');
    }
}
