<?php

namespace App\Http\Controllers;
use App\Models\SentEmail;
use App\Models\Email;
use Illuminate\Http\Request;

class SentEmailController extends Controller
{

    public function store(Request $request) 
    {
        $sentEmail = SentEmail::create([
            'subject' => $request['subject'],
            'message' => $request['message'],
        ]);

        Email::create([
            'email' => $request['emails-list'],
            'sentEmail_id' => $sentEmail->id
        ]);

        return redirect('/dashboard');
    }
}
