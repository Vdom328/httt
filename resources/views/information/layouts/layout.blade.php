<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Rent Services</title>
    <!-- custom css link  -->
    <link rel="stylesheet" href="{{asset('css/information.css')}}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- custom css link  -->

    <style>
        .header {
            background-image: url(../../images/banner1.png);
    
        }
    </style>
    @yield('css')
</head>

<body>
    @include('information.layouts.patials.header')
    <!-- product  -->
    @include('information.layouts.patials.search')

    @yield('content')

    <!-- gsap link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" integrity="sha512-VEBjfxWUOyzl0bAwh4gdLEaQyDYPvLrZql3pw1ifgb6fhEvZl9iDDehwHZ+dsMzA0Jfww8Xt7COSZuJ/slxc4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- gsap link  -->

    <script src="{{asset('js/information.js')}}"></script>
    @yield('js')
</body>

</html>