@extends('layouts.template')

@section('title-text', 'Dashboard')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container" style="padding-top: 40px">
        <div class="row">
            <div class="col-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white text-center">
                        @for($i = 0; $i < 3; $i++)
                            @if($missions[$i]->hidden != 1)
                            <b><h5 style="padding-top: 10px">{{ $missions[$i]->name }}</h5></b>
                            <p style="font-size: 13px">{{ $missions[$i]->description }}</p>
                            <progress class="missions" max="{{ $missions[$i]->goal }}" value="{{ $missions[$i]->actual }}"></progress>
                            @if($i != 2)
                                <div class="border-gray-500 border-b" style="padding-top: 10px"></div>
                            @endif
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white text-center">
                        Tutaj info
                    </div>
                </div><br>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white text-center" id="app">
                        <chat-messages :messages="messages"></chat-messages>
                        @if(!Auth::user()->is_muted)
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                        @else
                        <p class="warning-chat">Jesteś zmutowany, nie możesz pisać powiadomień</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
