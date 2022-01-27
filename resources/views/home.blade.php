@extends('layouts.layout')

@section('title')
    Home
@endsection
@section('main')
    <h1>Zonnepanelen Team JM1</h1>
    <p>Welkom @if(auth()->user()) {{auth()->user()->name}} @endif op de home page! <i class="fas fa-solar-panel"></i></p>
@endsection
