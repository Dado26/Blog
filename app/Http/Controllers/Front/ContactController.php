<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SendContactEmailRequest;
use App\Mail\Contact;
use Mail;
use Swift_TransportException;

class ContactController extends Controller
{
    /**
     * show contact form
     * 
     * @return view
     */
    
    public function showForm()
            {
        return view('front.contact');
        
    }
    
    public function sendEmailAttempt(SendContactEmailRequest $request){
        $data = $request->all();
        
        try{ 
        Mail::to('admin@webdev-blog.com')->send(new Contact($data));
         flash('Your message was sent succesfully!')->success();
        
        }catch(Swift_TransportException $exception){
            
            flash('Whoops... something went wrong, you message was not sent.')->error();
        }
       
        
        return redirect()->back();
    }
}
