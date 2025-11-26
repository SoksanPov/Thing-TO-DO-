<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function send($eventTitle)
    {
        $token = "8260293287:AAFyGRB431ftYajnogCmEp-Ir8tbBm-fwTQ";
        $chatId = "YOUR_CHAT_ID"; // ប្ដូរជា chat ID របស់អ្នក
        $message = "I'm interested in: $eventTitle";

        $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chatId&text=" . urlencode($message);

        $response = file_get_contents($url);

        return redirect()->back()->with('success', 'Message sent to Telegram!');
    }
}
