<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HocVienMiddleware
{

    public function handle($request, Closure $next)
    {
          if (!\Auth::user()->isHocVien()) {
            if ($request->ajax()) {
                return response('Hoc vien account required.', 401);
            } else {
                return redirect('/login');
            }
          }

        return $next($request);
    }
}
