<?php

namespace App\Http\Middleware;

use App\Models\Sessions;
use Closure;
use Illuminate\Http\Request;
//use Concerns\InteractsWithInput;

class AuthorizationMiddleWare
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
        $token = $request->bearerToken();
        $isAuthorized = Sessions::where("token", $token)->get();
        if (!$isAuthorized->isEmpty()) {
            return $next($request);
        }else{
            return response(["success"=>false,"message"=>"you are Unauthorized to access"],403);
        }
    }
}
