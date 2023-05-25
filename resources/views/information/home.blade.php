@extends('information.layouts.layout')
@section('content')
    <!-- product  -->
    <section id="product">
        <div class="product-info">
            <h2 class="product-title">
                our Popular Residence
            </h2>

            {{-- <a href="" class="product-btn">
                Explore All
                <img src="{{asset('images/arrow.svg')}}" alt="">
            </a> --}}
        </div>
        <div class="container listhome">

        </div>
    </section>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $.ajax({
            url: "/listHome",
            type: "GET",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
            },
            success: function(response) {
                let html = '';
                for (var i = 0; i < response.length; i++) {
                    console.log(response[i]);
                    html += '<div class="product-card">\
                                    <img src="{{asset('images/house1.png')}}" alt="" class="product-img">\
                                    <div class="card-info">\
                                        <div class="card-info-content">\
                                            <img src="{{asset('images/location.svg')}}" alt="">\
                                            <p class="loaction-name">'+response[i].address+'</p>\
                                        </div>\
                                        <div class="card-info-content">\
                                            '+response[i].name+'\
                                        </div>\
                                        <div class="price">\
                                            <p>$'+response[i].rent_cost+'</p>\
                                            <a href="" class="booking-btn">Book Now</a>\
                                        </div>\
                                    </div>\
                                </div>';
                }
                $('.listhome').html(html);

            },
            error: function(xhr, status, errorThrown) {
                console.log("An error occurred: " + errorThrown);
            }
        });
    });
</script>
@endsection