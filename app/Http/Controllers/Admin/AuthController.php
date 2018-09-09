<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Http\Requests\Front\SignInRequest;


class AuthController extends Controller
{
    public function signInForm()
            {
        return view('admin.sign_in');
            }
            
            public function signInAttempt(SignInRequest $request) 
                    {
                $email = $request->get('email');
                $password = $request->get('password');
                $remember = $request->get('remember_me');
                
                
               // check is user is admin 
               $is_admin = false;
               $user = User::where('email', $email)->first();
                
               if($user){
                   $is_admin = $user->isAdmin();
               }
               
               // try to authenticate user
                if($is_admin && Auth::attempt(['email'=>$email, 'password'=>$password], $remember)){
                    return redirect()->route('posts.index');
                }
                return redirect()->back()->withErrors(['Wrong email or password']);
            }
            
          
          public function signOut(){
              Auth::logout();
              
              return redirect()->route('admin.sign_in_form');
          }
}
