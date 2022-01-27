<?php

namespace App\Http\Controllers;

use App\Models\GameChat;
use App\Models\Lobby;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Events\LobbyCreated;

class LobbyController extends Controller
{
    public function show()
    {
        $lobbies = DB::table('lobbies')
            ->where('is_started', '0')
            ->get();


        return view('lobbies', [
            'lobbies' => $lobbies
        ]);
    }

    public function fetchLobbies()
    {
        return Lobby::with('user1')->get();
    }

    public static function searchUser($user_id)
    {
        return User::find($user_id);
    }

    public function joinToLobby(Request $request)
    {
        $lobby = Lobby::find($request->input('lobby'));
        $user = null;
        $connect = false;


        if ($lobby->user1_id == Auth::id())
            $connect = true;
        else {
            $user = Lobby::where('is_ended', '0')
                ->where('user1_id', Auth::id())
                ->orWhere('user2_id', Auth::id())
                ->orWhere('user3_id', Auth::id())
                ->orWhere('user4_id', Auth::id())->first();
        }

        if ($user) {
            return redirect()->back()->with('alert', 'cant_enter');
        }

        if (!$connect) {
            if (!$lobby->user2_id) {
                $lobby->user2_id = Auth::id();
                $lobby->save();
            } else if (!$lobby->user3_id) {
                $lobby->user3_id = Auth::id();
                $lobby->save();
            } else if (!$lobby->user4_id) {
                $lobby->user4_id = Auth::id();
                $lobby->save();
            } else
                return redirect()->back()->with('alert', 'places_taken');
        }

        GameChat::create([
            'user_id' => 1,
            'message' => Auth::user()->name . ' dołączył się.',
            'lobby_id' => $lobby->id
        ]);

        return redirect()->route('joinGame', ['id' => $lobby->token]);
    }

    public function createLobby(Request $request)
    {
        $is_lobby = Lobby::where('user1_id', Auth::id())->first();
        if (!$is_lobby) {
            $user = Auth::user();
            $str = Str::random(20);

            $lobby = $user->lobby_slot1()->create([
                'user1_id' => Auth::id(),
                'token' => $str
            ]);

            GameChat::create([
                'user_id' => 1,
                'message' => 'Gra została stworzona.',
                'lobby_id' => $lobby->id
            ]);

            return redirect()->route('joinGame', ['id' => $str]);
        } else {
            return redirect()->back()->with('alert', 'lobby_exists');
        }
    }
}

