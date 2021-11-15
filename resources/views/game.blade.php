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


    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/game.js') }}"></script>
</head>
<body class="text-center">
<div class="container-fluid">
    <div class="row">
        <div class="col-8 first">
            <div class="container players">
                <div class="cell-info" id="player1-info">
                    <p id="player1-info_name" style="display:inline"><p class='token' id="player1-info_token"></p><br>
                    <p id="player1-info_cash">cash</p>
                </div>
                <div class="cell-info" id="player2-info">
                    <p id="player2-info_name" style="display:inline"><p class='token' id="player2-info_token"></p><br>
                    <p id="player2-info_cash">cash</p>
                </div>
            </div>
            <div class="container-lg">
                <div class="row">
                    <div class="cell-corner" id="square1">
                        <p id="square1-residents" class="residents">
                        <p id="square1-name" class="square-name">POCZĄTEK</p>
                    </div>
                    <div class="cell square" id="square2">
                        <p id="square2-name" class="square-name"></p>
                        <p id="square2-value"></p>
                        <p id="square2-owner"></p>
                        <p id="square2-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square3">
                        <p id="square3-name" class="square-name"></p>
                        <p id="square3-value"></p>
                        <p id="square3-owner"></p>
                        <p id="square3-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square4">
                        <p id="square4-name" class="square-name"></p>
                        <p id="square4-value"></p>
                        <p id="square4-owner"></p>
                        <p id="square4-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square5">
                        <p id="square5-name" class="square-name"></p>
                        <p id="square5-value"></p>
                        <p id="square5-owner"></p>
                        <p id="square5-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square6">
                        <p id="square6-name" class="square-name"></p>
                        <p id="square6-value"></p>
                        <p id="square6-owner"></p>
                        <p id="square6-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square7">
                        <p id="square7-name" class="square-name"></p>
                        <p id="square7-value"></p>
                        <p id="square7-owner"></p>
                        <p id="square7-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square8">
                        <p id="square8-name" class="square-name"></p>
                        <p id="square8-value"></p>
                        <p id="square8-owner"></p>
                        <p id="square8-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square9">
                        <p id="square9-name" class="square-name"></p>
                        <p id="square9-value"></p>
                        <p id="square9-owner"></p>
                        <p id="square9-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square10">
                        <p id="square10-name" class="square-name"></p>
                        <p id="square10-value"></p>
                        <p id="square10-owner"></p>
                        <p id="square10-residents" class="residents"></p>
                    </div>
                    <div class="cell-corner" id="square11">
                        <p id="square11-name" class="square-name">DZIEKANAT</p>
                        <p id="square11-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square40">
                        <p id="square40-name" class="square-name"></p>
                        <p id="square40-value"></p>
                        <p id="square40-owner"></p>
                        <p id="square40-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square12">
                        <p id="square12-name" class="square-name"></p>
                        <p id="square12-value"></p>
                        <p id="square12-owner"></p>
                        <p id="square12-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square39">
                        <p id="square39-name" class="square-name"></p>
                        <p id="square39-value"></p>
                        <p id="square39-owner"></p>
                        <p id="square39-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square13">
                        <p id="square13-name" class="square-name"></p>
                        <p id="square13-value"></p>
                        <p id="square13-owner"></p>
                        <p id="square13-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square38">
                        <p id="square38-name" class="square-name"></p>
                        <p id="square38-value"></p>
                        <p id="square38-owner"></p>
                        <p id="square38-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square14">
                        <p id="square14-name" class="square-name"></p>
                        <p id="square14-value"></p>
                        <p id="square14-owner"></p>
                        <p id="square14-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square37">
                        <p id="square37-name" class="square-name"></p>
                        <p id="square37-value"></p>
                        <p id="square37-owner"></p>
                        <p id="square37-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square15">
                        <p id="square15-name" class="square-name"></p>
                        <p id="square15-value"></p>
                        <p id="square15-owner"></p>
                        <p id="square15-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square36">
                        <p id="square36-name" class="square-name"></p>
                        <p id="square36-value"></p>
                        <p id="square36-owner"></p>
                        <p id="square36-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square16">
                        <p id="square16-name" class="square-name"></p>
                        <p id="square16-value"></p>
                        <p id="square16-owner"></p>
                        <p id="square16-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square35">
                        <p id="square35-name" class="square-name"></p>
                        <p id="square35-value"></p>
                        <p id="square35-owner"></p>
                        <p id="square35-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square17">
                        <p id="square17-name" class="square-name"></p>
                        <p id="square17-value"></p>
                        <p id="square17-owner"></p>
                        <p id="square17-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square34">
                        <p id="square34-name" class="square-name"></p>
                        <p id="square34-value"></p>
                        <p id="square34-owner"></p>
                        <p id="square34-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square18">
                        <p id="square18-name" class="square-name"></p>
                        <p id="square18-value"></p>
                        <p id="square18-owner"></p>
                        <p id="square18-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square33">
                        <p id="square33-name" class="square-name"></p>
                        <p id="square33-value"></p>
                        <p id="square33-owner"></p>
                        <p id="square33-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square19">
                        <p id="square19-name" class="square-name"></p>
                        <p id="square19-value"></p>
                        <p id="square19-owner"></p>
                        <p id="square19-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row row-side">
                    <div class="cell-side" id="square32">
                        <p id="square32-name" class="square-name"></p>
                        <p id="square32-value"></p>
                        <p id="square32-owner"></p>
                        <p id="square32-residents" class="residents"></p>
                    </div>
                    <div class="cell-middle"></div>
                    <div class="cell-side" id="square20">
                        <p id="square20-name" class="square-name"></p>
                        <p id="square20-value"></p>
                        <p id="square20-owner"></p>
                        <p id="square20-residents" class="residents"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="cell-corner" id="square31">
                        <p id="square31-name" class="square-name">IDŹ DO DZIEKANATU</p>
                        <p id="square31-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square30">
                        <p id="square30-name" class="square-name"></p>
                        <p id="square30-value"></p>
                        <p id="square30-owner"></p>
                        <p id="square30-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square29">
                        <p id="square29-name" class="square-name"></p>
                        <p id="square29-value"></p>
                        <p id="square29-owner"></p>
                        <p id="square29-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square28">
                        <p id="square28-name" class="square-name"></p>
                        <p id="square28-value"></p>
                        <p id="square28-owner"></p>
                        <p id="square28-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square27">
                        <p id="square27-name" class="square-name"></p>
                        <p id="square27-value"></p>
                        <p id="square27-owner"></p>
                        <p id="square27-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square26">
                        <p id="square26-name" class="square-name"></p>
                        <p id="square26-value"></p>
                        <p id="square26-owner"></p>
                        <p id="square26-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square25">
                        <p id="square25-name" class="square-name"></p>
                        <p id="square25-value"></p>
                        <p id="square25-owner"></p>
                        <p id="square25-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square24">
                        <p id="square24-name" class="square-name"></p>
                        <p id="square24-value"></p>
                        <p id="square24-owner"></p>
                        <p id="square24-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square23">
                        <p id="square23-name" class="square-name"></p>
                        <p id="square23-value"></p>
                        <p id="square23-owner"></p>
                        <p id="square23-residents" class="residents"></p>
                    </div>
                    <div class="cell square" id="square22">
                        <p id="square22-name" class="square-name"></p>
                        <p id="square22-value"></p>
                        <p id="square22-owner"></p>
                        <p id="square22-residents" class="residents"></p>
                    </div>
                    <div class="cell-corner" id="square21">
                        <p id="square21-name" class="square-name">AUTOMAT KAWOWY</p>
                        <p id="square21-residents" class="residents"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 second">
            <div class="cell-info cell-roll">
                <p id="currentTurn"></p><br>
                <button id="rollButton" class="btn btn-success">Rzuć kośćmi!</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
