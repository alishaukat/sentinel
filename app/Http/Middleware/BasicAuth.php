<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel; 
use Session; 

class BasicAuth
{    
    protected $user;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */    
    public function handle($request, Closure $next)
    {
        $this->user = Sentinel::getUser();
         
        if ( !$this->user ) {
            
            $error = 'Your are not logged in please login first';

             if ( $request->ajax() || $request->wantsJson() ) {
                
                Session::flash('error', $error); 

                return response('Unauthorized.', 401);
            }
            
            return redirect()->route('login')
                    ->with('error', $error);
        }

        return $next($request);
    }
}
