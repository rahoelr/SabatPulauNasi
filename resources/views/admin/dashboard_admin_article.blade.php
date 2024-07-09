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

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Artikel</h2>
                <p class="dashboard-subtitle">Kelola Semua Artikel</p>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="admin-articles/create" class="btn btn-success btn-dashboard">Tambah Artikel</a>
                    </div>
                </div>
                <div class="row mt-4">
                    @if(count($articles)>0)
                    @foreach ($articles as $article)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="card card-dashboard-product d-block" href="/db_admin-article-detail/{{$article->id}}">
                            <div class="card-body">
                                <div style="position: relative; width: 100%; height: 200px; overflow: hidden; border-radius:10px">
                                    <img src="{{asset("storage/article_images/".$article->images)}}" alt="" class="w-100" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); object-fit: cover; object-position: center; height: 100%;" />
                                </div>
                                <div class="product-title mt-3">
                                    {{ substr($article->title, 0, 23) }}...
                                </div>
                                <div class="product-category">{{ $article->updated_at }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <h3 class="text-center">No articles yet!!!</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
