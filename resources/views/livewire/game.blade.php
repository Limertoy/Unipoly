<div wire:poll.2000ms="refresh">
    <div class="row">
        <div class="col-8">
            <div class="container players">
                {{-------------------------------------GRACZY-------------------------------}}
                @if(!$lobby->user1 && !$lobby->user2 && !$lobby->user3 && !$lobby->user4)
                    <div class="cell-info" id="player1-info" style="background-color: whitesmoke" @click="open = true">
                        <p style="display:inline">Brak graczy</p>
                        <br><br>
                    </div>
                @elseif($lobby->user1)
                    <div x-data="{ open: false }" style="display: inline-block">
                        <div class="cell-info user1" id="player1-info" @click="open = true">
                            <p id="player1-info_name" style="display:inline">{{$lobby->user1->name}}</p>
                            <p id="player1-info_cash">{{$game_money->user1_money}} zł</p>
                        </div>
                        <div x-show="open" @click.away="open = false" class="dropdown-content">
                            @if($lobby->user1_id == Auth::id())
                                <form action="{{route('exitGame')}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn btn-danger form-responsive" type="submit">Wyjdź</button>
                                    <input type="hidden" name="user_left" value="user1_id">
                                    <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                                </form>
                            @else
                                <a class="btn btn-primary form-responsive"
                                   href="{{route('profile', ['id' => $lobby->user1_id])}}"
                                   target="_blank">Zobacz profil</a>
                            @endif
                        </div>
                    </div>
                @endif
                @if($lobby->user2)
                    <div x-data="{ open: false }" style="display: inline-block">
                        <div class="cell-info user2" id="player2-info" @click="open = true">
                            <p id="player2-info_name" style="display:inline">{{$lobby->user2->name}}</p>
                            <br>
                            <p id="player2-info_cash">{{$game_money->user2_money}} zł</p>
                        </div>
                        <div x-show="open" @click.away="open = false" class="dropdown-content">
                            @if($lobby->user2_id == Auth::id())
                                <form action="{{route('exitGame')}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn btn-danger form-responsive" type="submit">Wyjdź</button>
                                    <input type="hidden" name="user_left" value="user2_id">
                                    <input type="hidden" name="name_left" value="{{$lobby->user2->name}}">
                                    <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                                </form>
                            @else
                                <a class="btn btn-primary form-responsive"
                                   href="{{route('profile', ['id' => $lobby->user2_id])}}"
                                   target="_blank">Zobacz profil</a>
                            @endif
                        </div>
                    </div>
                @endif
                @if($lobby->user3)
                    <div x-data="{ open: false }" style="display: inline-block">
                        <div class="cell-info user3" id="player3-info" @click="open = true">
                            <p id="player3-info_name" style="display:inline">{{$lobby->user3->name}} <p class='token'
                                                                                                        id="player3-info_token"></p>
                            <br>
                            <p id="player3-info_cash">{{$game_money->user3_money}} zł</p>
                        </div>
                        <div x-show="open" @click.away="open = false" class="dropdown-content">
                            @if($lobby->user3_id == Auth::id())
                                <form action="{{route('exitGame')}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn btn-danger form-responsive" type="submit">Wyjdź</button>
                                    <input type="hidden" name="user_left" value="user3_id">
                                    <input type="hidden" name="name_left" value="{{$lobby->user3->name}}">
                                    <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                                </form>
                            @else
                                <a class="btn btn-primary form-responsive"
                                   href="{{route('profile', ['id' => $lobby->user3_id])}}"
                                   target="_blank">Zobacz profil</a>
                            @endif
                        </div>
                    </div>
                @endif
                @if($lobby->user4)
                    <div x-data="{ open: false }" style="display: inline-block">
                        <div class="cell-info user4" id="player4-info" @click="open = true">
                            <p id="player4-info_name" style="display:inline">{{$lobby->user4->name}} <p class='token'
                                                                                                        id="player4-info_token"></p>
                            <br>
                            <p id="player4-info_cash">{{$game_money->user4_money}} zł</p>
                        </div>
                        <div x-show="open" @click.away="open = false" class="dropdown-content">
                            @if($lobby->user4_id == Auth::id())
                                <form action="{{route('exitGame')}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn btn-danger form-responsive" type="submit">Wyjdź</button>
                                    <input type="hidden" name="user_left" value="user4_id">
                                    <input type="hidden" name="name_left" value="{{$lobby->user4->name}}">
                                    <input type="hidden" name="lobby_id" value="{{$lobby->id}}">
                                </form>
                            @else
                                <a class="btn btn-primary form-responsive"
                                   href="{{route('profile', ['id' => $lobby->user4_id])}}"
                                   target="_blank">Zobacz profil</a>
                            @endif
                        </div>
                    </div>
                @endif
                {{--------------------------------------------------------------------------}}
            </div>
            <div class="container-lg">
                {{------------------------------------ TABLICA -----------------------------}}
                <div class="responsive-game">
                    <div class="mainSquare">
                        <div class="row-game top-game">
                            @for($i = 20; $i < 31; $i++)
                                <div
                                    class="@if($properties[$i]->type == 'corner')square2 @else square1 @endif topSide {{$properties[$i]->family}}">
                                    @if($properties[$i]->type == 'corner')
                                        <span
                                            class="corner corner{{$properties[$i]->id}}">{{$properties[$i]->name}}</span>
                                    @else
                                        @if($properties[$i]->type == 'field')
                                            <div
                                                class="header-game header-top white @if($live_properties[$i]->user_id) user{{$live_properties[$i]->user_id}} @endif"></div>
                                        @endif
                                        <div
                                            class="firstLine firstLine-top rotation2">
                                            <b>{{$properties[$i]->name}}</b> @if($properties[$i]->type == 'field' && $live_properties[$i]->rent)
                                                <br>Opłata:<br> {{$live_properties[$i]->rent}}
                                                @if($properties[$i]->family == 'webpage')x @else
                                                    zł @endif @elseif($properties[$i]->type == 'field') <br>
                                                {{$live_properties[$i]->price}}zł @endif </div>
                                    @endif
                                    <div class="player-tokens topSide">
                                        @if($game_items->user1_item && ($game->user1_field == $properties[$i]->id))
                                            <span class="player-pawn" id="player1-{{$game_items->user1_item}}"></span>
                                        @endif
                                        @if($game_items->user2_item && ($game->user2_field == $properties[$i]->id))
                                            <span class="player-pawn" id="player2-{{$game_items->user2_item}}"></span>
                                        @endif
                                        @if($game_items->user3_item)
                                            @if($game->user3_field == $properties[$i]->id)
                                                <span class="player-pawn"
                                                      id="player3-{{$game_items->user3_item}}"></span>
                                            @endif
                                        @endif
                                        @if($game_items->user4_item )
                                            @if($game->user4_field == $properties[$i]->id)
                                                <span class="player-pawn"
                                                      id="player4-{{$game_items->user4_item}}"></span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="row-game center-game">
                            <div class="square2">
                                @for($i = 19; $i > 10; $i--)
                                    <div class="squareSide leftSide {{$properties[$i]->family}}">
                                        @if($properties[$i]->type == 'field')
                                            <div
                                                class="headerSide header-left white @if($live_properties[$i]->user_id) user{{$live_properties[$i]->user_id}} @endif"></div>
                                        @endif
                                        <div
                                            class="firstLine firstLine-left {{$properties[$i]->type}} rotation1">
                                            <b>{{$properties[$i]->name}}</b> @if($properties[$i]->type == 'field' && !$live_properties[$i]->rent)
                                                <br>{{$live_properties[$i]->price}}
                                                zł @elseif($live_properties[$i]->rent) <br>
                                                Opłata: {{$live_properties[$i]->rent}}@if($properties[$i]->family == 'webpage')
                                                    x @else zł @endif @endif</div>
                                        <div class="player-tokens leftSide">
                                            @if($game_items->user1_item && ($game->user1_field == $properties[$i]->id))
                                                <span class="player-pawn"
                                                      id="player1-{{$game_items->user1_item}}"></span>
                                            @endif
                                            @if($game_items->user2_item && ($game->user2_field == $properties[$i]->id))
                                                <span class="player-pawn"
                                                      id="player2-{{$game_items->user2_item}}"></span>
                                            @endif
                                            @if($game_items->user3_item)
                                                @if($game->user3_field == $properties[$i]->id)
                                                    <span class="player-pawn"
                                                          id="player3-{{$game_items->user3_item}}"></span>
                                                @endif
                                            @endif
                                            @if($game_items->user4_item )
                                                @if($game->user4_field == $properties[$i]->id)
                                                    <span class="player-pawn"
                                                          id="player4-{{$game_items->user4_item}}"></span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            {{-- Centrum pola --}}
                            <div class="square9">
                                <div class="logoBox">
                                    <span class="logoName">UniPoly</span>
                                </div>
                            </div>
                            {{------------------}}

                            <div class="square2">
                                @for($i = 31; $i < 40; $i++)
                                    <div class="squareSide rightSide {{$properties[$i]->family}}">
                                        @if($properties[$i]->type == 'field')
                                            <div
                                                class="headerSide header-right white @if($live_properties[$i]->user_id) user{{$live_properties[$i]->user_id}} @endif"></div>
                                        @endif
                                        <div
                                            class="firstLine firstLine-right {{$properties[$i]->type}} rotation1">
                                            <b>{{$properties[$i]->name}}</b> @if($properties[$i]->type == 'field' && !$live_properties[$i]->rent)
                                                <br>{{$live_properties[$i]->price}}
                                                zł @elseif($live_properties[$i]->rent) <br>
                                                Opłata: {{$live_properties[$i]->rent}}zł @endif </div>
                                        <div class="player-tokens rightSide">
                                            @if($game_items->user1_item && ($game->user1_field == $properties[$i]->id))
                                                <span class="player-pawn"
                                                      id="player1-{{$game_items->user1_item}}"></span>
                                            @endif
                                            @if($game_items->user2_item && ($game->user2_field == $properties[$i]->id))
                                                <span class="player-pawn"
                                                      id="player2-{{$game_items->user2_item}}"></span>
                                            @endif
                                            @if($game_items->user3_item)
                                                @if($game->user3_field == $properties[$i]->id)
                                                    <span class="player-pawn"
                                                          id="player3-{{$game_items->user3_item}}"></span>
                                                @endif
                                            @endif
                                            @if($game_items->user4_item )
                                                @if($game->user4_field == $properties[$i]->id)
                                                    <span class="player-pawn"
                                                          id="player4-{{$game_items->user4_item}}"></span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="row-game top-game">
                            @for($i = 10; $i >= 0; $i--)
                                <div
                                    class="@if($properties[$i]->type == 'corner')square2 @else square1 @endif bottomSide {{$properties[$i]->family}}">
                                    @if($properties[$i]->type == 'corner')
                                        <span
                                            class="corner corner{{$properties[$i]->id}}">{{$properties[$i]->name}}</span>
                                    @else
                                        @if($properties[$i]->type == 'field')
                                            <div
                                                class="header-game header-bottom white @if($live_properties[$i]->user_id) user{{$live_properties[$i]->user_id}} @endif"></div>
                                        @endif
                                        <div
                                            class="firstLine firstLine-bottom rotation2">
                                            <b>{{$properties[$i]->name}}</b> @if($properties[$i]->type == 'field' && $live_properties[$i]->rent)
                                                <br>Opłata:<br> {{$live_properties[$i]->rent}}
                                                zł@elseif($properties[$i]->type == 'field') <br>
                                                {{$live_properties[$i]->price}}zł
                                            @endif </div>
                                    @endif
                                    <div class="player-tokens bottomSide">
                                        @if($game_items->user1_item && ($game->user1_field == $properties[$i]->id))
                                            <span class="player-pawn" id="player1-{{$game_items->user1_item}}"></span>
                                        @endif
                                        @if($game_items->user2_item && ($game->user2_field == $properties[$i]->id))
                                            <span class="player-pawn" id="player2-{{$game_items->user2_item}}"></span>
                                        @endif
                                        @if($game_items->user3_item)
                                            @if($game->user3_field == $properties[$i]->id)
                                                <span class="player-pawn"
                                                      id="player3-{{$game_items->user3_item}}"></span>
                                            @endif
                                        @endif
                                        @if($game_items->user4_item )
                                            @if($game->user4_field == $properties[$i]->id)
                                                <span class="player-pawn"
                                                      id="player4-{{$game_items->user4_item}}"></span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                {{---------------------------------------------------------------------}}
            </div>
        </div>
        <div class="col-4">
            {{--------------------------LOGIKA GRY-----------------------------}}

            @if(!$lobby->is_started)
                @if(!$lobby->user2_id || $lobby->user1_id != Auth::id())
                    <div class="cell-info cell-roll">
                        <p style="padding-top: 7vh">Oczekiwanie na innych graczy</p><br>
                    </div>
                @else
                    <div class="cell-info cell-roll">
                        <p style="padding-top: 2vh">Oczekiwanie na innych graczy</p><br>
                        <form wire:submit.prevent="startGame">
                            <button class="btn btn-lg btn-success">Zacznij!</button>
                        </form>
                    </div>
                @endif
            @else
                @if($game->active_user_id == Auth::id())
                    @if($game->active_action == 'dice_throwing')
                        <div class="cell-info cell-roll">
                            <p style="padding-top: 2vh">Twoja kolejka!</p><br>
                            <form wire:submit.prevent="throwDice" style="display: inline-block">
                                <button class="btn btn-lg btn-success" style="width: 10vw;">Rzuć kośćmi</button>
                            </form>
                            <form wire:submit.prevent="surrender" style="display: inline-block">
                                <button class="btn btn-lg btn-danger" style="width: 10vw;">Poddaj się</button>
                            </form>
                        </div>
                    @elseif($game->active_action == 'buy_or_decline')
                        <div class="cell-info cell-roll">
                            <p style="padding-top: 2vh">Pole jest wolne, możesz go kupić</p><br>
                            <form wire:submit.prevent="buyCell" style="display: inline-block">
                                <button class="btn btn-lg btn-success" style="width: 10vw;">Kup pole</button>
                            </form>
                            <form wire:submit.prevent="declineBuying" style="display: inline-block">
                                <button class="btn btn-lg btn-danger" style="width: 10vw;">Zrezygnuj</button>
                            </form>
                        </div>
                    @elseif($game->active_action == 'must_pay_fine')
                        <div class="cell-info cell-roll">
                            <p style="padding-top: 2vh">Musisz zapłacić mandat: {{$game->must_pay}}zł</p><br>
                            <form wire:submit.prevent="payFine" style="display: inline-block">
                                <button class="btn btn-lg btn-success" style="width: 10vw;">Zapłać</button>
                            </form>
                            <form wire:submit.prevent="surrender" style="display: inline-block">
                                <button class="btn btn-lg btn-danger" style="width: 10vw;">Poddaj się</button>
                            </form>
                        </div>
                    @elseif($game->active_action == 'must_pay')
                        <div class="cell-info cell-roll">
                            <p style="padding-top: 2vh">Musisz zapłacić {{$game->must_pay}}zł za wynajem</p><br>
                            <form wire:submit.prevent="payFine" style="display: inline-block">
                                <button class="btn btn-lg btn-success" style="width: 10vw;">Zapłać</button>
                            </form>
                            <form wire:submit.prevent="surrender" style="display: inline-block">
                                <button class="btn btn-lg btn-danger" style="width: 10vw;">Poddaj się</button>
                            </form>
                        </div>
                    @elseif($game->active_action == 'end_turn')
                        <div class="cell-info cell-roll">
                            <p style="padding-top: 2vh">Zakończ swoją kolejkę</p><br>
                            <form wire:submit.prevent="endTurn" style="display: inline-block">
                                <button class="btn btn-lg btn-success" style="width: 10vw;">Zakończ kolejkę</button>
                            </form>
                        </div>
                    @elseif($game->active_action == 'winner')
                        <div class="cell-info cell-roll">
                            <p style="padding-top: 7vh">Wygrałeś! Gratulacje!</p><br>
                        </div>

                    @else
                        <div class="cell-info cell-roll" style="visibility: hidden">
                            <p style="padding-top: 7vh"></p><br>
                        </div>
                    @endif
                @else
                    <div class="cell-info cell-roll" style="visibility: hidden">
                        <p style="padding-top: 7vh"></p><br>
                    </div>
                @endif
            @endif
            {{----------------------------------------------------------------}}
            <div class="chat-info" style="margin-top: 40vh; padding-left: 0.25vw;">
                {{-----------------------------------CZAT------------------------------------}}
                <div class="chat-container-game border-bottom">
                    @forelse ($messages as $message)
                        @if($message->user->id != 1){{$message->user->name}}: @endif{{$message->message}}
                        <br/>
                    @empty
                        <h1>Czat pusty.</h1>
                    @endforelse
                </div>
                <div style="text-align: center; padding-top: 5px; ">
                    <form wire:submit.prevent="sendMessage">
                        <input wire:model.defer="messageText" type="text" style="width: 20vw; height: 3.7vh">
                        <button type="submit" class="btn btn-outline-light form-chat">Send</button>
                    </form>
                </div>
                {{-----------------------------------------------------------------------------}}
            </div>
        </div>
    </div>
</div>
