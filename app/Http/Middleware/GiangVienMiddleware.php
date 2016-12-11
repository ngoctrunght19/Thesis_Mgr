<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class giangVienMiddleware
{

    public function handle($request, Closure $next)
    {
          if (!\Auth::user()->isGiangVien()) {
            if ($request->ajax()) {
                return response('Giang vien account required.', 401);
            } else {
                return redirect('/login');
            }
          }

        return $next($request);
    }
}
