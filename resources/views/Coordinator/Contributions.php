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
    <link href="./css/customTheme.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand me-5" href="#">LOGO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item me-3">
                <a class="nav-link active" aria-current="page" href="./index.html">Contributions</a>
              </li>
              <li class="nav-item me-3">
              </li>
              <li class="nav-item me-3">
                <a class="nav-link" href="#">Guests</a>
              </li>
            </ul>
            <div class="d-flex gap-3">
              <button type="button" class="btn nav-btn btn-sm"><img src="./img/notification.svg" alt="notification"></button>
              <button type="button" class="btn nav-btn btn-sm"><img src="./img/logout.svg" alt="logout"></button>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
        <h3 class="mt-3">Magazine contribution for 2023-2024 Academic Year</h3>
        <h5 class="mt-3 gray-600">Information Science Department</h5>

        <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
            <img src="./img/alert-circle.svg" alt="icon"/>
            <div>
              Closure date is <strong> 19 April, 2024</strong>
            </div>
        </div>

        <div class="row mt-4 d-flex flex-row justify-content-between">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link activeWhite" aria-current="page" href="#">All</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Published</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Unpublished</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" aria-disabled="true">Not view</a>
                    </li>
                  </ul>
                  <div>23 students participated.</div>
            </div>
            
        </div>

        <div class="mt-4">
            <div class="table-responsive">
                <table class="table my-table">
                    <thead class="table">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student name</th>
                        <th scope="col">Last uploaded</th>
                        <th scope="col">Status</th>
                        <th scope="col">Views</th>
                        <th scope="col"> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jane Cooper</td>
                        <td>22 Oct 2023</td>
                        <td>Published</td>
                        <td>34 views</td>
                        <td class="text-end"><img src="./img/arrow-right.svg" alt="arrow-right"/></td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jane Cooper</td>
                        <td>22 Oct 2023</td>
                        <td>Unpublished</td>
                        <td>34 views</td>
                        <td class="text-end"><img src="./img/arrow-right.svg" alt="arrow-right"/></td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jane Cooper</td>
                        <td>22 Oct 2023</td>
                        <td>Published</td>
                        <td>34 views</td>
                        <td class="text-end"><img src="./img/arrow-right.svg" alt="arrow-right"/></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>