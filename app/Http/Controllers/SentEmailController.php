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
        
        $split = explode(',', $request['emails-list']);

        for($i=0; $i<sizeof($split); $i++)
        {
            Email::create([
                'email' => $split[$i],
                'sentEmail_id' => $sentEmail->id
            ]);
        }
        return redirect('/dashboard');
    }
}
