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
        return Redirect('/home')->with('success', 'New email added successfully');
    }
}
