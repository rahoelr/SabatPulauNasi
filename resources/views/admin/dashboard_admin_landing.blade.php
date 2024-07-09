@extends('layouts.admin')

@section('content')
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
                <h2 class="dashboard-title">Landing Page</h2>
                <p class="dashboard-subtitle">
                    Kelola konten pada halaman landing page
                </p>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
            </div>
            <div class="dashboard-content">
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Carousel</h5>
                        @if($landings)
                            @foreach (explode('|', $landings->carousel) as $index => $item)
                                <div class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="{{asset("storage/landingPage_images/".$item)}}" alt="" />
                                            </div>
                                            <div class="col-md-10">Carousel {{$index + 1}}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="{{asset('img/dashboard-arrow-right.svg')}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <form action="{{ route('store.carousel') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="carousel_images">Upload Carousel Images:</label>
                                    <input type="file" class="form-control" id="carousel_images" name="carousel_images[]" multiple required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @endif
                    </div>

                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Testimoni</h5>
                        @if($landings)
                            @foreach (explode('|', $landings->testimoni) as $index => $item)
                                <div class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="{{asset("storage/landingPage_images/".$item)}}" alt="" />
                                            </div>
                                            <div class="col-md-10">Testimoni {{$index + 1}}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="{{asset('img/dashboard-arrow-right.svg')}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <form action="{{ route('store.testimoni') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="testimoni_images">Upload Testimoni Images:</label>
                                    <input type="file" class="form-control" id="testimoni_images" name="testimoni_images[]" multiple required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    @if($landings)
                        <a href="/admin-landing/{{$landings->id}}/edit" class="btn btn-primary mb-3 btn-edit text-light">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
