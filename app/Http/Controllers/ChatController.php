<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function fetchMessages(){
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request){
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        $stats = DB::table('stats')->
            where('user_id', Auth::id())->
            value('messages_sent');

        $stats++;

        DB::table('stats')->
            where('user_id', Auth::id())->
            update(['messages_sent' => $stats]);

        broadcast(new MessageSent($user, $message))->toOthers();
    }
}
