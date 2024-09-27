<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="http://127.0.0.1:8000/assets/img/favicon.png" rel="icon">
    <link href="http://127.0.0.1:8000/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="http://127.0.0.1:8000/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tobiasroeder/imagebox@1.3.1/dist/imagebox.min.css">


    <link href="http://127.0.0.1:8000/style.css" rel="stylesheet">


</head>

<body class="index-page">


    @include('frontend.header')

    <div class="content">
        @yield('content') <!-- This is where the page-specific content will be inserted -->
    </div>

    @include('frontend.footer')


    <!-- Vendor JS Files -->
    <script src="http://127.0.0.1:8000/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/php-email-form/validate.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/aos/aos.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/tobiasroeder/imagebox@1.3.1/dist/imagebox.min.js"></script>
    <script>
        imagebox.options({
            info: false,
            swipeToChange: true,
            swipeToClose: true,
            closeEverywhere: true,
            keyControls: true,
            htmlCaption: true,
        });
    </script>

    <!-- Main JS File -->
    <script src="http://127.0.0.1:8000/main.js"></script>


</body>

</html>
