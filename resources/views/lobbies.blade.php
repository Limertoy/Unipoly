@extends('layouts.template')

@section('title-text', 'Poczekalnie')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Poczekalnie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($active_lobby)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p style="font-size: xx-large; color: red;">Jesteś w aktywnej grze!</p>
                        <a class="btn btn-lg btn-danger" href="{{route('joinGame', ['id' => $active_lobby->token])}}">Dołącz do poprzedniej gry</a>
                </div>
            </div><br>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{route('createLobby')}}">
                            @method('POST')
                            @csrf
                            <button class="btn btn-lg btn-info" id="btn-chat" type="sumbit">
                                Nowa poczekalnia
                            </button>
                        </form>
                </div>
            </div>
            <br>
            @forelse($lobbies as $lobby)
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div style="text-align: center">
                        Poczekania numer #{{$lobby->id}}
                    </div>
                    <div class="input-group">
                        <form method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="lobby" value="{{$lobby->id}}">
                            <button class="btn btn-lg btn-info" id="btn-chat" @click="joinLobby">
                                Wejdź
                            </button>
                        </form>

                    </div>
                </div><br>
            @empty
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    Nie ma stworzonych poczekalni
                </div>
            @endforelse
            <dialog id="lobby-exist" style="display: none; border-radius: 10px; border-color: gray; background-color: gainsboro;" open>
                @if(session('alert') == 'lobby_exists')
                    <p>Nie możesz stworzyć nowej poczekalni, ponieważ już jesteś w aktywnej. Wyjdź i spróbuj znowu.</p>
                @elseif(session('alert')== 'places_taken')
                    <p>Nie możesz wejść do tej poczekalni, ponieważ już nie ma miejsc. Wyjdź i spróbuj znowu.</p>
                @elseif(session('alert')== 'cant_enter')
                    <p>Nie możesz wejść do poczekalni, ponieważ już jesteś w aktywnej. Wyjdź i spróbuj znowu.</p>
                @endif()
                <p>
                    <button class="btn btn-sm btn-danger" id="closeDialog">Zamknij</button>
                </p>
            </dialog>
        </div>
    </div>
</x-app-layout>

@section('link-script')
    <script>
        var dialog = document.getElementById('lobby-exist')
        var button = document.getElementById('closeDialog')
        if ('{{session('alert')}}') {
            dialog.style.display = 'inline';
        }

        button.onclick = function () {
            dialog.style.display = 'none';
        }
    </script>
@endsection
