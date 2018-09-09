<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Http\Requests\Front\SignInRequest;
use App\Http\Requests\Front\SignUpRequest;


class AuthController extends Controller
{
    public function signInForm()
            {
        return view('front.auth.sign_in');
            }
            
            public function signInAttempt(SignInRequest $request) 
                    {
                $email = $request->get('email');
                $password = $request->get('password');
                $remember = $request->get('remember_me');

                
                if(Auth::attempt(['email'=>$email, 'password'=>$password], $remember)){
                    return redirect()->route('home');
                }
                return redirect()->back()->withErrors(['Wrong email or password']);
            }
            
             public function signUpForm()
            {
        return view('front.auth.sign_up');
            }
            /**
             * sign up a new user
             * 
             * @param SignUpRequest $request
             * @return redirect
             */
            
          public function signUpAttempt(SignUpRequest $request){
              
             
              $params = $request->all();
              $params['role_id'] = 2;
              
              $user = User::create($params);
              
              if($user){
                  return redirect()->route('sign_in_form');
              }
              return redirect()->back()->withErrors(['Failed to create a new user']);
          }
          
          public function signOut(){
              Auth::logout();
              
              return redirect()->route('home');
          }
}
