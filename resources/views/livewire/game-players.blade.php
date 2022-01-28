<div wire:poll.1000ms>
    @if(!$lobby->user1 && !$lobby->user2 && !$lobby->user3 && !$lobby->user4)
        <div class="cell-info" id="player1-info" style="background-color: whitesmoke" @click="open = true">
            <p style="display:inline">Brak graczy</p>
            <br><br>
        </div>
    @elseif($lobby->user1)
        <div x-data="{ open: false }" style="display: inline-block">
            <div class="cell-info" id="player1-info" style="background-color: #FF3041" @click="open = true">
                <p id="player1-info_name" style="display:inline">{{$lobby->user1->name}}</p>
                <p id="player1-info_cash">0$</p>
            </div>
            <div x-show="open" @click.away="open = false" class="dropdown-content">
                @if($lobby->user1_id == Auth::id())
                    <form action="{{route('exitGame')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-danger" type="submit">Wyjdź</button>
                        <input type="hidden" name="user_left" value="user1_id">
                        <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                    </form>
                @else
                    <a class="btn btn-primary" href="{{route('profile', ['id' => $lobby->user1_id])}}"
                       target="_blank">Zobacz profil</a>
                @endif
            </div>
        </div>
    @endif
    @if($lobby->user2)
        <div x-data="{ open: false }" style="display: inline-block">
            <div class="cell-info" id="player2-info" style="background-color: #7164FF" @click="open = true">
                <p id="player2-info_name" style="display:inline">{{$lobby->user2->name}}</p>
                <br>
                <p id="player2-info_cash">0$</p>
            </div>
            <div x-show="open" @click.away="open = false" class="dropdown-content">
                @if($lobby->user2_id == Auth::id())
                    <form action="{{route('exitGame')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-danger" type="submit">Wyjdź</button>
                        <input type="hidden" name="user_left" value="user2_id">
                        <input type="hidden" name="name_left" value="{{$lobby->user2->name}}">
                        <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                    </form>
                @else
                    <a class="btn btn-primary" href="{{route('profile', ['id' => $lobby->user2_id])}}"
                       target="_blank">Zobacz profil</a>
                @endif
            </div>
        </div>
    @endif
    @if($lobby->user3)
        <div x-data="{ open: false }" style="display: inline-block">
            <div class="cell-info" id="player3-info" style="background-color: #23C923" @click="open = true">
                <p id="player3-info_name" style="display:inline">{{$lobby->user3->name}} <p class='token'
                                                                                            id="player3-info_token"></p>
                <br>
                <p id="player3-info_cash">0$</p>
            </div>
            <div x-show="open" @click.away="open = false" class="dropdown-content">
                @if($lobby->user3_id == Auth::id())
                    <form action="{{route('exitGame')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-danger" type="submit">Wyjdź</button>
                        <input type="hidden" name="user_left" value="user3_id">
                        <input type="hidden" name="name_left" value="{{$lobby->user3->name}}">
                        <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                    </form>
                @else
                    <a class="btn btn-primary" href="{{route('profile', ['id' => $lobby->user3_id])}}"
                       target="_blank">Zobacz profil</a>
                @endif
            </div>
        </div>
    @endif
    @if($lobby->user4)
        <div x-data="{ open: false }" style="display: inline-block">
            <div class="cell-info" id="player4-info" style="background-color: #A9A627" @click="open = true">
                <p id="player4-info_name" style="display:inline">{{$lobby->user4->name}} <p class='token'
                                                                                            id="player4-info_token"></p>
                <br>
                <p id="player4-info_cash">0$</p>
            </div>
            <div x-show="open" @click.away="open = false" class="dropdown-content">
                @if($lobby->user4_id == Auth::id())
                    <form action="{{route('exitGame')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-danger" type="submit">Wyjdź</button>
                        <input type="hidden" name="user_left" value="user4_id">
                        <input type="hidden" name="name_left" value="{{$lobby->user4->name}}">
                        <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                    </form>
                @else
                    <a class="btn btn-primary" href="{{route('profile', ['id' => $lobby->user4_id])}}"
                       target="_blank">Zobacz profil</a>
                @endif
            </div>
        </div>
    @endif
</div>
