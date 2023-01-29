<?php

namespace App\Http\Controllers;
use App\Models\Contactform;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function contactForm(){
        return view('contactform');
    }

    public function sendContactMessage(Request $req){
            
        $validate = Validator::make($req->all(), [
            'fullname' => ['required',  'string', 'regex:/^[\pL\s]+$/u', 'max:30'],
            'email' => ['required', 'regex:/^.+@.+$/i', 'email:rfc,dns'],
            'subject' => ['required'],
            'message' => ['required']
        ]);
        
        if ($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate);
        }else{

            $name = $req->fullname;  
            $email = $req->email;
            $subject = $req->subject;
            $message_content = $req->message;

            $message = new Contactform();
            $message->fullname = $name;
            $message->email = $email;
            $message->subject = $subject;
            $message->message = $message_content ;
            $message_sent = $message->save();

            if($message_sent){
                return redirect()->back()->with('success','Message sent successfully, you will get a response soon');
            }else{
                return redirect()->back()->with('error','Message could not be process, kindly try again later ');
            }
        }

        

    }
}