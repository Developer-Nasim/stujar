<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = Auth::user()->role_id;
        if($role_id ==1 || $role_id ==2 || $role_id == 3 || $role_id == 4){
            // dd($next($request));
            return $next($request);
        }

        else{
        //    dd('not authorized');
           return redirect('member/edit');
        }       
    }
}
