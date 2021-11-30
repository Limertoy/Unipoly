<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use Illuminate\Http\Request;
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

    public static function searchUser($user_id){
        $user = DB::table('users')
            ->where('id', $user_id)
            ->first();

        return $user;
    }

    public function joinToLobby(Request $request)
    {
        $lobby = Lobby::find($request->input('lobby'));

        if (!$lobby->user2_id) {
            $lobby->user2_id = Auth::id();
            $lobby->save();
        } else if (!$lobby->user3_id) {
            $lobby->user3_id = Auth::id();
            $lobby->save();
        } else if (!$lobby->user4_id) {
            $lobby->user4_id = Auth::id();
            $lobby->save();
        }

        return '200';
    }

    public function createLobby(Request $request)
    {
        $user = Auth::user();
        $str = Str::random(20);


        $lobby = $user->lobby_slot1()->create([
            'user1_id' => Auth::id(),
            'token' => $str
        ]);


        broadcast(new LobbyCreated($user, $lobby))->toOthers();
    }
}

