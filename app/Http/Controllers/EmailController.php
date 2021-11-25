<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function store(Request $request){
        Email::insert([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'body'=>$request->body,
            'created_at'=>Carbon::now()
        ]);
        return Redirect('/emails')->with('success', 'New email added successfully');
    }

    public function edit(Request $request, $id)
    {
        $email = Email::find($id);
        $emails = Email::where('user_id', auth()->user()->id)->paginate(5);
        return view('templates', compact('email', 'emails'));
    }

    public function update(Request $request, $id){
        $email = Email::find($id);
        $email->title=$request->title;
        $email->body=$request->body;
        $email->save();
        return Redirect('/emails')->with('success', 'New email added successfully');
    }

    public function show($id){
        $email=Email::find($id);
        return view('show-email', compact('email'));
    }

    public function delete(Request $id)
    {
        $email = Email::find($id);
        $email->delete();
        return redirect('/');
    }
}

