<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailQueue;
use App\Models\Email;
use App\Models\Collection;
use App\Mail\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index($id)
    {
        $email = Email::find($id);
        $collections = Collection::where('user_id', \auth()->user()->id)->paginate(5);
        return view('email', compact('collections', 'email'));
    }

    public function send(Request $request)
    {
        $email = Email::find($request->eid);
        foreach ($request->checkbox as $key => $value) {
            $email_address = Collection::find($value);
            $data = [
                'fname' => $email_address->first_name,
                'lname' => $email_address->last_name,
                'title' => $email->title,
                'body' => $email->body
            ];
            $emailJob = new SendEmailQueue($email_address, $data);

            dispatch($emailJob);
        }
        return redirect('/emails');
    }
}
