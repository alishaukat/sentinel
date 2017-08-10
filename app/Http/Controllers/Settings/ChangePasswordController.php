<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\AdminBaseController;
use Sentinel;
use Session;

class ChangePasswordController extends AdminBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function changePassword()
    {
        return view('settings.change-password');
    }
    
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $loggedInUser = Sentinel::getUser();
        $credentials = [
            'email'     => $loggedInUser->email,
            'password'  => $request->input('current_password')
        ];
        
        if($user = Sentinel::authenticate($credentials))
        {
            $newCredentials = [
                'password' => $request->input('new_password')
            ];
            $user = Sentinel::update($user, $newCredentials);
            Session::flash('success' , "Password updated successfully!");
            return redirect()->route('profile');
        }else{
            return redirect()->back()
                    ->with('error', "Current password is incorrect")
                    ->withInput();
        }
        
    }
    
    
}
