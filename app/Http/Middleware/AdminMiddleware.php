<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Http\Request;

class AdminMiddleware
{
    protected $auth;

    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }
    public function handle(Request $request, Closure $next, $guard = null, $field = null)
    {
        $this->auth->guard($guard);
        return $next($request);
    }
}
