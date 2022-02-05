<div>
    <div class="row">
        <div class="col-8">
            <div class="container players">
                @yield('game-players')
            </div>
            <div class="container-lg">
                @yield('board')
            </div>
        </div>
        <div class="col-4">
            @yield('game-logic')
                <div class="chat-info" style="margin-top: 40vh; padding-left: 0.25vw;">
                    @yield('game-chat')
                </div>
        </div>
    </div>
</div>
