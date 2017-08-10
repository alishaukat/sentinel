<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;

class ActivationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function activate(Request $request, $email, $code)
    {
        $credentials = [
            'login' => $email,
        ];
        $user = Sentinel::findByCredentials($credentials);

        if(Activation::completed($user))
        {
            $request->session()->flash('success', 'Your account is already active');
            return redirect('/login');
        }
        
    	if(Activation::complete($user, $code))
    	{
            $request->session()->flash('success', 'Your account has been activated');
            return redirect('/login');
    	}
    	else
    	{
            $request->session()->flash('error', 'Invalid Activation Code or Email');
            return redirect('/login');
    	}
    }
}
