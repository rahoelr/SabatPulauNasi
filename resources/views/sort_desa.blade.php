@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <h1 class="title" data-aos="fade-up">Sorting Desa</h1>
            <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Desa Berdasarkan Kecamatan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </section>
            <section class="store-new-products">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Desa</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                    $i = 100;
                    $j = 100;
                    @endphp
                    @if (count($data) > 0)
                    @foreach ($data as $desa)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$j+=200}}">
                        @php
                        $image = explode('|', $desa->images);
                        @endphp
                        <a href="/detail_desa/{{$desa->id}}" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                            background-image: url('{{asset("storage/desa_images/".$image[0])}}');"></div>
                            </div>
                            <div class="products-title">Desa {{$desa->desa}}</div>
                            <div class="products-desc">{{$desa->description}}</div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <h3>Desa tidak ditemukan</h3>
                    @endif
            </section>
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
