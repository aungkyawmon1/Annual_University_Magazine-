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
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <!-- bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link href="{{ asset('css/customTheme.css') }}" rel="stylesheet">

</head>

<body>
@include('partials._header')
<div class="container">
    <h3 class="mt-3">Magazine contribution for 2023-2024 Academic Year</h3>

    <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
        <img src="{{ asset('img/alert-circle.svg') }}" alt="icon"/>
        <div>
            Closure date is <strong> 19 April, 2024</strong>
        </div>
    </div>

    <div class="row mt-4">
        <h5 class="mb-3">Published contributions</h5>




        @if (count($magazines) > 0)
            @foreach ($magazines as $magazine)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="post-container">
                        <div class="img-container">
                            <img src="{{ asset('img/'.$magazine->{'image_url'}) }}" alt="img">
                        </div>
                        <label class="mt-2 caption">
                            {{$magazine->title}}
                        </label>
                        <div class="d-flex flex-column mt-2">
                            <strong>{{$magazine->username}}</strong>
                            <div class="d-flex justify-content-between">
                                <span class="post-info">{{$magazine->department_name}}</span>
                                <span class="post-info">{{$magazine->created_at}}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-2 gap-3">
{{--                            <button onclick="window.location('student.preview-pdf')" type="button" class="btn btn-outline w-100">Preview</button>--}}
                            <button onclick="window.open('/preview/{{$magazine->magazine_id}}', '_blank')" type="button" class="btn btn-outline w-100">Preview</button>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            No Data
        @endif
    </div>
</div>


<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
