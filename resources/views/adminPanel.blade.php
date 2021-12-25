@extends('layouts.template')
@section('title-text', 'Panel Admina')
@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/adminPanel.css') }}">
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Admina') }}
        </h2>
    </x-slot>

    @if($alert != 'none')
        <div class="alert alert-success" role="alert">
            {{$alert}}
        </div>
    @endif



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('searchUser')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search_request" placeholder="Wpisz pseudonim lub email...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Szukaj</button>
                            </div>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Pseudonim</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rola</th>
                            <th scope="col">Aktualny stan</th>
                            <th scope="col">Działania</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->name != 'System')
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->is_admin)
                                        <td style="color: #7A4B09">Admin</td>
                                    @elseif($user->is_moderator)
                                        <td style="color: red">Moderator</td>
                                    @else
                                        <td>Użytkownik</td>
                                    @endif
                                    @if($user->is_banned)
                                        <td>Zbanowany</td>
                                    @elseif($user->is_muted)
                                        <td>Zmutowany</td>
                                    @else
                                        <td>Żaden</td>
                                    @endif
                                    <td>
                                        @if($user->id != Auth::id() && !($user->is_admin))
                                            @if(!($user->is_muted))
                                                <form action="{{route('mute')}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn-sm btn-outline-info" type="submit">Zmutuj
                                                    </button>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                </form>
                                            @else
                                                <form action="{{route('unmute')}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn-sm btn-outline-info" type="submit">Rozmutuj
                                                    </button>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                </form>
                                            @endif
                                            @if(!($user->is_banned))
                                                <form action="{{route('ban')}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn-sm btn-outline-danger" type="submit">Zbanuj
                                                    </button>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                </form>
                                            @else
                                                <form action="{{route('unban')}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn-sm btn-outline-danger" type="submit">Rozbanuj
                                                    </button>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                </form>
                                            @endif
                                            @if(!($user->is_moderator))
                                                <form action="{{route('addModer')}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn-sm btn-outline-success" type="submit">Zrób
                                                        moderatorem
                                                    </button>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                </form>
                                            @else
                                                <form action="{{route('removeModer')}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn-sm btn-outline-success" type="submit">Zabierz
                                                        prawa moderatora
                                                    </button>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                </form>
                                            @endif
                                        @elseif($user->id == Auth::id())
                                            Brak działań dla siebie
                                        @else
                                            Nie możesz nic robić z innym adminem
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@section('link-script')
    <script>
        setTimeout(function () {
            $('.alert').alert('close');
        }, 4000);
    </script>
@endsection
