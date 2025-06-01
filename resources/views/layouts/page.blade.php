<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ecommerce">
    <title>@yield('title', 'eMart - eCommerce Website Template')</title>
    <meta name="description" content="@yield('description', 'eCommerce')">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/img.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/bootstrap-select.min.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="/assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="/assets/css/main.css" type="text/css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="/assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="/assets/extras/owl.theme.css" type="text/css">
    <!-- Range Slider -->
    <link rel="stylesheet" href="/assets/extras/ion.rangeSlider.css" type="text/css">
    <link rel="stylesheet" href="/assets/extras/ion.rangeSlider.skinFlat.css" type="text/css">
    <!-- Modals Effects -->
    <link rel="stylesheet" href="/assets/extras/component.css" type="text/css">
    <!-- Rev Slider Css -->
    <link rel="stylesheet" href="/assets/extras/settings.css" type="text/css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="/assets/extras/slick.css" type="text/css">
    <link rel="stylesheet" href="/assets/extras/slick-theme.css" type="text/css">
    <!-- Nivo Lightbox Css -->
    <link rel="stylesheet" href="/assets/extras/nivo-lightbox.css" type="text/css">
    <!-- Color switcher CSS -->
    <link rel="stylesheet" href="/assets/css/color-switcher.css" type="text/css">
    <!-- Slicknav Css -->
    <link rel="stylesheet" href="/assets/css/slicknav.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="/assets/css/responsive.css" type="text/css">

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>


</head>

<body>
<x-page.header></x-page.header>

@yield('content')

<x-page.footer></x-page.footer>

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="icon-arrow-up"></i>
</a>

<!-- All js here -->
<script type="text/javascript" src="/assets/js/jquery-min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/js/ion.rangeSlider.js"></script>
<script type="text/javascript" src="/assets/js/modalEffects.js"></script>
<script type="text/javascript" src="/assets/js/classie.js"></script>
<script type="text/javascript" src="/assets/js/nivo-lightbox.js"></script>
<script type="text/javascript" src="/assets/js/color-switcher.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.slicknav.js"></script>

<script type="text/javascript" src="/assets/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>

</body>
</html>
