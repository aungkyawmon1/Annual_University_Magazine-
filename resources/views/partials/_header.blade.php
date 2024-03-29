<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand mr-5" href="#"><img src="{{ asset('img/logo.png') }}" style="width: 64px; height: 64px;" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contributions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./reports.html">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./accounts.html">Accounts</a>
                </li>
            </ul>
            <div class="d-flex gap-3">
                <button type="button" class="btn nav-btn btn-sm"><img src="../../img/notification.svg" alt="notification"></button>
                <button type="button" class="btn nav-btn btn-sm"><a class="nav-link" href="{{ route('logout') }}"><img src="../../img/logout.svg" alt="logout"></a></button>
            </div>
        </div>
    </div>
</nav>
