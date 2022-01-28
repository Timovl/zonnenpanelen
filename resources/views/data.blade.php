
<?php
    $loc = \App\Location::latest('id')->get();
    $locatie = $loc[0]->location;
    $jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $locatie . ",be&APPID=3549103ef3613a207b01cf22509d8d84");
    $jsondata = json_decode($jsonfile);
    $temp = ($jsondata->main->temp) - 273.15;
    $humidity = $jsondata->weather[0]->description;
    $sr = $jsondata->sys->sunrise;
    $sunrise = gmdate("H:i:s", $sr);
    $ss = $jsondata->sys->sunset;
    $sunset = gmdate("H:i:s", $ss);
    $act = $ss - $sr;
    $actief = gmdate("H:i:s", $act);
    $wolk = $jsondata->clouds->all;
?>


@extends('layouts.layout')
@section('title')
    Apparaten van {{ auth()->user()->name }}
@endsection
@section('main')
    <h1>Apparaten</h1>
    <p> Apparaten van {{ auth()->user()->name }}</p>

    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card" style="width: 18rem; background-color: lightgreen">
                <div class="card-body">
                    <h5 class="card-title">Zonnenpanelen <i class="fas fa-solar-panel"></i></h5>
                    <hr>
                    <p class="card-text">De dichteid van de wolken is {{ $wolk }}%</p>
                    <p class="card-text">Status van de zonnepanelen: @if($wolk == 100) inactief @elseif($wolk >= 75 && $wolk != 100) minimale activiteit @elseif($wolk < 75 && $wolk >= 50) nauwlijks actief @elseif($wolk <= 50 && $wolk >= 25) acief @elseif($wolk < 25 && $wolk != 0) goede opbrengst @elseif($wolk == 0) optimale opbrengst @endif</p>
                </div>
            </div>
        </div>
    </div>
@endsection
