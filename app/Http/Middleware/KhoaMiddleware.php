<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KhoaMiddleware
{

    public function handle($request, Closure $next)
    {
          if (!\Auth::user()->isKhoa()) {
            if ($request->ajax()) {
                return response('Khoa account required.', 401);
            } else {
                return redirect('/login');
            }
          }

        return $next($request);
    }
}
