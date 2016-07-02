<?php
namespace CorpseFinder\Http\Middleware;

use Closure;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            return view('layouts.main.page-not-found');
        }
        return $next($request);
    }
}