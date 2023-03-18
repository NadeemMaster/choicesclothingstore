<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Mail\ReplyMail;
use App\Mail\NotifyMail;
use App\Models\Contactus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function contactus()
    {
        return view('pages.contact');
    }
    
    public function sendmsg(Request $request)
    {
       $validatedinfo = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:10',
            'message' => 'required|min:50',
        ]);

        $msg = new Contactus();
        
        $msg->name = $validatedinfo['name'];
        $msg->email = $validatedinfo['email'];
        $msg->subject = $validatedinfo['subject'];
        $msg->message = $validatedinfo['message'];

        $save = $msg->save();

        if ($save){

            $msginfo = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
            ];

            Mail::to('info.choicesclothingstore@gmail.com')->send(new NotifyMail($msginfo));
            Mail::to($msginfo['email'])->send(new ReplyMail($msginfo));

        return redirect()->route('contactus')->with('success', 'Your message has been sent successfuly.');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function index()
    {
        return view('admin.contactus.index');
    }

}
