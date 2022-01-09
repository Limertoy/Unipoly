@extends('layouts.template')

@section('title-text', 'Przyjaciele')
@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/friends.css') }}">
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Przyjaciele
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button class="btn btn-success">Dodaj nowego przyjaciela</button>
                </div>
            </div><br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Liczba przyjacieli: {{$count}}
                </div>
            </div>
            <br>
            @foreach($friends as $friend)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="info container">
                            <img class="friend-avatar" src="{{$friend->avatar}}">
                            <p class="friend-name">{{$friend->name}}</p>
                            <div class="right-info">
                                <form method="POST" action="{{route('delete_friend')}}">
                                    @method('DELETE')
                                    @csrf
                                    <input name="id" type="hidden" value="{{$friend->id}}">
                                    <input name="route" type="hidden" value="friends">
                                    <button type="submit" class="btn btn-outline-success">Usuń ze swoich przyjaciół
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><br>
            @endforeach
            <br>
        </div>
    </div>
</x-app-layout>
