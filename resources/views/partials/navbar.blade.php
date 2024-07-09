@auth
<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top px-3" data-aos="fade-down">
    <div class="container">
        <a href="/home" class="navbar brand">
            <img src="{{ asset('img/logo_nav.svg') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{($title === "") ? 'active' : ''}}">
                    <a href="/home" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item {{($title === "| Desa") ? 'active' : ''}}">
                    <a href="/desa" class="nav-link">Desa</a>
                </li>
                <li class="nav-item {{($title === "| Product") ? 'active' : ''}}">
                    <a href="/produk" class="nav-link">Produk</a>
                </li>
                <li class="nav-item {{($title === "| Mitra") ? 'active' : ''}}">
                    <a href="/mitra" class="nav-link">Mitra</a>
                </li>
                <li class="nav-item {{($title === "| Article") ? 'active' : ''}}">
                    <a href="/artikel" class="nav-link">Artikel</a>
                </li>
                <li class="nav-item {{($title === "| About Us") ? 'active' : ''}}">
                    <a href="/tentang_kami" class="nav-link">Tentang Kami</a>
                </li>
                <li class="nav-item {{($title === "| Search") ? 'active' : ''}}">
                    <a id="openModalBtn" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                        style="width: 40px; height:40px">
                        <img src="{{asset("img/Search.svg")}}" alt="" />
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="{{asset("storage/user_images/".Auth::user()->images)}}" alt="" class="rounded-circle mr-2 profile-picture" style="max-width: 100%; height: auto;" />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu">
                        @if (Auth::user()->level == 'admin')
                        <a href="/db_admin" class="dropdown-item">Dashboard</a>
                        @else
                        <a href="/db_mitra/{{Auth::user()->id}}" class="dropdown-item">Dashboard</a>
                        @endif
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
                        @if (Auth::user()->level == 'admin')
                        <a href="/db_admin" class="dropdown-item">Dashboard</a>
                        @else
                        <a href="/db_mitra/{{Auth::user()->id}}" class="dropdown-item">Dashboard</a>
                        @endif
                        <a href="/users/{{Auth::user()->id}}/edit" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route("logout")}}" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="searchModal" class="modal-search">
    <!-- Modal content -->
    <div class="modal-content-search">
        <span class="close">&times;</span>
        <div class="container">
            <form action="/search" method="GET">
                <div class="input-group input-group-lg">
                    <input type="search" name="search" id="form1" class="form-control search-form"
                        placeholder="Cari Produk Yang Anda Inginkan" aria-label="Search" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Get the modal element
    var modal = document.getElementById("searchModal");

    // Get the button that opens the modal
    var btn = document.getElementById("openModalBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Open the modal when the button is clicked
    btn.onclick = function () {
        modal.style.display = "block";
    };

    // Close the modal when the <span> (close button) is clicked
    span.onclick = function () {
        modal.style.display = "none";
    };

    // Close the modal when the user clicks outside of it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

</script>
@endauth
@guest
<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top px-3 mb-3" data-aos="fade-down">
    <div class="container">
        <a href="/home" class="navbar brand">
            <img src="{{ asset('img/logo_auth.svg') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{($title === "") ? 'active' : ''}}">
                    <a href="/home" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item {{($title === "| Desa") ? 'active' : ''}}">
                    <a href="/desa" class="nav-link">Desa</a>
                </li>
                <li class="nav-item {{($title === "| Product") ? 'active' : ''}}">
                    <a href="/produk" class="nav-link">Produk</a>
                </li>
                <li class="nav-item {{($title === "| Mitra") ? 'active' : ''}}">
                    <a href="/mitra" class="nav-link">Mitra</a>
                </li>
                <li class="nav-item {{($title === "| Article") ? 'active' : ''}}">
                    <a href="/artikel" class="nav-link">Artikel</a>
                </li>
                <li class="nav-item {{($title === "| About Us") ? 'active' : ''}}">
                    <a href="/tentang_kami" class="nav-link">Tentang Kami</a>
                </li>
                <li class="nav-item {{($title === "| Search") ? 'active' : ''}}">
                    <a id="openModalBtn" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                        style="width: 40px; height:40px">
                        <img src="{{asset("img/Search.svg")}}" alt="" />
                    </a>
                </li>
                <li class="nav-item">
                    @auth
                    <a href="{{route("logout")}}" class="btn btn-success nav-link px-4 text-white">Log Out</a>
                    @endauth
                    @guest
                    <a href="{{route("login")}}" class="btn btn-success nav-link px-4 text-white">Log In</a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="searchModal" class="modal-search">
    <!-- Modal content -->
    <div class="modal-content-search">
        <span class="close">&times;</span>
        <div class="container">
            <form action="/search" method="GET">
                <div class="input-group input-group-lg">
                    <input type="search" name="search" id="form1" class="form-control search-form"
                        placeholder="Cari Produk Yang Anda Inginkan" aria-label="Search" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Get the modal element
    var modal = document.getElementById("searchModal");

    // Get the button that opens the modal
    var btn = document.getElementById("openModalBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Open the modal when the button is clicked
    btn.onclick = function () {
        modal.style.display = "block";
    };

    // Close the modal when the <span> (close button) is clicked
    span.onclick = function () {
        modal.style.display = "none";
    };

    // Close the modal when the user clicks outside of it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

</script>
@endguest
