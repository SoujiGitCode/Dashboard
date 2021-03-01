<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        try {
            $user = Auth::user();
            $user_role = $user->role->slug;

            foreach ($roles as $role) {
                if($user_role == $role) return $next($request);
            }

            return redirect()->route('root');

        } catch (Exception $e) {
            //
        }
    }
}
