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

    }

    public function edit(Request $request, $id){

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
}
