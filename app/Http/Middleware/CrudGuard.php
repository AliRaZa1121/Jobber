<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CrudGuard
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
        $paramUserID = (null !== $request->route('company'))?$request->route('company')->user_id:$request->route('user')->id;
        $authUserID = Auth::user()->id; 
        if(Auth::user()->role->slug === 'admin'){
            return $next($request);
        }
        if(Auth::user()->role->slug === 'user'){
            if($paramUserID === $authUserID){
                return $next($request);
            }
            else{
                $notification = array(
                    'message' => 'Not a valid resource!',
                    'alert-type' => 'error'
                );
                return redirect()->route('dashboard')->with($notification);
            }
        }
    }
}
