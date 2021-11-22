@extends('layouts.template')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Poczekalnie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="app">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <lobby-create v-on:createlobby="addLobby" :user="{{Auth::user()}}"></lobby-create>
                </div>
            </div><br>
            <lobby-join :lobbies="lobbies" v-on:joinlobby="joinLobby" :user="{{Auth::user()}}"></lobby-join>
        </div>
    </div>
</x-app-layout>
