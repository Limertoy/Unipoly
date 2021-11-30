@extends('layouts.template')

@section('title-text', 'Poczekalnie')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Poczekalnie') }}
        </h2>
    </x-slot>

    <div class="py-12" id="app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <lobby-create v-on:createlobby="addLobby" :user="{{Auth::user()}}"></lobby-create>
                </div>
            </div>
            <br>
            @forelse($lobbies as $lobby)
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <lobby-show v-bind:lobby="{{$lobby->id}}"></lobby-show>
                    <lobby-join v-on:joinLobby="joinLobby" :user="{{Auth::user()}}" :lobby="{{$lobby->id}}"></lobby-join>
                </div><br>
            @empty
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    Nie ma stworzonych poczekalni
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
