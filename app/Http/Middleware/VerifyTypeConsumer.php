<?php

namespace App\Http\Middleware;

use Closure;

class VerifyTypeConsumer
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
      if($request->session()->get('role') == 2)
      {
          return $next($request);
      }
      else
      {
          return redirect()->route('signin.justify');
      }
    }
}
