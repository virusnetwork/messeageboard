<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        $this->auth = auth()->user() ? (auth()->user()->role === 'admin') : false;

        if($this->auth === true)
        {
            return $next($request);
        }

        return redirect()->route('login')->with('error','Access denied. Login to continue');
    }
}
