<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use Session;

class SiteController extends Controller
{

    public function getIndex()
    {

    }


    public function getAbout()
    {
        
    }


    public function getContact()
    {
        return view('pages.contact');
    }


    public function postContact(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',    
            'subject' => 'required|min:3',    
            'message' => 'required|min:10']);

        $data = array(
            'email' => $request->email,   
            'subject' => $request->subject,   
            'message' => $request->message   
        );



        Mail::send('emails.contact', $data, function ($message) use ($data){
            
            $message->from($data['email']);
            $message->to('gabrieledolfi1992@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your mail was sent!');

        return redirect()->route('contact');
        

        // $email = $request->input('email');
        // $subject = $request->input('subject');
        // $message = $request->input('message');

       

        // Mail::send('emails.contact', ['email' => $email, 'subject' => $subject, 'message' => $message], function ($message) use ($data)
        // {
  

        //     $message->from($data['email']);

        //     $message->to('gabrieledolfi1992@gmail.com');

        //     //Add a subject
        //     $message->subject("Hello from Scotch");

        // });
    }
}
