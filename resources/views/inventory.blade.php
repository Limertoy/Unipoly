@extends('layouts.template')

@section('title-text', 'Inwentarz')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/inventory.css') }}">
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inwentarz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <h5>Twoje przedmioty:</h5><br>
                    @forelse($items as $item)
                    <div class="item-cell">
                        <div class="item-screen"></div>
                        <div class="item-name {{ $item->rarity }}">{{ $item->name }}</div>
                    </div>
                    @empty
                        <p>Nie masz jeszcze przedmiotów</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
