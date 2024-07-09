@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <h1 class="title" data-aos="fade-up">Sorting Produk</h1>
            <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Kategori Produk</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </section>
            <section class="store-new-products">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Kategori {{$kategori}}</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                    $i = 100;
                    $j = 100;
                    @endphp
                    @if (count($data) > 0)
                    @foreach ($data as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$j+=200}}">
                        @php
                        $image = explode('|', $product->image1);
                        @endphp
                        <a href="/detail_produk/{{$product->id}}" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                            background-image: url('{{asset("storage/product_images/".$image[0])}}');"></div>
                            </div>
                            <div class="products-title">{{$product->product_name}}</div>
                            <div class="products-desc">{{$product->price}}</div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <h3>Produk tidak ditemukan</h3>
                    @endif
            </section>
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
