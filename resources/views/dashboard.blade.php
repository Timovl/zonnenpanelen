<?php
    $year = date("Y");
    $winst = \App\Winst::latest('id')->get();
    $verbruik = \App\Verbruik::latest('id')->get();
    $vuurstatus = \App\Fire::latest('id')->get();
    $vuur = $vuurstatus[0]->on;

    $page = $_SERVER['PHP_SELF'];
    $sec = "60";
    header("Refresh: $sec; url=$page/dashboard");
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
                <h5 class="card-title">Totale winst {{ $year }} <i class="fas fa-search-dollar"></i></h5>
                <hr>
                <p class="card-text">De totale winst bedraagt {{ $winst[0]->winst }}€</p>
            </div>
        </div>
        {{--    totaal verbruik--}}
        <div class="card mt-5" style="width: 18rem; background-color: lightgreen">
            <div class="card-body">
                <h5 class="card-title">Totale verbruik <i class="fas fa-bolt"></i></h5>
                <hr>
                <p class="card-text">Het verbruik bedraagt {{ $verbruik[0]->verbruik }} kwh</p>
            </div>
        </div>
        <div class="card mt-5" style="width: 18rem; @if($vuur == true) background-color: lightgreen @else background-color: red @endif">
            <div class="card-body">
                <h5 class="card-title">Vuur @if($vuur == true) <i class="fab fa-hotjar"></i>@else <i class="fas fa-snowflake"></i> @endif</h5>
                <hr>
                <p class="card-text">Het het vuur staat @if($vuur == true) aan @else uit @endif</p>
            </div>
        </div>

@endsection
