<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <!-- <iframe src="file:///C:/Users/Htet Lin Aung/Desktop/Ewsd test/img/Medical-record.pdf" style="width:100%; height:600px;" type="application/pdf" frameborder="0"></iframe> -->
    <!-- <embed src="https://www.orimi.com/pdf-test.pdf" type="application/pdf" width="100%" height="600px" /> -->
    
    
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <div class="">
                    <img class="img-fluid" src="{{ asset('storage/uploads/'.$magazine->img_url) }}" alt="Uni Img" />
                    <label class="mt-2 caption">
                        {{$magazine->title}}
                    </label>
                    <button type="button" class="btn btn-lg btn-primary mt-2 w-100">Publish </button>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div id="pspdfkit" style="height: 95vh;"></div>
            </div>
        </div>
    </div>







    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="{{ asset('dist/pspdfkit.js') }}"></script>
    <script>
        PSPDFKit.load({
            licenseKey: '5c-CTDxZCVH0Mdt5p0qv1AM1JAt3Z5g_R50JXxo-oipYbpN_6oLWZhqdeTwrnWK54vzPmhrL-WHKPxuaBatUBuacyOumrQOdc7aLnh0zkUGWQNns1Enshq8-hTLHNwSwBYjnckUTqQzqtYb8aWvXCFI7qRg5jTzlu3iPslqagkM7mNDsbzDsszKh_VAYxpJtkurPIyECcOVqxg',
            container: '#pspdfkit',
            document: "{{ asset('storage/uploads/'.$magazine->file_url) }}", // Add the path to your document here.
            // disableToolbar: true,
            toolbarItems: [
                             { type: "sidebar-thumbnails" },
                            // { type: "sidebar-outline" },
                             { type: "sidebar-annotations" },
                            { type: "spacer" },
                            { type: "zoom-out" },
                            { type: "zoom-in" },
                        ],
        
        })
            .then(function (instance) {
                console.log('PSPDFKit loaded', instance);
            })
            .catch(function (error) {
                console.error(error.message);
            });
    </script>
</body>
</html>