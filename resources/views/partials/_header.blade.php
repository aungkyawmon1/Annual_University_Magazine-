<?php
// Get the current URL
$currentUrl = $_SERVER['REQUEST_URI'];
//remove / in current url
$currentUrl = str_replace('/', '', $currentUrl);
// Define an array with links and their corresponding display text
$links = [
    '/admin-reports' => 'Admin Reports',
    '/guests' => 'Guests',
    '/accounts' => 'Accounts',
    // Add more links as needed
];

?>
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
                        <a class="nav-link <?php echo ($currentUrl == 'magazines') ? 'active' : ''; ?>"
                           href="magazines">Contributions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'admin-report') ? 'active' : ''; ?>"
                           href="admin-report">Admin Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'accounts' || $currentUrl == 'create-account') ? 'active' : ''; ?>"
                           href="accounts">Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'guests') ? 'active' : ''; ?>" href="guests">Guest
                            Accounts</a>
                    </li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "2")
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'manager-magazines') ? 'active' : ''; ?>"
                           href="manager-magazines">Contributions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'guests') ? 'active' : ''; ?>" href="guests">Guests</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link <?php echo ($currentUrl == 'accounts') ? 'active' : ''; ?>" href="accounts">Accounts</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'manager-report') ? 'active' : ''; ?>"
                           href="manager-report">Reports</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "3")
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'coordinator-guests') ? 'active' : ''; ?>"
                           href="{{ url('/coordinator-guests') }}">Guests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'dashboard' || preg_match('/^coordinatorstudent-detail\d+$/', $currentUrl)) ? 'active' : ''; ?>"
                           href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "4")
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentUrl == 'magazine-preview') ? 'active' : ''; ?>"
                           href="{{ url('/magazine-preview') }}">Contributions</a>
                    </li>

                @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == "5")
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentUrl == 'guest-dashboard') ? 'active' : ''; ?>"
                               href="{{ url('/guest-dashboard') }}">Contributions</a>
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
