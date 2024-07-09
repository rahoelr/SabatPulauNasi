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
                <h2 class="dashboard-title">Pengurus Bumdes</h2>
                <p class="dashboard-subtitle">Kelola Semua Pengurus Bumdes</p>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="admin-teams/create" class="btn btn-success btn-dashboard">Tambah Pengurus</a>
                    </div>
                </div>
                <div class="row mt-4">
                    @if(count($teams)>0)
                    @foreach ($teams as $team)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="card card-dashboard-product d-block" href="/db_admin-team-detail/{{$team->id}}">
                            <div class="card-body">
                                <div style="width: 100%; height: 340px; overflow: hidden; border-radius: 10px;">
                                    <img src="{{ asset('storage/team_images/' . $team->images) }}" alt="" class="w-100" style="object-fit: cover; height: 100%;">
                                </div>
                                <div class="product-title mt-3">{{ $team->name }}</div>
                                <div class="product-category">{{ $team->position }}</div>
                            </div>
                        </a>
                    </div>
                    
                    @endforeach
                    @else
                    <h3 class="text-center">No teams yet!!!</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    {{ $teams->links() }}
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
