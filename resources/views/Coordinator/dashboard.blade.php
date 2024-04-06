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
    <!-- data table css -->
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

@include('partials._header')
<div class="container">
    <h3 class="mt-3">Magazine contribution for {{$currentAcademicYear->academic_year}} Academic Year</h3>

    <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
        <img src="../../img/alert-circle.svg" alt="icon"/>
        <div>

            Closure date is <strong> {{$closureDate}}</strong>
        </div>
    </div>
    {{--    @foreach ($cards as $cont)--}}
    <div class="col-12 col-md-3 mb-3">
        <div class="report-container report-color-4">
            <strong class="mb-3">{{$departmentName->name}} Department</strong>

            <?php
            $magaz = json_decode($magazines, true);

            $publishCount = 0;
            $unpublishCount = 0;

            foreach ($magaz as $magazine) {
                if ($magazine['is_published'] == 1) {
                    $publishCount++;
                } else {
                    $unpublishCount++;
                }
            }

            ?>
            <span class="text-muted">Published</span>
            <h4>{{$publishCount}}/{{$unpublishCount}}</h4>
        </div>
    </div>
    {{--    @endforeach--}}
    <div class="row mt-4 d-flex flex-row justify-content-between">
        <div class="d-flex flex-row align-items-center justify-content-between">


{{--            <ul class="nav nav-pills">--}}
{{--                <li class="nav-item">--}}
{{--                    --}}{{--                    <a class="nav-link {{ $filter == 'all' ? 'active' : '' }}" href="{{ route('coordinator.showContributions', ['filter' => 'all']) }}">All</a>--}}
{{--                    <a class="nav-link {{ $filter == 'all' ? 'active' : '' }}" href="#">All</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    --}}{{--                    <a class="nav-link {{ $filter == 'published' ? 'active' : '' }}" href="{{ route('coordinator.showContributions', ['filter' => 'published']) }}">Published</a>--}}
{{--                    <a class="nav-link {{ $filter == 'published' ? 'active' : '' }}" href="#">Published</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    --}}{{--                    <a class="nav-link {{ $filter == 'unpublished' ? 'active' : '' }}" href="{{ route('coordinator.showContributions', ['filter' => 'unpublished']) }}">Unpublished</a>--}}
{{--                    <a class="nav-link {{ $filter == 'unpublished' ? 'active' : '' }}" href="#">Unpublished</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--the all published unpublished filter function is removed by zawwaisoe because of lack of time--}}

            <div class="d-flex gap-3">
                <span>{{ $studentCount }} Students</span>
                <span>{{ $contributionCount }} Contributions</span>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="table-responsive">

            <table id="table" class="table table-striped" style="width:100%">
                <thead class="table">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student name</th>
                    <th scope="col">Last uploaded</th>
                    <th scope="col">Status</th>
{{--                    <th scope="col">Comments</th>--}}
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
{{--                        <td>{{ $magazine->comment_count }} views</td>--}}
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


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#table');
</script>


<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
