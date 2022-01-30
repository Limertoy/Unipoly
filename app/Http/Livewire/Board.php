<?php

namespace App\Http\Livewire;

use App\Models\GameProperties;
use Livewire\Component;

class Board extends Component
{
    public $lobby_id;

    public function render()
    {
        $properties = GameProperties::join('properties', 'properties.id', '=' , 'property_id')
            ->where('game_id', $this->lobby_id)
            ->select('game_properties.*', 'properties.name', 'properties.type', 'properties.family')
            ->get();

        return view('livewire.board', ['properties' => $properties]);
    }
}
