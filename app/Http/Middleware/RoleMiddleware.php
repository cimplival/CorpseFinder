<?php
namespace TumshangilieBwana\Http\Middleware;

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
            $request->session()->flash('status', 'Sorry, you don\'t have Access.');
            return redirect('/');
        }
        return $next($request);
    }
}