<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request, check if user is authorized to view the 
     * resource.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles): Response
    {
        if (!in_array(auth()->user()->role->toString(), $allowedRoles)) {
            abort(403, 'Unauthorized action');
        }
        return $next($request);
    }
}
