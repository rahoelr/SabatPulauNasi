@extends('layouts.admin')

@section('mitra')
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
        <div class="container-fluid">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="{{asset("storage/user_images/".Auth::user()->images)}}" alt=""
                                class="rounded-circle mr-2 profile-picture" />
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="/home" class="dropdown-item">Back To Home</a>
                            <a href="/users/{{Auth::user()->id}}/edit" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route("logout")}}" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="{{asset("storage/user_images/".Auth::user()->images)}}" alt=""
                                class="rounded-circle mr-2 profile-picture" />
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="/home" class="dropdown-item">Back To Home</a>
                            <a href="/users/{{Auth::user()->id}}/edit" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route("logout")}}" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recently Added</h5>
                        @if (count($products) >= 3)
                        @php
                        $j = 0;
                        @endphp
                        @while ($j <= 2) <a class="card card-list d-block"
                            href="/db_admin-product-detail/{{$products[$j]->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        @php
                                        $image = explode('|', $products[$j]->image1);
                                        @endphp
                                        <img src="{{asset("storage/product_images/".$image[0])}}" alt=""  />
                                    </div>
                                    <div class="col-md-4">{{$products[$j]->product_name}}</div>
                                    <div class="col-md-3">{{$products[$j]->price}}</div>
                                    <div class="col-md-3">{{$products[$j]->created_at}}</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="{{asset('img/dashboard-arrow-right.svg')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            </a>
                            @php
                            $j++;
                            @endphp
                            @endwhile
                            @else
                            @foreach ($products as $product)
                            <a class="card card-list d-block" href="/db_admin-product-detail/{{$product->id}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            @php
                                            $image = explode('|', $product->image1);
                                            @endphp
                                            <img src="{{asset("storage/product_images/".$image[0])}}" alt="" style="object-fit: cover; border-radius: 4px"/>
                                        </div>
                                        <div class="col-md-4">{{$product->product_name}}</div>
                                        <div class="col-md-3">{{$product->price}}</div>
                                        <div class="col-md-3">{{$product->created_at}}</div>
                                        <div class="col-md-1 d-none d-md-block">
                                            <img src="{{asset('img/dashboard-arrow-right.svg')}}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
