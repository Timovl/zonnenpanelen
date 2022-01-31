@extends('layouts.layout')

@section('title')
    Gegevens
@endsection
@section('main')
    <h1>Gegevens voor {{auth()->user()->name}}</h1>
    <form action="" method="get">
        @csrf
        <div class="form-group">
            <label for="loc">Locatie</label>
            <input type="text" name="loc" id="loc"
                   class="form-control"
                   placeholder="Locatie"
                   value="{{ old('loc') }}">
        </div>
        <div class="form-group">
            <label for="aantal">Aantal zonnepanelen</label>
            <input type="text" name="aantal" id="aantal"
                   class="form-control"
                   placeholder="Aantal panelen"
                   value="{{ old('aantal') }}">
        </div>
        <div class="form-group">
            <label for="piek">Piekuur</label>
            <input type="text" name="piek" id="piek"
                   class="form-control"
                   placeholder="Piekuur"
                   value="{{ old('piek') }}">
        </div>
        <button name="submit" class="btn btn-success" type="submit">Gegevens opslaan</button>
    </form>
    <?php
            if (isset($_GET["submit"])) {
                $user = \App\User::findOrFail(auth()->id());
                $user->set = true;
                $user->save();
                $locatie = ($_GET['loc']);
                $loc = new \App\Location();
                $loc->location = $locatie;
                $loc->user_id = $user->id;
                $loc->save();
                $panelen = $_GET['aantal'];
                $pan = new \App\ZonnepanelenExtra();
                $pan->zonnepanelen = $panelen;
                $pan->user_id = $user->id;
                $pan->location_id = $loc->id;
                $pan->piekuur = $_GET['piek'];
                $pan->save();
            }
        ?>
@endsection
