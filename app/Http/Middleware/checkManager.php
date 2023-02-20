<?php

namespace App\Http\Middleware;

use App\Enum\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;

class checkManager
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
        if(Auth()->user()->role == UserRoleEnum::Manager->value){
            return $next($request);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'you are not Manager',
            ], 401);
        }
    }
}
