<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
          if (!\Auth::user()->isAdmin()) {
            if ($request->ajax()) {
                return response('Admin account required.', 401);
            } else {
                return redirect('/login');
            }
          }

        return $next($request);
    }
}
