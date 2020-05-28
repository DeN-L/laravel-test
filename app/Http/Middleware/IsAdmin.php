<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class IsAdmin
 * @package App\Http\Middleware
 *
 * @link https://www.youtube.com/watch?v=F8Sf7aSDLtc
 */
class IsAdmin
{
    /**
     * ID of admin.
     */
    const ADMIN_ID = 1;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user->id !== self::ADMIN_ID) {
            session()->flash('error', 'Access denied!');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
