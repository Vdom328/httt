@section('css')

@endsection
<!-- navbar  -->
<nav class="navbar">
    <div class="container">
        <div class="logo">
            T.Home
        </div>

        <ul class="nav-list ">
            {{-- <li><a href="#property" class="list-item">Property</a></li>
            <li><a href="#service" class="list-item">Service</a></li> --}}
            <li><a href="#product" class="list-item">Product</a></li>
            <li><a href="#aboutus  " class="list-item">About us</a></li>
            <li><a href=" #contact" class="list-item contact ">Contact us</a></li>
        </ul>

        <div class="mobile-menu" onclick="showMenu()">
            <div class="line line1 "></div>
            <div class="line line2 "></div>
            <div class="line line3 "></div>
        </div>
    </div>
</nav>
<!-- navbar  -->

<!-- header  -->
<section class="header">
    <div class="container">
        <div class="header-info">
            <h1 class="header-headline">your perfect home waiting for you </h1>
            <p class="header-subtitle">
                we help you get your dream house with us.
                We are professional house consultant
            </p>

            <a href="" class="cta">Explore Now</a>
        </div>
    </div>
</section>
