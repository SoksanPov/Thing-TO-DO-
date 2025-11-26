<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'eventTitle' => 'required|string',
        ]);

        $to = 'reservations@somadeviangkor.com';
        $subject = 'Interest in Event';
        $body = "I am interested in: " . $request->eventTitle;

        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)
                    ->subject($subject);
        });

        return response()->json(['success' => true, 'message' => 'Email sent successfully!']);
    }
}
