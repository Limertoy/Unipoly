<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function createLobby(Request $request)
    {
        $str = Str::random(20);

        DB::table('lobbies')->insert([
            'user1_id' => Auth::id(),
            'token' => $str
        ]);
    }
}
