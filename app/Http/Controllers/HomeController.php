<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addresses()
    {
        $collections = Collection::where('user_id', auth()->user()->id)->paginate(5);
        return view('home', compact('collections'));
    }

    public function emails(){
        $emails = Email::where('user_id', auth()->user()->id)->paginate(5);
        return view('templates', compact('emails'));
    }
}
