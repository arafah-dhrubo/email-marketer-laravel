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
    public function store(Request $request)
    {
        Collection::insert([
            'email' => $request->email,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect('/home')->with('success', 'New email address added successfully');
    }
}
