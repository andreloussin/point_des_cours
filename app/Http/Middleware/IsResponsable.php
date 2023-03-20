<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IsResponsable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        $resp = false;
        try {
            $resp = DB::table('etudiant_responsables')
                ->where('user_id', '=', Auth::user()->id)
                ->count() > 0;
        } catch (\Throwable $th) {
        }
        if ($resp)
            return $next($request);
        else
            return redirect('ecus');
    }
}
