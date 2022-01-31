@extends('layouts.layout')

@section('title')
    Home
@endsection
@section('main')
    <h1>Zonnepanelen Team JM1</h1>
    <p>Welkom @if(auth()->user()) {{auth()->user()->name}} @endif op de home page! <i class="fas fa-solar-panel"></i></p>
    @if(auth()->user())
        <?php
            $y = date("Y");
            $dagw = -10;
            $maandw = 30;
            $jaarw = 50;
            $dago = 1024;
            $maando = 1457;
            $jaaro = 1758;

            $conn = new mysqli("localhost", "homestead", "secret", "zonnepanelen");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
//            $sql1 = "SELECT sum(kwh) as 'Totaal_Kwh' ,sum(kwh*0.22) as 'Totale_Winst' FROM zonnepanelen.zonnepanelen_data where time like DATE_FORMAT(NOW(), '%Y-%m-%d%') and user_id = 1";
//            $dag = $conn->query($sql1);
//            $sql2 = "SELECT sum(kwh) as 'Totaal_Kwh_maand' ,sum(kwh*0.22) as 'Totale_Winst_maand' FROM zonnepanelen.zonnepanelen_data where time like DATE_FORMAT(NOW(), '%Y-%m-%%') and user_id = 1";
//            $maand = $conn->query($sql2);
//            $sql3 = "SELECT sum(kwh) as 'Totaal_Kwh_yaar' ,sum(kwh*0.22) as 'Totale_Winst_yaar' FROM zonnepanelen.zonnepanelen_data where time like DATE_FORMAT(NOW(), '%Y%') and user_id = 1";
//            $jaar = $conn->query($sql3);

        ?>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card" style="width: 18rem; background-color:@if( $dagw > 0) lightgreen @else red @endif">
                    <div class="card-body">
                        <h5 class="card-title">Dag</h5>
                        <hr>
                        <p class="card-text"> Totale winst vandaag: {{ $dagw }} €</p>
                        <p class="card-text"> Totale energie opgewekt vandaag: {{ $dago }} kwh</p>
                    </div>
                </div>
                <div class="card mt-5" style="width: 18rem; background-color: @if( $maandw > 0) lightgreen @else red @endif">
                    <div class="card-body">
                        <h5 class="card-title">Maand</h5>
                        <hr>
                        <p class="card-text">Totale winst deze maand: {{ $maandw }} €</p>
                        <p class="card-text">Totale energie opgewekt deze maand: {{ $maando }} kwh</p>
                    </div>
                </div>
                <div class="card mt-5" style="width: 18rem; background-color: @if( $jaarw > 0) lightgreen @else red @endif">
                    <div class="card-body">
                        <h5 class="card-title">Jaar</h5>
                        <hr>
                        <p class="card-text">Totale winst in {{ $y }}: {{ $jaarw }} €</p>
                        <p class="card-text">Totale energie opgewekt in {{ $y }}: {{ $jaaro }} kwh</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
