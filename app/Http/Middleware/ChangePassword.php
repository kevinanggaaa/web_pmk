<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePassword
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
        if (Auth::check()){
            $user = Auth::user();
            $ultah = explode('-', $user->birthdate);
            $year = $ultah[0];
            $month = $ultah[1];
            $day  = $ultah[2];
            $ultah = $day . '' . $month . '' . $year;
            if(!(Hash::check($ultah, $user->password))){
                return $next($request);
            }
            else{
                return response()->view('users.changePassword', compact('user'));
            }
        }
        return redirect('/');
    }
}
