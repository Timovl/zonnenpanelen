<?php
    $year = date("Y");
    $winst = 745.23;
    $verbruik = 487;
    $vuur = false
?>

@extends('layouts.layout')
@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection
@section('main')
    <h1>Dashboard</h1>
    <p>dashboard van {{ auth()->user()->name }}</p>
    {{--    opbrengst--}}
    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="card" style="width: 18rem; background-color: lightgreen">
            <div class="card-body">
                <h5 class="card-title">Totale winst {{ $year }}</h5>
                <p class="card-text">De totale winst bedraagt {{ $winst }}€</p>
            </div>
        </div>
        {{--    totaal verbruik--}}
        <div class="card mt-5" style="width: 18rem; background-color: lightgreen">
            <div class="card-body">
                <h5 class="card-title">Totale verbruik</h5>
                <p class="card-text">Het verbruik bedraagt {{ $verbruik }} kwh</p>
            </div>
        </div>
        <div class="card mt-5" style="width: 18rem; @if($vuur == true) background-color: lightgreen @else background-color: red @endif">
            <div class="card-body">
                <h5 class="card-title">Vuur</h5>
                <p class="card-text">Het het vuur staat @if($vuur == true) aan @else uit @endif</p>
            </div>
        </div>
    </div>
@endsection
