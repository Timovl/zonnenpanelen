<?php
$year = date("Y");
$winst = \App\Winst::latest('id')->get();
$verbruik = \App\Verbruik::latest('id')->get();
$vuurstatus = \App\Fire::latest('id')->get();
$vuur = $vuurstatus[0]->on;
$locatie = \App\Location::latest('id')->get();
$page = $_SERVER['PHP_SELF'];
$sec = "60";
header("Refresh: $sec; url=$page/dashboard");
?>

@extends('layouts.layout')
@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection
@section('main')
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
    <h1>Dashboard</h1>
    <p>dashboard van {{ auth()->user()->name }}</p>
    <div style="margin-bottom: 20px">
        @if ($i)
            <div class="card-text">
                <form action="#" method="get">
                    <button class="bg-success btn-success" type="submit" name="buttonup" id="buttonup">Toon minder <i class="fas fa-arrow-circle-up"></i></button>
                </form>
            </div>
        @else
            <div class="card-text">
                <form action="#" method="get">
                    <button class="bg-success btn-success" type="submit" name="buttondown" id="buttondown">Toon meer <i class="fas fa-arrow-circle-down"></i></button>
                </form>
            </div>
        @endif
    </div>

    {{--    opbrengst--}}
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card" style="width: 18rem; background-color: lightgreen">
                <div class="card-body">
                    <h5 class="card-title">Totale winst {{ $year }} <i class="fas fa-search-dollar"></i></h5>
                    @if($i)
                        <hr>
                        <p class="card-text">De totale winst bedraagt {{ $winst[0]->winst }}€</p>
                    @endif
                </div>
            </div>
            {{--    totaal verbruik--}}
            <div class="card mt-5" style="width: 18rem; background-color: lightgreen">
                <div class="card-body">
                    <h5 class="card-title">Totale verbruik <i class="fas fa-bolt"></i></h5>
                    @if($i)
                        <hr>
                        <p class="card-text">Het verbruik bedraagt {{ $verbruik[0]->verbruik }} kwh</p>
                    @endif
                </div>
            </div>
            <div class="card mt-5" style="width: 18rem; @if($vuur == true) background-color: lightgreen @else background-color: red @endif">
                <div class="card-body">
                    <h5 class="card-title">Vuur @if($vuur == true) <i class="fab fa-hotjar"></i>@else <i class="fas fa-snowflake"></i> @endif</h5>
                    @if($i)
                        <hr>
                        <p class="card-text">Het het vuur staat @if($vuur == true) aan @else uit @endif</p>
                        @if ($vuur == true)
                            <form method="get"  action="dashboard">
                                <button name="on" class="btn btn-danger btn-sm" type="submit">Vuur uit <i class="fas fa-toggle-off"></i></button>
                            </form>
                        @else
                            <form method="get"  action="dashboard">
                                <button name="off" class="btn btn-success btn-sm" type="submit">Vuur aan <i class="fas fa-toggle-on iconcolor"></i></button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["on"])) {
        $vuur = new \App\Fire();
        $vuur->on = false;
        $vuur->save();
        $page = $_SERVER['PHP_SELF'];
        $sec = "1";
        header("Refresh: $sec; url=$page/dashboard");
    }
    elseif (isset($_GET["off"])) {
        $vuur = new \App\Fire();
        $vuur->on = true;
        $vuur->save();
        $page = $_SERVER['PHP_SELF'];
        $sec = "1";
        header("Refresh: $sec; url=$page/dashboard");
    }
    ?>

@endsection
