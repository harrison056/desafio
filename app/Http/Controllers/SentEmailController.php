<?php

namespace App\Http\Controllers;
use App\Models\SentEmail;
use App\Mail\newSentEmail;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SentEmailController extends Controller
{

    public function store(Request $request) 
    {
        $user = Auth::user()->id;
        $splitEmails = explode(',', $request['emails-list']);
        
        $mail = new newSentEmail([
            'subject' => $request['subject'],
            'message' => $request['message']
        ]);

        $data = array($mail);
        
        \App\Jobs\SentEmail::dispatch($mail,$splitEmails);
        return view('dashboard');
    }
}
