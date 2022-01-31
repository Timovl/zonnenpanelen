
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
@section('script_before')
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
//                $con = mysqli_connect('localhost','homestead','secret','testchart');
//                $query = "SELECT * from class";
//
//                $exec = mysqli_query($con,$query);
//                while($row = mysqli_fetch_array($exec)){
//
//                    echo "['".$row['class_name']."',".$row['students']."],";
//                }

                    $loc = \App\Location::get();
                    $locatie = $loc[0]->location;
                    $id = $loc[0]->id;
                    echo "['" . $locatie . "',". $id ."],";

//               ?>

            ]);

            var options = {
                title: '',
                pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'black',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
            chart.draw(data,options);
        }

    </script>
@endsection
@section('title')
    Data van {{ auth()->user()->name }}
@endsection
@section('main')

    <div id="columnchart12" style="width: 100%; height: 500px;"></div>

@endsection
