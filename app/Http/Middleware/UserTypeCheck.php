<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        $user = User::find(session()->get('UserLogged'));
        return $next($request);
    }
}
