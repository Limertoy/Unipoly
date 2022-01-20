<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($id){
        $lobby = Lobby::where('token', $id)->first();

        return view('game', ['lobby' => $lobby]);
    }
}
