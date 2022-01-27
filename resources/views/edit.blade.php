@extends('layouts.layout')
@section('title')
    {{ auth()->user()->name }} aanpassen
@endsection
@section('main')
    <h1>{{ auth()->user()->name }} aanpassen</h1>
    <form action="" method="get">
        @csrf
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name"
                   class="form-control"
                   placeholder="Naam"
                   value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control"
                   placeholder="Email"
                   value="{{ old('email') }}">
        </div>
        <button name="submit" class="btn btn-success" type="submit">Update Gebruiker</button>
    </form>
    <?php
        if (isset($_GET["submit"])) {
            $user = \App\User::findOrFail(auth()->id());
            $user->name = $_GET['name'];
            $user->email = $_GET['email'];
            $user->save();

            $page = $_SERVER['PHP_SELF'];
            $sec = "0.2";
            header("Refresh: $sec; url=$page/home");
        }
    ?>
@endsection
