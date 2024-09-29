<?php

namespace App\Http\Middleware;

use App\action\message;
use App\Models\course_user;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkEnrolled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $filled=course_user::query()->pluck('filled_id');
        if($filled->isEmpty()){
            return message::error('you must enroll first',404);
        }
        return $next($request);
    }
}
