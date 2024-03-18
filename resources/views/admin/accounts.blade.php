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
            </ul>
            <div class="d-flex gap-3">
              <button type="button" class="btn nav-btn btn-sm"><img src="../../img/notification.svg" alt="notification"></button>
              <button type="button" class="btn nav-btn btn-sm"><img src="../../img/logout.svg" alt="logout"></button>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
        <div class="mt-3">
            <button  onclick="window.location='/accounts/create-account'" type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#comments">
                <img src="../../img/Plus-icon.svg" class="me-3" />Create new account
            </button>
        </div>
        <div class="row mt-4 d-flex flex-row justify-content-between">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link activeWhite" aria-current="page" href="#">All</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Manager</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Coordinator</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" aria-disabled="true">Student</a>
                    </li>
                  </ul>
                  <div class="d-flex gap-3">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="search" placeholder="Search name, email, phone">
                      </div>
                  </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="table-responsive">
                <table class="table my-table">
                    <thead class="table">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Account name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Faculty</th>
                        <th scope="col">Created date</th>
                        <th scope="col"> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jane Cooper</td>
                        <td>Manager</td>
                        <td>Information Science</td>
                        <td>12 Dec 2023</td>
                        <td class="text-end"><img src="../../img/arrow-right.svg" alt="arrow-right"/></td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jane Cooper</td>
                        <td>Manager</td>
                        <td>Information Science</td>
                        <td>12 Dec 2023</td>
                        <td class="text-end"><img src="../../img/arrow-right.svg" alt="arrow-right"/></td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jane Cooper</td>
                        <td>Manager</td>
                        <td>Information Science</td>
                        <td>12 Dec 2023</td>
                        <td class="text-end"><img src="../../img/arrow-right.svg" alt="arrow-right"/></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-5">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item "><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
          </div>
    </div>


    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
