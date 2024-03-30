<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="icon" type="image/x-icon" href="../../img/logo.jpg">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <!-- bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link href="./css/customTheme.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-7 d-none d-md-block">
                <div class="image_container">
                    <img src="{{ asset('img/UniversityImage.png') }}" alt="img"/>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-container p-5">
                    <h1>Welcome!</h1>
                    <p class="text-muted">Login to your account.</p>
                    <form method ="post" action="{{ route('login') }}"  id ="form-id">
                        @csrf
                        <div class="mt-5">
                            <label for="article-caption" class="form-label">Username</label>
                            <input type="text"  name = "username" class="form-control" id="article-caption" placeholder="Username or ID">
                        </div>
                        <div class="mt-3">
                            <label for="article-caption" class="form-label">Password</label>
                            <input type="password"  name = "password" class="form-control" id="article-caption" placeholder="Password">
                        </div>
                        @if ($errors->has('error'))
                                <span class="text-danger">{{ $errors->first('error') }}</span>
                                @endif
                        <div class="mt-3">
                            <button type="submit"  name = "login_submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
