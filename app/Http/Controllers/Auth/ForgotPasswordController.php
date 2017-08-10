<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Http\Request;
use Sentinel;
use Reminder;
use Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    public function forgotPassword()
    {
        return view('auth/forgot-password');
    }
    
    public function postForgotPassword(ForgotPasswordRequest $request)
    {        
        $credentials = [
            'login' => $request->input('email'),
        ];
        $user = Sentinel::findByCredentials($credentials);
        if(!$user){
            return back()->with(["error" => "Email not registered"])
                ->withInput();
        }
        $reminder = Reminder::exists($user);
        if(!$reminder)
        {
            $reminder = Reminder::create($user);
        }
        
        $link = route('password-reset', array('email' => urlencode($credentials['login']), 'code' => urlencode($reminder->code)));
        echo "Password Reset Link: <a href='".$link."'>".$link."</a>";
    }
    
    public function passwordReset(Request $request, $email, $code)
    {
        $credentials = [
            'login' => $email,
        ];
        $user = Sentinel::findByCredentials($credentials);

        if(count($user) == 0){
            return redirect("forgot-password")->with('error', 'Password reset link is not valid');
        }

        if($reminder = Reminder::exists($user))
        {
            if($code == $reminder->code){
                return view('auth/password-reset')
                ->with('code', $code)
                ->with('email', $email);
            }
        }
        else 
        {
            return redirect("forgot-password")->with('error', 'Password reset link is not valid');
        }
    }
    
    public function postPasswordReset(PasswordResetRequest $request, $email, $code)
    {        
        $credentials = [
            'login' => $email,
        ];
        $user = Sentinel::findByCredentials($credentials);

        if(count($user) == 0){
            return redirect("forgot-password")->with('error', 'Password reset link is not valid');
        }
        
        $reminder = Reminder::complete($user, $code, $request->input('password'));
        if ($reminder)
        {
            return redirect()->route('login')
                    ->with('success', 'Password reset successfull');
        }
        else
        {
            return redirect()->route('/')
                ->with('error', 'Password reset link is not valid');
        }
    }
}
