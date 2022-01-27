<?php

namespace App\Http\Livewire;

use App\Models\Lobby;
use Livewire\Component;

class GamePlayers extends Component
{
    public $lobby_id;

    public function render()
    {
        $lobby = Lobby::with('user1')
            ->with('user2')
            ->with('user3')
            ->with('user4')
            ->find( $this->lobby_id);

        return view('livewire.game-players', ['lobby' => $lobby]);
    }
}
