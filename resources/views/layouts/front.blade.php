<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yara Portfolio</title>
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <!--  font awesome icons  -->
{{--    <link rel="stylesheet" href="{{ asset('assets/front/css/all.min.css') }}">--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/Magnific-Popup/dist/magnific-popup.css') }}">
    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <!--  custom css file  -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <!--  Responsive css file  -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
</head>
@livewireStyles

<body>
<x-general.front.header/>
@yield('content')
<x-general.front.footer/>
@livewireScripts
<script>
    window.addEventListener('notify', function (data) {
        Toastify({
            text           : data.detail.message,
            duration       : 3000,
            close          : true,
            gravity        : 'top',
            position       : 'right',
            backgroundColor: data.detail.color,
        }).showToast();
    })
</script>

<!--  Jquery js file  -->
<script src="{{asset('assets/front/js/jquery.3.4.1.js')}}"></script>
<!--  Bootstrap js file  -->
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
<!--  isotope js library  -->
<script src="{{asset('assets/front/vendor/isotope/isotope.min.js')}}"></script>
<!--  Magnific popup script file  -->
<script src="{{asset('assets/front/vendor/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>
<!--  Owl-carousel js file  -->
<script src="{{asset('assets/front/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
<!--  custom js file  -->
<script src="{{asset('assets/front/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        (function ($) {
            $('.owl-carousel').owlCarousel();
        })(jQuery);
    });
</script>
</body>


</html>
