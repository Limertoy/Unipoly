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
                            <b><h5 style="padding-top: 10px">{{ $missions[$i]->name }}</h5></b>
                            <p style="font-size: 13px">{{ $missions[$i]->description }}</p>
                            <progress class="missions" max="{{ $missions[$i]->goal }}" value="{{ $missions[$i]->actual }}"></progress>
                            @if($i != 2)
                                <div class="border-gray-500 border-b" style="padding-top: 10px"></div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
