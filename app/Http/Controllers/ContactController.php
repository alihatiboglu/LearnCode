<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\contact;

class ContactController extends Controller
{
    public function index(){
    	return view("contact");
    }
    public function send(Request $request){
    	$name = $request->name;
    	$email = $request->email;
    	$subject = $request->subject;
    	$message = $request->message;

    	if(Mail::to($email)->send(new contact($name, $email, $subject, $message))){
    		return redirect('/contact')->withStatus("Your Emails has been sent successfully.");
    	}else{
    		 return redirect('/contact')->withStatus("Something worng, Try again Later !");

    	}
    }
}
