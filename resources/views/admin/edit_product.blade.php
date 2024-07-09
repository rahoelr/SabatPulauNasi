@extends('layouts.crud')

@section('content')
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
                                <img src="{{ asset('storage/user_images/' . Auth::user()->images) }}" alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                                Hi, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a href="/home" class="dropdown-item">Back To Home</a>
                                <a href="/users/{{ Auth::user()->id }}/edit" class="dropdown-item">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                <img src="{{ asset('storage/user_images/' . Auth::user()->images) }}" alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                                Hi, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a href="/home" class="dropdown-item">Back To Home</a>
                                <a href="/users/{{ Auth::user()->id }}/edit" class="dropdown-item">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container">
                <h1>Edit Produk</h1>
                <a href="{{ Auth::user()->level == 'admin' ? '/db_admin-product' : '/db_mitra-product/' . Auth::user()->id }}"
                    class="btn btn-info btn-edit text-light">Back</a>
                <form action="{{ route('admin-products.update', $products->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="content">
                        <div class="kiri">
                            <label for="input-file">
                                <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                    id="input-file" name="images[]" accept="image/*" onchange="previewImage()" multiple>
                                <i class="fa-solid fa-upload"></i> &nbsp; Choose Pictures
                            </label>
                            <p id="num-of-files">No File Chosen</p>
                            <div id="images" class="d-flex flex-wrap">
                                <!-- Display existing images -->
                                {{-- @foreach ([$products->image1, $products->image2, $products->image3, $products->image4] as $index => $image)
                                    @if ($image)
                                        <figure class="m-2" id="existing-image-{{ $index }}">
                                            <img src="{{ asset('storage/product_images/' . $image) }}"
                                                class="img-thumbnail" onclick="removeImage({{ $index }})">
                                        </figure>
                                    @endif
                                @endforeach --}}

                            </div>
                        </div>
                        <div class="kanan">
                            <div class="name">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" name="product_name" id="product_name"
                                    class="form-control @error('product_name')
                        is-invalid
                    @enderror"
                                    value="{{ $products->product_name }}">
                                @error('product_name')
                                    <div class="invalid-feedback ml-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="category">
                                <label for="category">Kategori</label>
                                <div class="row">
                                    @php
                                        $cate = explode(',', $products->category);
                                        $j = count($cate);
                                    @endphp
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <div class="col-3 mb-2" style="text-align: center;" data-aos="fade-up">
                                                <input class="check-inpt" type="checkbox" name="category[]"
                                                    id="{{ $category->category }}" value="{{ $category->category }}"
                                                    @for ($i = 0; $i < $j; $i++) {{ $category->category === $cate[$i] ? 'checked' : '' }} @endfor>
                                                <p class="inpt-sort text-center" style="font-size: 14px;">
                                                    {{ $category->category }}
                                                </p>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="inpt-sort text-center">No categories yet!!!</p>
                                    @endif
                                </div>
                            </div>
                            <div class="Price">
                                <label for="price">Harga Produk</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price')
                        is-invalid
                    @enderror"
                                    value="{{ $products->price }}">
                                @error('price')
                                    <div class="invalid-feedback ml-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="desc">
                                <label for="description">Deskripsi Produk</label>
                                <textarea class="form-control @error('description')
                        is-invalid
                    @enderror"
                                    name="description" id="description" rows="5">{{ $products->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback ml-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Phone">
                                <label for="p_number">Nomor Whatsapp</label>
                                <input type="number" name="p_number" id="p_number"
                                    class="form-control mb-0 @error('p_number')
                        is-invalid
                    @enderror"
                                    value="{{ $products->p_number }}">
                                <small class="form-text text-muted ml-4 mb-1">*Nomor whatsapp harus disertai kode negara
                                    tanpa tanda "+" (ex: 6282123444xxx)</small>
                                @error('p_number')
                                    <div class="invalid-feedback ml-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Mitra">
                                <label for="mitra">Mitra</label>
                                <select
                                    class="form-control @error('mitra')
                        is-invalid
                    @enderror"
                                    name="mitra" id="mitra">
                                    @if (count($mitras) > 0)
                                        @foreach ($mitras as $mitra)
                                            <option value='{{ $mitra->mitra_name }}'
                                                {{ $products->mitra === $mitra->mitra_name ? 'selected' : '' }}>
                                                {{ $mitra->mitra_name }}</option>
                                        @endforeach
                                    @else
                                        <option value='No mitras yet!!!' disabled>No mitras yet!!!</option>
                                    @endif
                                </select>
                                @error('mitra')
                                    <div class="invalid-feedback ml-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="buttonProd">Edit Produk</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        let fileInput = document.getElementById("input-file");
        let imageContainer = document.getElementById("images");
        let numOfFiles = document.getElementById("num-of-files");

        let imageFiles = [];

        function previewImage() {
            numOfFiles.textContent = '';

            let files = fileInput.files;

            if (files.length < 1) {
                alert("Please select at least one image.");
                return;
            }

            if (files.length > 4) {
                alert("You can only select up to three images.");
                return;
            }

            for (let i = 0; i < files.length; i++) {
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                figCap.innerText = '';
                figure.appendChild(figCap);
                reader.onload = () => {
                    let img = document.createElement("img");
                    img.setAttribute("src", reader.result);
                    img.classList.add("img-thumbnail", "m-2");
                    img.addEventListener("click", function() {
                        imageFiles.splice(i, 1); // Remove image from array
                        figure.remove(); // Remove image from preview
                        updateNumOfFiles();
                    });
                    figure.appendChild(img);
                };

                imageFiles.push(files[i]); // Add image to array
                imageContainer.appendChild(figure);
                reader.readAsDataURL(files[i]);
            }

            updateNumOfFiles();
        }

        function updateNumOfFiles() {
            if (imageFiles.length > 0) {
                numOfFiles.textContent = `${imageFiles.length} File(s) Chosen`;
            } else {
                numOfFiles.textContent = 'No File Chosen';
            }
        }

        function removeImage(index) {
            let imageToRemove = document.getElementById('existing-image-' + index);
            imageToRemove.remove(); // Remove image from preview

            // Remove image from array
            imageFiles.splice(index, 1);

            updateNumOfFiles();
        }
    </script>
@endsection
