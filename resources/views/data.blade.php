
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
                    <?php
                        if (isset($_GET["buttonup"])) {
                            $i = false;
                        }
                        elseif (isset($_GET["buttondown"])) {
                            $i = true;
                        }
                        else {
                            $i = true;
                        }
                    ?>
                    @if ($i)
                        <p class="card-text">De dichteid van de wolken is {{ $wolk }}%</p>
                        <p class="card-text">Status van de zonnepanelen: @if($wolk == 100) inactief <i class="far fa-sad-cry"></i> @elseif($wolk >= 75 && $wolk != 100) minimale activiteit <i class="far fa-frown"></i> @elseif($wolk < 75 && $wolk >= 50) nauwlijks actief <i class="far fa-meh"></i> @elseif($wolk <= 50 && $wolk >= 25) acief <i class="fas fa-smile"></i> @elseif($wolk < 25 && $wolk != 0) goede opbrengst <i class="fas fa-smile-beam"></i> @elseif($wolk == 0) optimale opbrengst <i class="fas fa-laugh-beam"></i>@endif</p>
                        <div class="card-text">
                            <form action="#" method="get">
                                <button class="bg-success btn-success" type="submit" name="buttonup" id="buttonup"><i class="fas fa-arrow-circle-up"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="card-text">
                            <form action="#" method="get">
                                <button class="bg-success btn-success" type="submit" name="buttondown" id="buttondown"><i class="fas fa-arrow-circle-down"></i></button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
