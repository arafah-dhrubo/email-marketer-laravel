<?php

namespace App\Http\Controllers;

// where('user_id', Auth::user()->id)
use Collator;
use Carbon\Carbon;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function update(Request $request, $id){
        $email_address = Collection::find($id);
        $email_address->first_name=$request->first_name;
        $email_address->last_name=$request->last_name;
        $email_address->email=$request->email;
        $email_address->save();
        return redirect('/');
    }

    public function edit(Request $request, $id){
        $email_address=Collection::find($id);
        $collections = Collection::where('user_id', auth()->user()->id)->paginate(5);
        return view('home', compact('email_address', 'collections'));
    }

    public function store(Request $request)
    {
        Collection::insert([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect('/')->with('success', 'New email address added successfully');
    }

    public function delete(Request $id){
        $email_address = Collection::find($id);
        $email_address->delete();
        return redirect('/');
    }
}
