<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class MailController extends Controller
{
    public function contacts(){
        return view ('guest.contacts.index');

    } 

    public function send(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|min:5|max:25',
            'email' => 'required|email',
            'message' => 'required|min:25|max:250',
        ]);
    }
}
