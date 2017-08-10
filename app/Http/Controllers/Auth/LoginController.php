<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)
    {
        /*
         * redirect back to intended was not working
         * this script ensures redirect back to the page
         * where the request came from
         */
        $previous = Session::get("_previous");
        $url = route('home');
        if(!empty($previous) && 
                !empty($previous['url']) && 
                $previous['url'] != route('logout'))
        {
            $url = $previous['url'];
        }
        return view('auth.login')
                    ->with('url', $url);
    }
    
    public function postLogin(LoginRequest $request)
    {
        try
        {
            $credentials = [
                'email'    => $request->get('email'),
                'password' => $request->get('password')
            ];
            
            $remember = !empty($request->input('remember', false));
            
            if (Sentinel::authenticate($credentials, $remember))
            {
                $referer = $request->input('url', route('home'));
                if(empty($referer)){
                    return redirect()->intended('/');
                }else{
                    return redirect()->to($referer);
                }
            }
            else
            {
                return redirect()->back()
                        ->with(['error' => 'Wrong credentials'])
                        ->withInput();
            }
        }
        catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e)        
        {
            $error = 'Your account is not activated!';
            Session::flash('error' , $error );
            return redirect()->back()->with('user', $e->getUser())->withInput();
        }
        
        catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $e)
        
        {
            $delay = $e->getDelay();
            $error = "Your account is blocked for {$delay} second(s).";
            Session::flash('error' , $error );
            return redirect()->back()->withInput();
        }
        
        return redirect()->back()
            ->withInput()
            ->withErrors($errors);
    }
    
    public function logout()
    {
        Sentinel::logout();
        Session::flash('success' , "Successfully Logged Out" );
        return redirect()->route('login');
    }
}
