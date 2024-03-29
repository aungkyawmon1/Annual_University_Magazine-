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
    <link href="../../css/customTheme.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <h3 class="mt-3">Magazine contribution for 2023-2024 Academic Year</h3>
        <h5 class="mt-3 gray-600">Information Science Department</h5>

        <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
            <img src="../../img/alert-circle.svg" alt="icon"/>
            <div>
              Closure date is <strong> 19 April, 2024</strong>
            </div>
        </div>

        <div class="row mt-4 d-flex flex-row justify-content-between">
            <div class="d-flex flex-row align-items-center justify-content-between">

              <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ $filter == 'all' ? 'active' : '' }}" href="{{ route('coordinator.showContributions', ['filter' => 'all']) }}">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $filter == 'published' ? 'active' : '' }}" href="{{ route('coordinator.showContributions', ['filter' => 'published']) }}">Published</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $filter == 'unpublished' ? 'active' : '' }}" href="{{ route('coordinator.showContributions', ['filter' => 'unpublished']) }}">Unpublished</a>
                </li>
            </ul>
            

                  <div class="d-flex gap-3">
                    <span>{{ $studentCount }} Students</span>
                    <span>{{ $contributionCount }} Contributions</span>
                  </div>
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
                      @foreach($magazines as $index => $magazine)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $magazine->user->first_name }} {{ $magazine->user->last_name }}</td>
                            <td>{{ $magazine->updated_at->format('d M Y') }}</td>
                            <td>{{ $magazine->is_published ? 'Published' : 'Unpublished' }}</td>
                            <td>{{ $magazine->View }} views</td>
                            <td class="text-end">
                              <a href="{{ route('coordinator.student.detail', ['magazineId' => $magazine->magazine_id]) }}">
                                <img src="{{ asset('img/arrow-right.svg') }}" alt="arrow-right">
                            </a>
                            
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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



    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
