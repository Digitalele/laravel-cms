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
        return view('pages.about');
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
            'bodyMessage' => $request->message   
        );

        try{
   
            Mail::send('emails.contact', $data, function ($message) use ($data){
                
                $message->from($data['email']);
                $message->to('gabrieledolfi1992@gmail.com');
                $message->subject($data['subject']);
            });
            
            Session::flash('success', 'Your mail was sent!');

            return redirect()->route('contact');

        }
        catch(\Exception $e){
            print_r($e);
        }

    }
}
