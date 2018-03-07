<?php

namespace Bantenprov\LajuInflasiKota\Http\Middleware;

use Closure;

/**
 * The LajuInflasiKotaMiddleware class.
 *
 * @package Bantenprov\LajuInflasiKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LajuInflasiKotaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
