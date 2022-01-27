<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">zonnepanelen</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register"><i class="fas fa-signature"></i> Register</a>
                </li>
            @endguest

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown">
                        {{ auth()->user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="dashboard"><i class="fas fa-user-cog"></i>Mijn dashboard</a>
                        <a class="dropdown-item" href="weer"><i class="fas fa-user-cog"></i>Weersverwachtingen</a>
                        <div class="dropdown-divider"></div>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button>
                        </form>

                    </div>
                </li>
        @endauth
    </div>
</nav>
