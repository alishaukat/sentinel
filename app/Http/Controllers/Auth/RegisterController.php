<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Sentinel;
use Activation;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function register() {
        return view('auth.register');
    }
    
    public function postRegister(RegisterUserRequest $request)
    {        
        $credentials = [
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
            'password'      => $request->input('password')
        ];

        $user = Sentinel::register($credentials);

        if($user){
            $activation = Activation::create($user);
            $link = route('activate', array('email' => urlencode($credentials['email']), 'code' => urlencode($activation->code)));
            echo "Activation Link: <a href='".$link."'>".$link."</a>";
        }else{
            return Redirect::back()
            ->withInput()
            ->withErrors($errors);
        }
    }
}
