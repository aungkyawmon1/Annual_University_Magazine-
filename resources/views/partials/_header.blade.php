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
                    <a class="nav-link" href="#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Guests</a>
                </li>
            </ul>
            <div class="d-flex gap-3">
                <div class="position-relative">
                    <button type="button" class="btn nav-btn btn-sm" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="../../img/notification.svg" alt="notification">
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end noti-dropdown shadow-sm">
                        <h1 class="modal-title fs-5 mb-3" id="exampleModalLabel">Notifications</h1>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> uploaded a new contribution.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> uploaded a new contribution.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                        <div class="noti-content">
                            <img src="../../img/notification.svg" alt="icon" />
                            <div class="noti-info">
                                <span><strong>John Cooper</strong> registerd as guest.</span>
                                <small>2 mins ago.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn nav-btn btn-sm"><img src="../../img/logout.svg" alt="logout"></button>
            </div>
        </div>
    </div>
    </div>
</nav>
