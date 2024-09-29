<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$status): Response
    {
        if(auth()->user()->status!==$status){
            return redirect()->to('/unathrized-action')->with('error','you are not authorized to access this page');

        }
        return $next($request);
    }
}
