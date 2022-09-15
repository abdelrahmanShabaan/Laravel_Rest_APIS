<?php

namespace App\Http\Middleware;

use Closure;
use PhpParser\Node\Stmt\Return_;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->api_password !== env ('API_PASSWORD', 'fyInI33RFe3mdncsXnhFb0NsbSS')){
            return response()->josn(['message'=> 'Unauthenticated.']);
        }
        return $next($request);
    }
}
