<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <!-- bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link href="../../css/customTheme.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="#">LOGO</a>
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
              <button type="button" class="btn nav-btn btn-sm"><img src="../../img/logout.svg" alt="logout"></button>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
        <form action="{{route('create-account')}}" method="post">
            @csrf
        <div class="row mt-4">
                <div class="col-4 mb-4">
                    <div class="mt-5">
                        <label for="article-caption" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="article-caption" placeholder="Username or ID">
                    </div>
                    <div class="mt-3">
                        <label for="article-caption" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="article-caption" placeholder="Password">
                    </div>
                    <div class="mt-3">
                        <label for="select" class="form-label">Choose faculty</label>
                        <select name ="department_id" class="form-select" aria-label="Select">
                            <option class="text-muted"  selected>Choose faculty</option>
                            <option value="1">ICT</option>
                            <option value="2">EcE</option>
                            <option value="3">PrE</option>
                            <option value="3">AME</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="select" class="form-label">Role</label>
                        <select name="role_id" class="form-select" aria-label="Select">
                            <option class="text-muted"  selected>Choose Role</option>
                            <option value="2">Manager</option>
                            <option value="3">Coordinator</option>
                            <option value="4">Student</option>

                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="article-caption" class="form-label">Email</label>
                        <input name = "email" type="email" class="form-control" id="article-caption" placeholder="Email">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mt-5">
                        <label for="article-caption" class="form-label">Phone</label>
                        <input name = "contact_number" type="number" class="form-control" id="article-caption" placeholder="Phone">
                    </div>
                    <div class="mt-3">
                        <label for="article-caption" class="form-label">Address</label>
                        <input name="address" type="text" class="form-control" id="article-caption" placeholder="Address">
                    </div>
                    <div class="mt-3">
                        <label for="select" class="form-label">Gender</label>
                        <select name="gender" class="form-select" aria-label="Select">
                            <option class="text-muted"  selected>Choose gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="article-caption" class="form-label">Date of birth</label>
                        <input  name = "date_of_birth" type="datetime-local" class="form-control" id="article-caption" placeholder="DoB">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Create</button>
                    </div>
                </div>
        </div>
        </form>

    </div>


    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
