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
@include('partials._header')
<div class="container">
    <h3 class="mt-3">Magazine contribution for 2023-2024 Academic Year</h3>
    <h5 class="mt-3 gray-600">Information Science Department</h5>

    <div class="alert alert-danger d-flex align-items-center gap-3 mt-4" role="alert">
        <img src="./img/alert-circle.svg" alt="icon"/>
        <div>
            Closure date is <strong> 19 April, 2024</strong>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-md-4 col-lg-3 mb-4">
            <div class="file_upload_btn" data-bs-toggle="modal" data-bs-target="#upload_file">
                <img src="./img/CloudArrowUp.svg" alt="upload-icon" />
                Upload contribution
            </div>
        </div>
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
                        <div class="d-flex justify-content-between mt-2">
                            <span class="post-info">{{$magazine->created_at}}</span>
                            <span class="post-info">{{$magazine->comment_count}} comments</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2 gap-3">
                            <!-- <button type="button" class="btn btn-outline w-50">Preview </button> -->
                            <a class="btn btn-outline w-50" href="preview-pdf.html" target="_blank">Preview</a>
                            <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#comments">
                                <img src="img/Comment.svg" /> Comment
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            No Data
        @endif
        <!-- Article upload Modal -->
        <div class="modal fade" id="upload_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload contribution</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-4">
                                <input name="doc_file" type="file" id="actual-btn" hidden/>
                                <label class="custom-file-upload file" for="actual-btn" >
                                    <img src="./img/CloudArrowUp.svg" style="width: 32px; height: 32px;" alt="upload" /> <br>
                                    Upload contribution (docx, pdf)
                                </label>
                            </div>
                            <div class="mb-4">
                                <input name="img_file" type="file" id="actual-btn" hidden/>
                                <label class="custom-file-upload file" for="actual-btn" >
                                    <img src="./img/CloudArrowUp.svg" style="width: 32px; height: 32px; margin-bottom: .5rem;" alt="upload" /> <br>
                                    Upload photo
                                </label>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="article-caption" class="form-label">Caption</label> -->
                                <input type="text" name="title" class="form-control" id="article-caption" placeholder="Caption">
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" required>
                                <label class="form-check-label" for="inlineCheckbox1">Agree <span class="blue-600">terms & conditions</span></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

         <!-- Comments Modal -->
         <div class="modal fade" id="comments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Comments</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="co-message">
                                <div class="message-container">
                                    <strong>John Cooper</strong>
                                    <p>This is comment message.</p>
                                </div>
                                <small>2 mins ago</small>
                            </div>
                            <div class="stu-message">
                                <div class="message-container">
                                    <strong>John Cooper</strong>
                                    <p>This is comment message.</p>
                                </div>
                                <small>2 mins ago</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex w-100 gap-3">
                                <input type="text" class="form-control" placeholder="Your comment">
                                <button type="button" class="btn btn-primary"><img src="./img/sendBtn.svg" alt="send-icon" /></button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
    </div>
</div>


<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
