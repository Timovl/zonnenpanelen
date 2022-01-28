@extends('layouts.layout')
@section('title')
    {{ auth()->user()->name }} aanpassen
@endsection
@section('main')
    <?php
        $olduser = \App\User::findOrFail(auth()->id());
    ?>
    <div>
        <h1>{{ auth()->user()->name }} aanpassen</h1>
    </div>
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
        <button name="submit" class="btn btn-success" type="submit">Update Gebruiker</button>
    </form>
    <?php
        if (isset($_GET["submit"])) {
            $user = \App\User::findOrFail(auth()->id());
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


            $user->save();

            $page = $_SERVER['PHP_SELF'];
            $sec = "0.2";
            header("Refresh: $sec; url=$page/home");
        }
    ?>
@endsection
