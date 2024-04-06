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
                        <a class="nav-link" href="#">Admin Reports</a>
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
            <div class="d-flex gap-3">
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == "2")
                    <div class="position-relative">
                        <button type="button" class="btn nav-btn btn-sm" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">
                            <img src="../../img/notification.svg" alt="notification">
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end noti-dropdown shadow-sm">
                            <h1 class="modal-title fs-5 mb-3" id="exampleModalLabel">Notifications</h1>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> uploaded a new contribution.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> uploaded a new contribution.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                            <div class="noti-content">
                                <img src="../../img/notification.svg" alt="icon"/>
                                <div class="noti-info">
                                    <span><strong>John Cooper</strong> registerd as guest.</span>
                                    <small>2 mins ago.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <button type="button" class="btn nav-btn btn-sm"><a class="nav-link" href="{{ route('logout') }}"><img
                            src="../../img/logout.svg" alt="logout"></a></button>
            </div>
        </div>
    </div>
    </div>
</nav>
