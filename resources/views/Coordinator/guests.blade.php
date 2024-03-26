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
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" crossorigin >
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
            Closure date is <strong> 19 April, 2024</strong>
        </div>
    </div>

    <div class="row mt-4">
        <h5 class="mb-3">Guest account list</h5>
        <div class="d-flex justify-content-end flex-end"><span>23 guests.</span></div>
        <div class="table-responsive">
            <table class="table table-striped"  id="example" style="width:100%">

                <thead class="table">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Registered date</th>
                    <th scope="col">Last active at</th>
                </tr>
                </thead>
                <tbody>
                @if (count($guests) > 0)
                    @foreach ($guests as $guest)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$guest->username}}</td>
                            <td>{{$guest->created_at}}</td>
                            <td>{{$guest->updated_at}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th>No Data</th>
                    </tr>
                @endif
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
