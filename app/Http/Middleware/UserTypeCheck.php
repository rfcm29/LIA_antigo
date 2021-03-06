<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth;
use App\Models\User_type;
use Closure;
use Illuminate\Http\Request;

class UserTypeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user() == null){
            abort(404);
        }

        $userType = User_type::find(auth()->user()->user_type);

        if($userType->descricao == 'admin'){
            return $next($request);
        }

        if($userType->id == 2 && ($request->path() == 'espacoLia')){
            return $next($request);
        }

        abort(404);
    }
}
