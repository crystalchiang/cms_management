<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if($request->user()){
            $roles = explode(',', $request->user()->menuroles);
            if ( ! in_array('admin', $roles) && ! in_array('mywayAdmin', $roles) && ! in_array('schoolAdmin', $roles)) {
                return abort( 401 );
            }
        }
        
        return $next($request);
    }
}
