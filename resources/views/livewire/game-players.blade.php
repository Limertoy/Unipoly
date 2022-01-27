<div wire:poll.1000ms>
    @if(!$lobby->user1)
        Brak graczy.
    @elseif($lobby->user1)
        <div x-data="{ open: false }" style="display: inline-block">
            <div class="cell-info" id="player1-info" style="background-color: #FF3041" @click="open = true">
                <p id="player1-info_name" style="display:inline">{{$lobby->user1->name}} <p class='token'
                                                                                            id="player1-info_token"></p>
                <br>
                <p id="player1-info_cash">0$</p>
            </div>
            <div x-show="open" @click.away="open = false" class="dropdown-content">
                @if($lobby->user1_id == Auth::id())
                    <form action="{{route('inventory_put')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn-sm btn-danger" type="submit">Wyjdź</button>
                        <input type="hidden" name="user_left" value="user1">
                        <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                    </form>
                @endif
            </div>
        </div>
        @if($lobby->user2)
            <div x-data="{ open: false }" style="display: inline-block">
                <div class="cell-info" id="player2-info" style="background-color: #7164FF" @click="open = true">
                    <p id="player2-info_name" style="display:inline">{{$lobby->user2->name}} <p class='token'
                                                                                                id="player2-info_token"></p>
                    <br>
                    <p id="player2-info_cash">0$</p>
                </div>
                <ul x-show="open" @click.away="open = false"
                    style="position: absolute; background-color: white; border-color: black">
                    @if($lobby->user2_id == Auth::id())
                        <li>
                            <button class="btn btn-danger">Wyjdź</button>
                        </li>
                    @else
                        <li>Nic</li>
                    @endif
                </ul>
            </div>
            @if($lobby->user3)
                <div class="cell-info" id="player3-info" style="background-color: #23C923">
                    <p id="player3-info_name" style="display:inline">{{$lobby->user3->name}} <p class='token'
                                                                                                id="player3-info_token"></p>
                    <br>
                    <p id="player3-info_cash">0$</p>
                </div>
                @if($lobby->user4)
                    <div class="cell-info" id="player4-info" style="background-color: #A9A627">
                        <p id="player4-info_name" style="display:inline">{{$lobby->user4->name}} <p class='token'
                                                                                                    id="player4-info_token"></p>
                        <br>
                        <p id="player4-info_cash">0$</p>
                    </div>
                @endif
            @endif
        @endif
    @endif
</div>
