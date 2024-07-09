@extends('layouts.base')

@section('content')
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                        <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Product Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start section gallery -->
        <section class="container product">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 mr-3">
                    @php
                        $images = [$products->image1, $products->image2, $products->image3, $products->image4];
                    @endphp

                    <img class="img-fluid pb-1 products-details" id="MainImg"
                        src="{{ asset('storage/product_images/' . $images[0]) }}" alt="" data-aos="zoom-in"
                        data-aos-delay="200" style="width: 100%; height: 350px; object-fit: cover;">
                    <div class="small-img-group">


                        <div class="small-img-group mt-2">
                            <div class="small-img-col thumb">
                                @foreach ($images as $item)
                                    <img src="{{ asset('storage/product_images/' . $item) }}" class="small-img w-25 pb-1 mr-2"
                                        alt="" data-aos="zoom-in" data-aos-delay="200" style="width: 90%; height: 110px; object-fit: cover;">
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-12" data-aos="fade-up">
                    <h3 class="pt-2">{{ $products->product_name }}</h3>
                    <h5 class="product-price">Rp. {{ $products->price }}</h5>
                    <div class="product_meta">
                        <span class="posted_in"> <strong>Category: </strong>{{ $products->category }}</span>
                        <span class="posted_in"> <strong>Mitra: </strong>{{ $products->mitra }}</span>
                    </div>
                    <h4 class="my-2" data-aos="fade-up">Product Details</h4>
                    @php
                        $paragraph = explode('<br />', $products->description);
                    @endphp
                    @foreach ($paragraph as $item)
                        <p class="product-desc mb-0" data-aos="fade-up" data-aos-delay="100">{{ $item }}</p>
                    @endforeach
                    <div class="col-lg-6 p-0 mt-2" data-aos="zoom-in">
                        <a href="https://wa.me/{{ $products->p_number }}?text={{ $message }}" target="_blank"
                            class="btn btn-success px4 text-white btn-block mb-3">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Start script Vue js gallery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.thumb img').click(function(e) {
                e.preventDefault();
                $('#MainImg').attr("src", $(this).attr("src"));
            })
        })
    </script>
    <script src="{{ asset('template_1/script/navbar-scroll.js') }}"></script>
    <!-- End script Vue js gallery -->
@endsection
