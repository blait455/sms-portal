<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use App\Mail\sendMail;
use App\Message;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function index() {
        return view('mail_form');
    }

    public function sendEmail(Request $request) {
        $message = new Message;
        $message->sender = $request->sender;
        $message->subject = $request->subject;
        $message->receiver = $request->receiver;
        $message->content = $request->content;
        // dd($message);

        $emails = ['me@email.com', 'you@email.com'];

        foreach ($emails as $mail) {
            $data = $message;

            Mail::to($mail)->send(new sendMail($data));
        }
        $email = $message->receiver;

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);


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
}
