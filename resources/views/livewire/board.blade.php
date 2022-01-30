<div>
    <div class="responsive-game">
        <div class="mainSquare">

            <div class="row-game top-game">
                @for($i = 20; $i < 31; $i++)
                    <div class="@if($properties[$i]->type == 'corner')square2 @else square1 @endif topSide {{$properties[$i]->family}}">
                        @if($properties[$i]->type == 'corner')
                            <span class="corner corner{{$properties[$i]->id}}">{{$properties[$i]->name}}</span>
                        @else
                            @if($properties[$i]->type == 'field')
                                <div class="header-game header-top white"></div>
                            @endif
                            <div
                                class="firstLine firstLine-top rotation2">{{$properties[$i]->name}}</div>
                        @endif
                    </div>
                @endfor
            </div>

            <div class="row-game center-game">
                <div class="square2">
                    @for($i = 19; $i > 10; $i--)
                        <div class="squareSide leftSide {{$properties[$i]->family}}">
                            @if($properties[$i]->type == 'field')
                                <div class="headerSide header-left white"></div>
                            @endif
                            <div
                                class="firstLine firstLine-left {{$properties[$i]->type}} rotation1">{{$properties[$i]->name}}</div>
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
                                <div class="headerSide header-right white"></div>
                            @endif
                            <div
                                class="firstLine firstLine-right {{$properties[$i]->type}} rotation1">{{$properties[$i]->name}}</div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="row-game top-game">
                @for($i = 10; $i >= 0; $i--)
                    <div class="@if($properties[$i]->type == 'corner')square2 @else square1 @endif bottomSide {{$properties[$i]->family}}">
                        @if($properties[$i]->type == 'corner')
                            <span class="corner corner{{$properties[$i]->id}}">{{$properties[$i]->name}}</span>
                        @else
                            @if($properties[$i]->type == 'field')
                                <div class="header-game header-bottom white"></div>
                            @endif
                            <div class="firstLine firstLine-bottom rotation2">{{$properties[$i]->name}}</div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
