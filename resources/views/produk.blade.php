@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Kategori</h5>
                </div>
            </div>
            <div class="row">
                @php
                $i = 100;
                @endphp
                @foreach ($categories as $object)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{$i+=100}}">
                    <a href="/sort-produk/{{$object->category}}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("storage/category_images/".$object->images)}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">{{$object->category}}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Produk</h5>
                </div>
            </div>
            <div class="row">
                @php
                $i = 100;
                @endphp
                @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i += 100 }}">
                    @php
                    $images = [$product->image1, $product->image2, $product->image3, $product->image4];
                    @endphp
                    <a href="/detail_produk/{{ $product->id }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            @if ($images[0])
                            <div class="products-image" style="background-image: url('{{ asset('storage/product_images/' . $images[0]) }}');"></div>
                            @endif
                        </div>
                        <div class="products-text">{{ $product->product_name }}</div>
                        <div class="products-price">Rp {{ $product->price }}</div>
                    </a>
                </div>
            @endforeach            
            </div>            
            <div class="d-flex">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
