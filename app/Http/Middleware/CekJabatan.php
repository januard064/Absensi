<?php

namespace App\Http\Middleware;

use Closure;

class CekJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$jabatans)
    {
        if(in_array($request->user()->jabatan, $jabatans)){
            return $next($request);
        } 
        return redirect()->back();

    }
}
