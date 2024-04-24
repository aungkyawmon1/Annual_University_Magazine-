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
    <link href="../css/customTheme.css" rel="stylesheet">
</head>

<body>
@include('partials._header')
    <div class="container">
        <h3 class="mt-3">Magazine contribution for 2023-2024 Academic Year</h3>

        <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
            <img src="../img/alert-circle.svg" alt="icon"/>
            <div>

                Closure date is <strong> {{ date('d F, Y', strtotime($currentAcademicYear->closure_date)) }}</strong>
            </div>
        </div>
        
        <div class="row mt-4">
            <h5 class="mb-3">Top selected faculties</h5>
            @foreach ($cards as $cont)
            <div class="col-12 col-md-3 mb-3">
                <div class="report-container {{$cont->color}}">
                    <strong class="mb-3">{{$cont->department_name}}</strong>
                    <span class="text-muted">Published</span>
                    <h4>{{$cont->published}}/{{$cont->total}}</h4>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <h5 class="mb-3">Selected contributions</h5>
            <div class="table-responsive">
                <table class="table my-table">
                    <thead class="table">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student name</th>
                        <th scope="col">Faculty</th>
                        <th scope="col">Published date</th>

                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($magazines as $cont)
                    <tr>
                        <th scope="row">{{$cont->id}}</th>
                        <td>{{$cont->username}}</td>
                        <td>{{$cont->department_name}}</td>
                        <td>{{$cont->created_at}}</td>

                      </tr>
                    @endforeach
                    </tbody>
                </table>
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
    </div>
    

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>