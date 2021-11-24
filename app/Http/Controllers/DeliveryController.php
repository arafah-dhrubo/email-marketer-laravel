<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Collection;
use App\Mail\EmailTemplate;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{
    public function index($id)
    {
        $email = Email::find($id);
        $collections = Collection::where('user_id', \auth()->user()->id)->paginate(5);
        return view('email', compact('collections', 'email'));
    }

    public function send($eid, $cid)
    {
        $email_address = Collection::find($cid)->email;
        $email = Email::find($eid);
        $data = [
            'title' => $email->title,
            'body' => $email->body
        ];

        Mail::to($email_address)->send(new EmailTemplate($data));

        $collections = Collection::where('user_id', \auth()->user()->id)->paginate(5);
        return view('email', compact('collections', 'email'));
    }
}
