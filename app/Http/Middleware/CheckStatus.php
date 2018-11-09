<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CheckStatus
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
        if($request->user() && $request->user()->status == 'pending'){
            return redirect('/customer-verification-page');
        }
        if($request->user() && $request->user()->status == 'inactive'){
            return new Response(view('user.templates.unauthorized'));
        }
        return $next($request);
    }
}
