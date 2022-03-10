<div>
    @if(!$lobby->is_started && (!$lobby->user2_id || $lobby->user1_id != Auth::id()))
        <div class="cell-info cell-roll">
            <p style="padding-top: 7vh">Oczekiwanie na innych graczy</p><br>
        </div>
    @else
    <div class="cell-info cell-roll">
        <p style="padding-top: 2vh">Oczekiwanie na innych graczy</p><br>
        <button class="btn btn-lg btn-success">Zacznij!</button>
    </div>
    @endif
</div>
