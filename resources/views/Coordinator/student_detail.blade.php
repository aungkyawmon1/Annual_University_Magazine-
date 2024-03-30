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
@include('partials._header')
    <div class="container">

        <h3 class="mt-3">Magazine contribution for {{$currentAcademicYear->academic_year}} Academic Year</h3>
        <h5 class="mt-3 gray-600">{{$departmentName->name}} Department</h5>

        <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
            <img src="../../img/alert-circle.svg" alt="icon"/>
            <div>
              Closure date is <strong> {{$currentAcademicYear->closure_date}}</strong>
            </div>
        </div>
        <div class="my-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Faculty</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $magazine->user->first_name }} {{ $magazine->user->last_name }}</li>
                </ol>
              </nav>
        </div>

        <div class="row mt-4">
               <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="post-container">
                        <div class="img-container">
                            <img src="{{ asset('img/' . $magazine->image_url) }}" alt="Magazine Image">
                        </div>
                        <label class="mt-2 caption">
                            {{ $magazine->title }}
                        </label>
                        <div class="d-flex justify-content-between mt-2">
                                <span class="post-info">{{ $publishDate }}</span>

                            <span class="post-info"> {{ $comments->count() }} comments</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2 gap-3">
{{--                            <a href="{{ route('magazine.preview', ['magazine' => $magazine->id]) }}" class="btn btn-outline w-50">Preview</a>--}}
{{--                            <a href="#" class="btn btn-outline w-50">Preview</a>--}}
                            <a  href="{{ route('student.preview', ['magazine' => $magazine->magazine_id]) }}" target="_blank" class="btn btn-outline w-50">Preview</a>

                                <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                <img src="../../img/Comment.svg" /> Comment
                            </button>
                        </div>
                        <div class="mt-2">
                               <form action="{{ route('publishMagazine', ['id' => $magazine->magazine_id]) }}" method="POST">
        @csrf <!-- CSRF token for security -->
        <button type="submit" class="btn btn-primary w-100">Publish</button>
    </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="upload_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload contribution</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-4">
                                <input type="file" id="actual-btn" hidden/>
                                <label class="custom-file-upload file" for="actual-btn" >
                                    <img src="./img/CloudArrowUp.svg" style="width: 32px; height: 32px;" alt="upload" /> <br>
                                    Upload contribution (docx, pdf)
                                </label>
                            </div>
                            <div class="mb-4">
                                <input type="file" id="actual-btn" hidden/>
                                <label class="custom-file-upload" for="actual-btn" >
                                    <img src="./img/CloudArrowUp.svg" style="width: 32px; height: 32px; margin-bottom: .5rem;" alt="upload" /> <br>
                                    Upload photo
                                </label>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="article-caption" class="form-label">Caption</label> -->
                                <input type="email" class="form-control" id="article-caption" placeholder="Caption">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Upload</button>
                        </div>

                    </div>
                    </div>
                </div>

                <!-- Modal -->
                <!-- Modal -->
<div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="commentsModalLabel">Post a Comment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


                <form method="POST" action="{{ route('coordinator.comment.post', ['magazine' => $magazine->magazine_id]) }}">
                @csrf
                <div class="modal-body">
                    @foreach($comments as $comments)
                    <div class="co-message">
                        <small>{{ $comments->time_ago }} </small>
                        <div class="message-container">
                            <strong>{{$comments->username}}</strong>
                            <p>{{$comments->comment}}</p>
                        </div>

                    </div>
                    @endforeach
                </div>
                <div class="modal-body">
                    <textarea name="comment" class="form-control" rows="4" placeholder="Enter your comment here" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Post Comment</button>
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
