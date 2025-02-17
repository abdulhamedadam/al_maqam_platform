<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ThankYouMessage;
use Illuminate\Http\Request;

class ThankYouMessageController extends Controller
{

    public function submitMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $data = [
            'name' => $validated['name'],
            'message' => $validated['message'],
            'date' => now()
        ];
        ThankYouMessage::create($data);

        return response()->json(['message' => 'تم ارسال رسالة الشكر بنجاح']);
    }


    public function getMessages()
    {
        $messages = ThankYouMessage::all();

        return response()->json($messages);
    }
}
