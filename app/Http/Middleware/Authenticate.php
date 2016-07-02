<?php

namespace CorpseFinder\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $role)
    {
        if($role == 'all')
        {
            return $next($request);
        }
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return view('layouts.main.page-not-found');
            } else {
                return redirect()->guest('/');
            }
        }
        if( $this->auth->guest() || !$this->auth->user()->hasRole($role))
        {
            return view('layouts.main.page-not-found');
        }
        return $next($request);
    }
}
