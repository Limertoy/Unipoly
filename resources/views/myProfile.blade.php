@extends('layouts.template')
@section('title-text', 'Mój profile')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mój profil
        </h2>
    </x-slot>

    @if($action != '')
        <div class="alert alert-success" role="alert">
            Dane zostały zmienone
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="crop">
                                    <img src="{{$user->avatar}}">
                                </div>
                                <p style="font-size: 30px">{{$user->name}}</p>
                            </div>
                            <div class="col-9" style="text-align: left; font-size: 15px">
                                <p style="font-size: 20px">Twoja Informacja</p>
                                <hr>
                                <p>Twój email: {{$user->email}}</p>
                                <p>Gier zagrano: {{$stats->games_played}}, z nich wygrano: {{$stats->games_won}}</p>
                                <p>Banów czatu: {{$stats->banned_times}}</p>
                                <p>Misji wykonano: {{$stats->missions_completed}}</p>
                                <p>Powiadomień odesłano: {{$stats->messages_sent}}</p>
                                <hr>
                                <a class="btn btn-success" href="/editProfile">Edytuj profil</a>
                                <button class="btn btn-success" onclick="showForm()">Zmień hasło</button>
                                <form id="change-password" method="POST" style="padding-top: 5px; display: none"
                                      onsubmit="checkPassword()"
                                      action="{{route('change_password', ['id' => Auth::id()])}}">
                                    @method('PUT')
                                    @csrf
                                    <input style="border-radius: 10px" id="pswd1" type="password" name="password"
                                           placeholder="Wpisz nowe hasło..." required>
                                    <input style="border-radius: 10px" id="pswd2" type="password"
                                           placeholder="Podtwierdź hasło..." required>
                                    <button class="btn btn-outline-success" type="submit">Zapisz</button>
                                    <p id="not-match" style="display: none; color: red">Hasła nie są takie same</p>
                                    <p id="too-small" style="display: none; color: red">Hasło nie może mieć mniej niż 8
                                        znaków</p>
                                    <p id="too-big" style="display: none; color: red">Hasło nie może być dłuższe niż 20
                                        znaków</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@section('link-script')
    <script>
        function showForm() {
            var x = document.getElementById("change-password");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function checkPassword() {
            var pw1 = document.getElementById("pswd1");
            var pw2 = document.getElementById("pswd2");
            pw1.style.borderColor = "red";
            pw2.style.borderColor = "red";

            if (pw1.value.length < 8) {
                document.getElementById('too-small').style.display = "block";
                document.getElementById('too-big').style.display = "none";
                document.getElementById('not-match').style.display = "none";
                event.preventDefault();
            } else if (pw1.value.length > 20) {
                document.getElementById('too-small').style.display = "none";
                document.getElementById('too-big').style.display = "block";
                document.getElementById('not-match').style.display = "none";
                event.preventDefault();
            } else if (pw1.value != pw2.value) {
                document.getElementById('too-small').style.display = "none";
                document.getElementById('too-big').style.display = "none";
                document.getElementById('not-match').style.display = "block";
                event.preventDefault();
            } else {
                document.getElementById('too-small').style.display = "none";
                document.getElementById('too-big').style.display = "none";
                document.getElementById('not-match').style.display = "none";
                pw2.style.borderColor = "gray";
                pw1.style.borderColor = "gray";

                return true;
            }
        }

        setTimeout(function () {
            $('.alert').alert('close');
        }, 4000);
    </script>
@endsection
