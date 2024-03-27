<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $magazine->title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/customTheme.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand mr-5" href="#"><img src="{{ asset('img/logo.jpg') }}" style="width: 64px; height: 64px;" /></a>
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
                  <img src="{{ asset('img/notification.svg') }}" alt="notification">
                  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                  </span>
                </button>
               
              </div>
              <button type="button" class="btn nav-btn btn-sm"><img src="{{ asset('img/logout.svg') }}" alt="logout"></button>
            </div>
          </div>
        </div>
      </nav>
    

    <div class="container mt-5">
        <h1 class="display-4">{{ $magazine->title }}</h1>
        <p class="text-muted">{{ $magazine->user->first_name }} {{ $magazine->user->last_name }} | {{ $publishDate }}</p>
        <img src="{{ asset('storage/' . $magazine->image_url) }}" class="img-fluid" alt="Magazine Image">

        <div class="my-4">
            <p>{{ $magazine->description }}</p>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <span class="badge bg-secondary">{{ $magazine->department->name }}</span>
            <span>{{ $magazine->academic_year->name }}</span>
            <span>{{ $magazine->view_count }} Views</span>
        </div>

       
        <div class="comments-section mt-4">
            <h5>Comments (Placeholder for future implementation)</h5>
            {{-- Placeholder for comments --}}
        </div>
    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
