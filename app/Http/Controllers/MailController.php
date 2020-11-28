<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use App\Mail\mailingList as MailMailingList;
use App\Mail\sendMail;
use App\MailingList;
use App\Message;
use App\User;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function index() {
        $emails = MailingList::all();

        return view('mail_form', compact('emails'));
    }

    public function sendEmail(Request $request) {
        $message = new Message;
        $message->sender = Auth::user()->email;
        $message->subject = $request->subject;
        $message->receiver = $request->emails;
        $message->body = $request->body;
        // dd($message);

        // $emails = ['me@email.com', 'you@email.com'];

        foreach ($request->emails as $email) {
            $data = $message;
            Mail::to($email)->send(new sendMail($data));
        }

        // return response()->json([
        //     'message' => 'Email has been sent.'
        // ], Response::HTTP_OK);

        return redirect()->back();
    }

    public function scheduleMail() {
        // $dateH = date('H:i');
        // if(date('w')==0){
        //     $dateW = 7;
        // }
        // else{
        //     $dateW = date('w');
        // }

        // $messages = Messages::where('hour',$dateH)->where('weekday',$dateW)->get();
        // foreach($messages as $message){
        //     $data = ["content" => $message->content , "subject" => $message->subject];
        //     $maild_id_str = $message->receiver;
        //     $email_user_id = explode(",",$maild_id_str);
        //     $users = User::whereIn('id',$email_user_id)->get();
        //     foreach($users as $user){
        //         Mail::to($user->email)->send(new SendMail($data));
        //     }
        // }
    }

    public function mailingListStore(Request $request) {
        MailingList::create([
            'email'  =>  $request['email'],
        ]);
        Mail::to($request->email)->send(new MailMailingList);

        return redirect()->back();
    }
}
