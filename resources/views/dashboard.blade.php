<?php
    $year = date("Y");
    $winst = \App\Winst::latest('id')->get();
    $verbruik = \App\Verbruik::latest('id')->get();
    $vuurstatus = \App\Fire::latest('id')->get();
    $vuur = $vuurstatus[0]->on;
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
                <p class="card-text">De totale winst bedraagt {{ $winst[0]->winst }}€</p>
            </div>
        </div>
        {{--    totaal verbruik--}}
        <div class="card mt-5" style="width: 18rem; background-color: lightgreen">
            <div class="card-body">
                <h5 class="card-title">Totale verbruik</h5>
                <p class="card-text">Het verbruik bedraagt {{ $verbruik[0]->verbruik }} kwh</p>
            </div>
        </div>
        <div class="card mt-5" style="width: 18rem; @if($vuur == true) background-color: lightgreen @else background-color: red @endif">
            <div class="card-body">
                <h5 class="card-title">Vuur</h5>
                <p class="card-text">Het het vuur staat @if($vuur == true) aan @else uit @endif</p>
            </div>
        </div>

    <?php
//    $url = "http://api.openweathermap.org/data/2.5/weather?q=GEEL,be&APPID=3549103ef3613a207b01cf22509d8d84";
//
//    $curl = curl_init($url);
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//    $headers = array(
//        "Accept: application/json",
//    );
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//    //for debug only!
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//    $resp = curl_exec($curl);
//    curl_close($curl);
//    var_dump($resp);

        $jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=GEEL,be&APPID=3549103ef3613a207b01cf22509d8d84");
        $jsondata = json_decode($jsonfile);
        $temp = ($jsondata->main->temp) - 273.15;
        $humidity = $jsondata->weather[0]->description;

        ?>

        <div class="card mt-5" style="width: 18rem; @if($vuur == true) background-color: lightgreen @else background-color: red @endif">
            <div class="card-body">
                <h5 class="card-title">Weer</h5>
                <p class="card-text">De huidige temperatuur is {{ $temp }}°C</p>
                <p class="card-text">De weersomstandigheid is {{ $humidity }}</p>
            </div>
        </div>
    </div>
@endsection
