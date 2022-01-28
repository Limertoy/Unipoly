<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/game.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/board.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body style="background-color: #2a4ecd;">
<div class="container-fluid">
    <div class="row">
        <div class="col-8 first">
            <div class="container players">
                <livewire:game-players :lobby_id="$lobby->id"/>
            </div>
            <div class="container-lg">
                <livewire:board/>
            </div>
        </div>
        <div class="col-4 second">
            <div class="cell-info cell-roll">
                <p id="currentTurn"></p><br>
                <button id="rollButton" class="btn btn-success">Rzuć kośćmi!</button>
            </div>
            <div class="chat-info" style="margin-top: 60%; padding-left: 5px;">
                <livewire:game-chat :lobby_id="$lobby->id" :user_id="Auth::id()"/>
            </div>
        </div>
    </div>
</div>
    @livewireScripts
</body>
</html>
