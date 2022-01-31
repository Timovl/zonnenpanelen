@extends('layouts.layout')
@section('title')
    {{ auth()->user()->name }} aanpassen
@endsection
@section('main')
    <?php
        $olduser = \App\User::findOrFail(auth()->id());
        $oldpanelen = \App\ZonnepanelenExtra::findOrFail(auth()->id());
        $oldloc = \App\Location::orderBy('id','desc')->where('user_id', $olduser->id)->get();
        $oldloc = $oldloc[0];

    ?>
    <div>
        <h1>{{ auth()->user()->name }} aanpassen</h1>
    </div>

    <div class="bg-edit">
        <form action="" method="get">
        @csrf
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name"
                   class="form-control"
                   placeholder="{{ $olduser->name }}"
                   value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control"
                   placeholder="{{ $olduser->email }}"
                   value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="ww">Wachtwoord</label>
            <input type="password" name="ww" id="ww"
                   class="form-control"
                   placeholder="{{ $olduser->password }}"
                   value="{{ old('ww') }}">
        </div>

            <div class="form-group">
                <label for="panelen">Aantal zonnepanelen</label>
                <input type="text" name="panelen" id="panelen"
                       class="form-control"
                       placeholder="{{ $oldpanelen->zonnepanelen }}"
                       value="{{ old('panelen') }}">
            </div>
            <div class="form-group">
                <label for="loc">Locatie</label>
                <input type="text" name="loc" id="loc"
                       class="form-control"
                       placeholder="{{ $oldloc->location }}"
                       value="{{ old('loc') }}">
            </div>
            <div class="form-group">
                <label for="piek">Piekuur</label>
                <input type="text" name="piek" id="piek"
                       class="form-control"
                       placeholder="{{ $oldpanelen->piekuur }}"
                       value="{{ old('piek') }}">
            </div>
        <button name="submit" class="btn btn-success" type="submit">Update Gebruiker</button>
    </form>
    </div>
    <?php
        if (isset($_GET["submit"])) {
            $user = \App\User::findOrFail(auth()->id());
            $location = \App\Location::findOrFail($oldloc->id);
            $panelen = \App\ZonnepanelenExtra::findOrFail(auth()->id());
            if ($_GET['name']) {
                $user->name = $_GET['name'];
            } else {
                $user->name = $olduser->name;
            }
            if ($_GET['email']) {
                $user->email = $_GET['email'];
            } else {
                $user->email = $olduser->email;
            }
            if ($_GET['ww']) {
                $user->password = Hash::make($_GET['ww']);
            } else {
                $user->password = Hash::make($olduser->password);
            }
            if ($_GET['loc']) {
                $location->location = $_GET['loc'];
                $location->save();
            }
            if ($_GET['panelen']) {
                $panelen->zonnepanelen = $_GET['panelen'];
                $panelen->save();
            }
            if ($_GET['piek']) {
                $panelen->piekuur = $_GET['piek'];
                $panelen->save();
            }
            $user->save();

            $page = $_SERVER['PHP_SELF'];
            $sec = "0.2";
            header("Refresh: $sec; url=$page/home");
        }
    ?>
@endsection
