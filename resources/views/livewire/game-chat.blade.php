<div wire:poll.1000ms>
    <div class="chat-container border-bottom">
    @forelse ($messages as $message)
        @if($message->user->id != 1){{$message->user->name}}: @endif{{$message->message}}
        <br/>
    @empty
        <h1>Czat pusty.</h1>
    @endforelse
    </div>
    <div style="text-align: center; padding-top: 5px; ">
        <form wire:submit.prevent="sendMessage">
            <input wire:model.defer="messageText" type="text" style="width: 82%">
            <button type="submit" class="btn btn-outline-light">Send</button>
        </form>
    </div>
</div>
