<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand mr-5" href="#"><img src="{{ asset('img/logo.png') }}"
                                                   style="width: 64px; height: 64px;"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                    <li class="nav-item">
                        <a class="nav-link" href="magazines">Contributions</a>
                    </li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                    <li class="nav-item">
                        <a class="nav-link" href="admin-report">Admin Reports</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "2")
                    <li class="nav-item">
                        <a class="nav-link" href="guests">Guests</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "3")
                    <li class="nav-item">
                        <a class="nav-link" href="coordinator-guests">Guests</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "3")
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">Dashboard</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                    <li class="nav-item">
                        <a class="nav-link" href="accounts">Accounts</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "2")
                    <li class="nav-item">
                        <a class="nav-link" href="accounts">Accounts</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "2")
                    <li class="nav-item">
                        <a class="nav-link" href="manager-report">Reports</a>
                    </li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                    <li class="nav-item">
                        <a class="nav-link" href="guests">Guest Accounts</a>
                    </li>
                @endif


            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link">
                       {{\Illuminate\Support\Facades\Auth::user()->first_name}} :
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                            Admin
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == "2")
                            Manager
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == "3")
                            Coordinator
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == "4")
                            Student
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == "5")
                            Guests
                        @endif
                    </span>
                </li>
            </ul>
            <div class="d-flex gap-3">
                <button type="button" class="btn nav-btn btn-sm"><a class="nav-link" href="{{ route('logout') }}"><img
                                src="../../img/logout.svg" alt="logout"></a></button>
            </div>
        </div>
    </div>
    </div>
</nav>
