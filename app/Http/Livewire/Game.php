<?php

namespace App\Http\Livewire;

use App\Models\Chances;
use App\Models\GameChat as Chat;
use App\Models\GameItems;
use App\Models\GameMoney;
use App\Models\GameProperties;
use App\Models\Games;
use App\Models\Lobby;
use App\Models\Properties;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Game extends Component
{
    public $lobby_id;
    public $lobby, $game_money;
    public $live_properties, $properties, $game_items, $game;
    public $user_id, $messageText, $messages;

    public $field, $player;
    public $doubles = 0;

    public function refresh()
    {
        $this->lobby = Lobby::with('user1')
            ->with('user2')
            ->with('user3')
            ->with('user4')
            ->find($this->lobby_id);

        $this->game_money = GameMoney::where('game_id', $this->lobby_id)->first();


        $this->live_properties = GameProperties::where('game_id', $this->lobby_id)->get();
        $this->game_items = GameItems::where('game_id', $this->lobby_id)->first();
        $this->game = Games::where('game_id', $this->lobby_id)->first();

        $this->messages = Chat::with('user')
            ->where('lobby_id', $this->lobby_id)
            ->latest()
            ->get()
            ->sortBy('id');
    }

    public function sendMessage()
    {
        if ($this->messageText) {
            Chat::create([
                'user_id' => Auth::id(),
                'message' => $this->messageText,
                'lobby_id' => $this->lobby_id
            ]);

            $this->reset('messageText');
            return view('livewire.game');
        }
    }

    public function startGame() {
        $this->lobby->is_started = 1;
        $this->lobby->save();

        Games::where('game_id', $this->lobby_id)
            ->update(['active_user_id' => Auth::id(), 'active_action' => 'dice_throwing', 'active_player' => 1]);

        return view('livewire.game');
    }

    public function throwDice(){
        $game = Games::where('game_id', $this->lobby_id)->first();
        $dice1 = 1; //mt_rand(1, 6);
        $dice2 = 2; //mt_rand(1, 6);

        switch ($game->active_player){
            case(1):
                $game->user1_field += $dice1 + $dice2;
                if($game->user1_field > 40){
                    $game->user1_field -= 40;
                    $this->game_money->user1_money += 200;
                }
                $this->field = $game->user1_field;
                break;
            case(2):
                $game->user2_field += $dice1 + $dice2;
                if($game->user2_field > 40){
                    $game->user2_field -= 40;
                    $this->game_money->user2_money += 200;
                }

                $this->field = $game->user2_field;
                break;
            case(3):
                $game->user3_field += $dice1 + $dice2;
                if($game->user3_field > 40){
                    $game->user3_field -= 40;
                    $this->game_money->user3_money += 200;
                }

                $this->field = $game->user3_field;
                break;
            case(4):
                $game->user4_field += $dice1 + $dice2;
                if($game->user4_field > 40){
                    $game->user4_field -= 40;
                    $this->game_money->user4_money += 200;
                }

                $this->field = $game->user4_field;
                break;
            default:
                break;
        }

        $game->first_dice = $dice1;
        $game->second_dice = $dice2;
        $this->game_money->save();


        $property = GameProperties::join('properties', 'game_properties.property_id', '=', 'properties.id')
            ->where('game_id', $this->lobby_id)
            ->where('property_id', $this->field)
            ->select('user_id', 'game_properties.rent', 'game_properties.price', 'family', 'type', 'name')
            ->first();

        Chat::create([
            'lobby_id' => $this->lobby_id,
            'user_id' => 1,
            'message' => Auth::user()->name . ' wyrzucił(-a) ' . $dice1 . ' oraz ' . $dice2 . '. Idzie na pole ' . $property->name . '.'
        ]);

        $game->save();

        switch ($property->type){
            case('field'):
                if(!$property->rent){
                    $game->active_action = 'buy_or_decline';
                    $game->save();
                } elseif ($game->active_player == $property->user_id) {
                    $this->checkDoubles();
                } else {
                    $game->must_pay = $property->rent;
                    $game->active_action = 'must_pay';
                    $game->save();
                }
                break;
            case('fine'):
                $game->must_pay = $property->price;
                $game->active_action = 'must_pay_fine';
            case('corner'):
                if($property->family == 'start'){
                    $this->checkDoubles();
                }
            case('chance'):
                $chance = Chances::find(mt_rand(1,16));
                if($chance->type == 'go'){
                    $this->changePlace($chance->goto);
                    if($this->field < $chance->goto)
                        $this->changeMoney($chance->amount, '+');
                } elseif ($chance->type == 'gain') {
                    $this->changeMoney($chance->amount, '+');
                }
                break;
            default:
                break;
        }

        $game->save();
        return view('livewire.game');
    }

    public function changeMoney($money, $op){
        switch ($op){
            case('+'):
                if($this->player == 1){
                    $this->game_money->user1_money += $money;
                } elseif ($this->player == 2){
                    $this->game_money->user2_money += $money;
                } elseif ($this->player == 2) {
                    $this->game_money->user3_money += $money;
                } elseif ($this->player == 4) {
                    $this->game_money->user4_money += $money;
                }
                break;
            case('-'):
                if($this->player == 1){
                    $this->game_money->user1_money -= $money;
                } elseif ($this->player == 2){
                    $this->game_money->user2_money -= $money;
                } elseif ($this->player == 2) {
                    $this->game_money->user3_money -= $money;
                } elseif ($this->player == 4) {
                    $this->game_money->user4_money -= $money;
                }
                break;
            default:
                break;
        }
    }

    public function changePlace($place){
        if($this->player == 1){
            $this->game->user1_field = $place;
        } elseif ($this->player == 2){
            $this->game->user2_field = $place;
        } elseif ($this->player == 2) {
            $this->game->user3_field = $place;
        } elseif ($this->player == 4) {
            $this->game->user4_field = $place;
        }
    }

    public function buyCell(){
        $property = GameProperties::where('game_id', $this->lobby_id)
            ->where('property_id', $this->field)
            ->first();

        $this->changeMoney($property->price, '-');


        $this->game_money->save();


        $property->user_id = $this->player;
        $property->rent = Properties::find($this->field)->rent;
        $property->save();


        $this->game->active_action = 'dice_throwing';
        $this->game->save();

        $this->checkDoubles();
        return view('livewire.game');
    }

    public function payFine(){
        $this->changeMoney($this->game->must_pay, '-');

        $this->game_money->save();

        $this->game->must_pay = 0;
        $this->game->save();

        $this->checkDoubles();
        return view('livewire.game');
    }

    public function checkDoubles() {
        if($this->game->first_dice == $this->game->second_dice && $this->doubles < 2){
            $this->doubles++;
            $this->game->active_action = 'dice_throwing';
        } elseif ($this->game->first_dice == $this->game->second_dice) {
            switch($this->player){
                case(1):
                    $this->game->user1_field = 11;
                    $this->game->prison_user1 = 1;
                    break;
                case(2):
                    $this->game->prison_user2 = 1;
                    $this->game->user2_field = 11;
                    break;
                case(3):
                    $this->game->prison_user3 = 1;
                    $this->game->user2_field = 11;
                    break;
                case(4):
                    $this->game->prison_user4 = 1;
                    $this->game->user2_field = 11;
                    break;
                default:
                    break;
            }
            $this->doubles = 0;
        } else {
            $this->game->active_action = 'end_turn';
            $this->doubles = 0;
            $this->game_money->save();
        }
        $this->game->save();
        return view('livewire.game');
    }

    //
    public function surrender() {
        return view('livewire.game');
    }

    public function declineBuying() {
        $this->checkDoubles();
    }

    //funkcja skończenia kolejki
    public function endTurn(){
        $fields = [$this->game->user1_field, $this->game->user2_field,
            $this->game->user3_field, $this->game->user4_field];

        $players = [$this->lobby->user1_id, $this->lobby->user2_id,
            $this->lobby->user3_id, $this->lobby->user4_id];

        $arr_player = $this->player;
        $temp = 0;
        $next_player = null;

        while($temp < 3){
            if($arr_player > 3)
                $arr_player = 0;
            if($fields[$arr_player]){
                $next_player = $players[$arr_player];
                break;
            } else
                $temp++;
                $arr_player++;
        }

        if(!$next_player){
            $this->game->active_action = 'winner';
        } else {
            $this->game->active_action = 'dice_throwing';
            $this->game->active_player = $arr_player + 1;
            $this->game->active_user_id = $next_player;
        }
        $this->game->save();

        return view('livewire.game');
    }

    public function render()
    {
        $this->lobby = Lobby::with('user1')
            ->with('user2')
            ->with('user3')
            ->with('user4')
            ->find($this->lobby_id);

        $this->game_money = GameMoney::where('game_id', $this->lobby_id)->first();
        $this->live_properties = GameProperties::where('game_id', $this->lobby_id)->get();
        $this->properties = Properties::get();
        $this->game_items = GameItems::where('game_id', $this->lobby_id)->first();
        $this->game = Games::where('game_id', $this->lobby_id)->first();

        if(Auth::id() == $this->lobby->user1_id){
            $this->field = $this->game->user1_field;
            $this->player = 1;
        } elseif(Auth::id() == $this->lobby->user2_id){
            $this->field = $this->game->user2_field;
            $this->player = 2;
        } elseif(Auth::id() == $this->lobby->user3_id){
            $this->field = $this->game->user3_field;
            $this->player = 3;
        } elseif(Auth::id() == $this->lobby->user4_id){
            $this->field = $this->game->user4_field;
            $this->player = 4;
        }

        $this->messages = Chat::with('user')
            ->where('lobby_id', $this->lobby_id)
            ->latest()
            ->get()
            ->sortBy('id');
        return view('livewire.game');
    }
}
