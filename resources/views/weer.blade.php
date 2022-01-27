<?php
$year = date("Y");
$winst = \App\Winst::latest('id')->get();
$verbruik = \App\Verbruik::latest('id')->get();
$vuurstatus = \App\Fire::latest('id')->get();
$vuur = $vuurstatus[0]->on;

$page = $_SERVER['PHP_SELF'];
$sec = "60";
header("Refresh: $sec; url=$page/weer");
?>

<?php
    $jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=GEEL,be&APPID=3549103ef3613a207b01cf22509d8d84");
    $jsondata = json_decode($jsonfile);
    $temp = ($jsondata->main->temp) - 273.15;
    $humidity = $jsondata->weather[0]->description;
    $sr = $jsondata->sys->sunrise;
    $sunrise = gmdate("H:i:s", $sr);
    $ss = $jsondata->sys->sunset;
    $sunset = gmdate("H:i:s", $ss);
    $act = $sr - $ss;
    $actief = gmdate("H:i:s", $act);
    $locatie = $jsondata->name;


?>


@extends('layouts.layout')
@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection
@section('main')
    <h1>Weersverwachtingen</h1>
    <p> weersverwachtingen voor {{ $locatie }}</p>
    {{--    opbrengst--}}
    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="card mt-5" style="width: 18rem; background-color: lightgreen">
            <div class="card-body">
                <h5 class="card-title">Weer <i class="fas fa-cloud-sun-rain"></i></h5>
                <hr>
                <p class="card-text">De huidige temperatuur is {{ $temp }}°C</p>
                <p class="card-text">De weersomstandigheid is: {{ $humidity }}</p>
            </div>
        </div>


        <div class="card mt-5" style="width: 18rem; background-color: lightgreen">
            <div class="card-body">
                <h5 class="card-title">Zon <i class="fas fa-sun"></i></h5>
                <hr>
                <p class="card-text">De zon is om {{ $sunrise }} opgekomen </p>
                <p class="card-text">De zon gaat onder om {{ $sunset }}</p>
                <p class="card-text">De zonnepanelen zijn {{ gmdate("H", $act) }} uur en {{ gmdate("i", $act) }} minuten actief</p>
            </div>
        </div>
    </div>
@endsection
