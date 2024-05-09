@extends('layouts.main')

@push('style')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@endpush


@section('content')
    <!-- Banner 1 - Landing Page -->
    <div class="banner" id="home"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('assets/img/bg.jpg') }}');">
        <!-- Navbar -->
        <nav class="navbar px-3">
            <div class="container">
                <a class="navbar-brand" href=""><img src="{{ url('/assets/img/logo.png') }}" alt="metik_2023" style="width: 100px;"></a>
                <ul class="links">
                    <li><a href="#home" class="active text-light">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#anggaran">Anggaran</a></li>
                </ul>
                <!-- hamburger menu -->
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars-staggered" style="color: #fff;"></i>
                </div>
                <!-- hamburger menu rnd -->
            </div>
        </nav>
        <!-- dropdown menu -->
        <nav class="navbar_2">
            <ul class="dropdown_menu">
                <li><a href="#home" class="active text-light">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#anggaran">Anggaran</a></li>
            </ul>
        </nav>
        <!-- dropdown menu end -->
        <!-- Navbar End -->

        <!-- Content Banner -->
        <div class="content px-3">
            @foreach ($judul as $item)
                {!! $item->title !!}
                {!! $item->subtitle !!}
            @endforeach

            <div class="button">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <button type="button" style="background-color: #dc3545; border: none;">Logout</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="#contacts"><button type="button"><span></span>Contact Us</button></a>
            </div>
        </div>

        <div class="edit d-flex">
            @foreach ($judul as $item)
                <div class="container">
                    <button class="btn btn-secondary" id="edit-judul-btn" data-bs-toggle="modal"
                        data-bs-target="#editJudulModal{{ $item->id }}"><i
                            class="fa-solid fa-pencil my-auto">&nbsp;</i>Edit</button>
                </div>
            @endforeach
        </div>
        <!-- Content Banner End -->
    </div>
    <!-- Banner 1 - Landing Page End -->


    <!-- Banner 2 - About -->
    @foreach ($judul as $item)
        <div class="banner-2">
            <div class="container-about">
                <div class="label-about" id="about">
                    <h2><b>About</b></h2>
                </div>

                <div class="edit d-flex">
                    <div class="container">
                        <button class="btn btn-secondary" id="edit-judul-btn" data-bs-toggle="modal"
                            data-bs-target="#editAboutModal{{ $item->id }}"><i
                                class="fa-solid fa-pencil my-auto">&nbsp;</i>Edit</button>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col col-lg-4 col-md-6 col-sm-12">
                        <div class="text-about">
                            <h3>{!! $item->about_title !!}</h3>
                        </div>
                    </div>
                    <div class="col col-lg-8 col-md-6 col-sm-12">
                        <div class="hidden-about text-secondary">
                            <p>{!! $item->about_subtitle !!}</p>
                        </div>
                        <div class="about-subjudul-container text-secondary">
                            <!-- Fungsi implode  -->
                            <?php
                            $about_subtitle = strip_tags($item->about_subtitle);
                            $wordLimit = 40;
                            if (str_word_count($about_subtitle) > $wordLimit) {
                                $about_subtitle = implode(' ', array_slice(str_word_count($about_subtitle, 2), 0, $wordLimit)) . ' ...';
                            }
                            ?>
                            <p>{!! $about_subtitle !!}</p>
                        </div>
                        <button class="seeAll text-light toggle-button" id="toggleButtonSeeAll">See All</button>
                    </div>
                </div>

            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#160e32" fill-opacity="1"
                    d="M0,288L21.8,250.7C43.6,213,87,139,131,112C174.5,85,218,107,262,144C305.5,181,349,235,393,229.3C436.4,224,480,160,524,160C567.3,160,611,224,655,256C698.2,288,742,288,785,272C829.1,256,873,224,916,186.7C960,149,1004,107,1047,122.7C1090.9,139,1135,213,1178,213.3C1221.8,213,1265,139,1309,122.7C1352.7,107,1396,149,1418,170.7L1440,192L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z">
                </path>
            </svg>
        </div>
    @endforeach
    <!-- Banner 2 - About End -->


    <!-- Banner 3 - Gallery -->
    <div class="banner-3" style="margin-top: -10px;">
        <div class="container-gallery">
            <div class="label-gallery d-flex gap-2" id="gallery">
                <h2><b>Gallery</b></h2>
                <div class="actions">
                    <button type="button" style="background: transparent; border-color: transparent;" data-bs-toggle="modal" data-bs-target="#tambah-gallery"><i class="fa-solid fa-square-plus fa-2x text-light"></i></button>
                </div>
            </div>


            <div class="row row-cols-3 row-cols-lg-5 row-cols-md-3 g-2 g-lg-3">
                @foreach ($gallery as $item)
                    <div class="col">
                        <div class="card">
                            <div class="gambar">
                                <img src="{{ asset('storage/gallery/' . $item->image) }}" alt="image" class="card-img" loading="lazy">
                            </div>

                            <div class="actions">
                                <a href="#" class="text-decoration-none text-light fs-3"
                                    id="galleryActions-{{ $item->id }}" data-bs-toggle="dropdown" title="Actions">
                                    <i class='bx bx-dots-vertical-rounded'></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end position-absolute z-1000"
                                    aria-labelledby="galleryActions-{{ $item->id }}">
                                    <li><a class="dropdown-item" href="#"
                                            onclick="editGallery('{{ $item->id }}', '{{ $item->image }}', '{{ $item->description }}')"
                                            data-bs-toggle="modal" data-bs-target="#edit-gallery">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{ route('image.download', $item->id) }}"
                                            onclick="return confirm('Apakah Anda yakin ingin mengunduh gambar ini?')">Download</a>
                                    </li>
                                    <hr class="py-0 my-1">
                                    <li>
                                        <form class="dropdown-item" action="{{ route('gallery.destroy', $item->id) }}"
                                            method="POST">
                                            @csrf @method('DELETE')

                                            <button type="submit"
                                                class="hapus-btn d-flex bg-transparent border-0 p-0 m-0 text-danger bg-info w-100"
                                                onclick="return confirm('Anda yakin?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <div class="keterangan">
                                <p class="py-1 py-lg-3">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner 3 - Gallery End -->


    <!-- Banner 4 - Anggaran -->
    <div class="banner-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#160e32" fill-opacity="1"
                d="M0,64L21.8,53.3C43.6,43,87,21,131,48C174.5,75,218,149,262,165.3C305.5,181,349,139,393,154.7C436.4,171,480,245,524,245.3C567.3,245,611,171,655,138.7C698.2,107,742,117,785,112C829.1,107,873,85,916,112C960,139,1004,213,1047,224C1090.9,235,1135,181,1178,144C1221.8,107,1265,85,1309,101.3C1352.7,117,1396,171,1418,197.3L1440,224L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z">
            </path>
        </svg>
        <div class="container-anggaran">
            <div class="label-anggaran d-flex align-items-center gap-2" id="anggaran">
                <h2><b>Anggaran</b></h2>
                <button type="button" style="background: transparent; border-color: transparent;" data-bs-toggle="modal" data-bs-target="#tambahAnggaran"><i class="fa-solid fa-square-plus fa-2x text-light"></i></button>
            </div>


            <!-- Table -->
            <div class="table-responsive text-light">
                <table id="myDataTable" class="table table-light table-borderless table-striped table-hover table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Actions</th>
                            <th class="text-center align-middle">Nama Barang</th>
                            <th class="text-center align-middle">Type</th>
                            <th class="text-center align-middle">Satuan</th>
                            <th class="text-center align-middle">Jumlah</th>
                            <th class="text-center align-middle">Harga<span style="color: red;">*</span></th>
                            <th class="text-center align-middle">Date</th>
                            <th class="text-center align-middle">Kwitansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggaran as $item)
                            <tr>
                                <td class="text-center">
                                    <div class="actions d-flex justify-content-center gap-2">
                                        <a href="#" class="link" title="Edit">
                                            <button class="bg-transparent border-0 p-0 m-0" onclick="editAnggaran('{{ $item->id }}', '{{ $item->image }}', '{{ $item->type }}', '{{ $item->name }}', '{{ $item->satuan }}', '{{ $item->jumlah }}', '{{ $item->date }}')" data-bs-toggle="modal" data-bs-target="#edit-anggaran">
                                                <i class="fa fa-pencil text-primary"></i>
                                            </button>
                                        </a>
                                        <a href="#" class="link" title="Hapus">
                                            <form class="dropdown-item" action="{{ route('anggaran.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf @method('DELETE')
    
                                                <button type="submit"
                                                    class="d-flex bg-transparent border-0 p-0 m-0 text-danger bg-info w-100" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?');">
                                                    <i class="fa-solid fa-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </td>
                                <td class="ps-3">{{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ "Rp " . number_format($item->satuan,0,',','.') }}</td>
                                <td class="text-start">{{ $item->jumlah }}</td>
                                <td>{{ "Rp " . number_format($item->harga,0,',','.') }}</td>
                                <td class="text-center">{{ $item->date }}</td>
                                <td class="text-center">
                                    @if ($item->image)
                                        <button class="btn btn-secondary" onclick="kwitansi('{{ $item->id }}', '{{ $item->image }}')" data-bs-toggle="modal" data-bs-target="#kwitansiModal">Lihat</button>
                                        
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-center">Jumlah</th>
                            <th colspan="1" class="text-end">{{ "Rp " . number_format($jml_anggaran,0,',','.') }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Table End -->


            <!-- Download file pdf Anggaran -->
            <div class="download-action d-flex flex-wrap align-items-center gap-2 mt-4">
                <a href="cetak_anggaran.php" target="_blank"><button class="btn btn-primary" style="border-radius: 0px;">Download pdf</button></a>
                <a href="export_to_excel.php" target="_blank"><button class="btn btn-success" style="border-radius: 0px;">Export to Excel</button></a>
            </div>
            <!-- Download file pdf Anggaran End -->

            <!-- Information -->
            <div class="informations mt-5">
                <div class="container-information">
                    <h4 class="text-light mb-3">Keterangan</h4>
                    <table>
                        <tbody class="align-top">
                            <tr>
                                <td><span class="text-light align-top"><b style="color: red;">*</b></span></td>
                                <td>&nbsp;</td>
                                <td><span class="text-light">adalah tanda untuk menentukan hasil kali dari Satuan dengan
                                        Jumlah.</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Information End -->


        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#050510" fill-opacity="1"
                d="M0,192L24,170.7C48,149,96,107,144,112C192,117,240,171,288,165.3C336,160,384,96,432,74.7C480,53,528,75,576,90.7C624,107,672,117,720,149.3C768,181,816,235,864,245.3C912,256,960,224,1008,197.3C1056,171,1104,149,1152,149.3C1200,149,1248,171,1296,186.7C1344,203,1392,213,1416,218.7L1440,224L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z">
            </path>
        </svg>
    </div>
    <!-- Banner 4 - Anggaran End -->


    <!-- Footer -->
    <footer class="footer" id="contacts">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-12 py-4 px-2">
                <div class="col col-lg-6 col-md-7 col-sm-12">
                    <div class="layout-logo d-flex">
                        <img src="{{ url('/assets/img/logo.png') }}" alt="logo_metik_2023" style="width: 150px;">
                    </div>

                    <p class="text-footer text-light ms-1" style="opacity: 0.4;">METIK adalah kegiatan untuk mengenal
                        Teknik, yaitu Teknik Mesin, Teknik Industri, Teknik Informatika, Teknik Sipil, dan Sistem Informasi.
                        Tujuan dari kegiatan ini adalah untuk pengenalan kampus, pengenalan Fakultas Teknik dan Ilmu
                        Komputer, dan untuk menjalin ikatan emosional / rasa memiliki Fakultas Teknik dan Ilmu Komputer.
                    </p>
                </div>

                <div class="col col-lg-2 col-md-1 col-sm-12"></div>

                <div class="col col-lg-2 col-md-4 col-sm-6">
                    <h4 style="width: min-content;">Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#anggaran">Anggaran</a></li>
                    </ul>
                </div>

                <div class="col col-lg-2 col-md-12 col-sm-6">
                    <h4 style="width: min-content;">Contacts</h4>
                    <ul>
                        <li><a href="#">Help / FAQ</a></li>
                    </ul>
                </div>

                <div class="col col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="social-media ms-1">
                        <img class="me-2" src="{{ url('/assets/img/logo_informatika.jpg') }}" alt="logo_informatika"
                            style="width: 40px;">
                        <img class="me-2" src="{{ url('/assets/img/logo_informatika.jpg') }}"
                            alt="logo_sistem_informasi" style="width: 40px;">
                        <img class="me-2" src="{{ url('/assets/img/logo_informatika.jpg') }}" alt="logo_mesin"
                            style="width: 40px;">
                        <img class="me-2" src="{{ url('/assets/img/logo_informatika.jpg') }}" alt="logo_industri"
                            style="width: 40px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <h6 class="px-2 pt-2 text-center">copyright &copy;2023 Metik.</h6>
            </div>
        </div>
    </footer>
    <!-- Footer End -->




    <!-- Modal Judul -->
    @foreach ($judul as $item)
        <!-- Judul -->
        <form action="{{ route('judul.update', $item->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="modal fade" id="editJudulModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="form-input">
                                <label for="edit-judul">Judul</label>
                                <textarea name="title" id="edit-judul">{{ $item->title }}</textarea>
                            </div>

                            <div class="form-input">
                                <label for="edit-subjudul" class="mt-2">Subjudul</label>
                                <textarea name="subtitle" id="edit-subjudul">{{ $item->subtitle }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- About -->
        <form action="{{ route('judul.update', $item->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="modal fade" id="editAboutModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="form-input">
                                <label for="edit-about-judul">Judul</label>
                                <textarea name="about_title" id="edit-about-judul">{{ $item->about_title }}</textarea>
                            </div>

                            <div class="form-input">
                                <label for="edit-about-subjudul" class="mt-2">Subjudul</label>
                                <textarea name="about_subtitle" id="edit-about-subjudul">{{ $item->about_subtitle }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    <!-- Modal Judul End -->


    <!-- Modal Gallery -->
        <!-- Tambah Gallery -->
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="tambah-gallery" tabindex="-1" aria-labelledby="tambahGalleryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahGalleryModalLabel">Tambah gallery</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <label for="image" class="">Image</label>
                            <div class="input-group flex-nowrap">
                                <input type="file" accept="image/*" name="image" class="form-control" id="image"
                                    aria-label="gambar" aria-describedby="addon-wrapping" required>
                            </div>

                            <label for="description" class="mt-3">Keterangan</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa-solid fa-circle-info"></i></span>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="Masukkan keterangan gambar..." aria-label="keterangan"
                                    aria-describedby="addon-wrapping" autocomplete="off">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button onclick="tambahGallery()" type="submit" name="tambahGallery_btn"
                                class="btn btn-primary btn-tambah-gallery">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Edit Gallery -->
        <form method="POST" enctype="multipart/form-data" id="edit-gallery-form">
            @csrf @method('PUT')

            <div class="modal fade" id="edit-gallery" tabindex="-1" aria-labelledby="edit-gallery" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit gallery</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" id="id" name="id">

                            <div class="preview">
                                <div class="preview-container">
                                    <img src="" alt="image" id="preview-img">
                                </div>
                            </div>

                            <label for="image" class="">Image</label>
                            <div class="input-group flex-nowrap">
                                <input type="file" accept="image/*" name="image" class="form-control" id="edit-image"
                                    aria-label="image" aria-describedby="addon-wrapping">
                            </div>

                            <label for="description" class="mt-2">Keterangan</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa-solid fa-circle-info"></i></span>
                                <input type="text" name="description" id="edit-description" class="form-control"
                                    placeholder="keterangan" aria-label="keterangan" aria-describedby="addon-wrapping"
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary edit_gallery_btn">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <!-- Modal Gallery End -->


    <!-- Modal Anggaran -->
        <!-- Modal Tambah Anggaran -->
        <form action="{{ route('anggaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="tambahAnggaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <label for="image" class="">Bukti pembayaran</label>
                            <div class="input-group flex-nowrap">
                                <input type="file" accept="image/*" name="image" class="form-control" id="image" aria-label="image" aria-describedby="addon-wrapping">
                            </div>

                            <label for="type" class="mt-2">Type</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-star icon"></i></span>
                                <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                    <option value="Sekertaris">Sekertaris</option>
                                    <option value="Acara">Acara</option>
                                    <option value="Konsumsi">Konsumsi</option>
                                    <option value="Perkap">Perkap</option>
                                    <option value="Lain - lain">Lain - lain</option>
                                </select>
                            </div>

                            <label for="name" class="mt-2">Nama Barang</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cart-shopping"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama barang" aria-label="name" aria-describedby="addon-wrapping" autocomplete="off" required>
                            </div>

                            <label for="satuan" class="mt-2">Harga Satuan</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-sack-dollar"></i></span>
                                <input type="number" name="satuan" id="satuan" class="form-control" placeholder="Harga satuan" aria-label="satuan" aria-describedby="addon-wrapping" autocomplete="off" required>
                            </div>

                            <label for="jumlah" class="mt-2">Jumlah</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-open"></i></span>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" aria-label="jumlah" aria-describedby="addon-wrapping" autocomplete="off" required>
                            </div>

                            <label for="date" class="mt-2">Date</label>
                            <div class="input-group">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-clock"></i></span>
                                <input type="date" name="date" id="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah_btn" class="btn btn-primary btn-tambah">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Edit Anggaran -->
        <form method="POST" enctype="multipart/form-data" id="edit-anggaran-form">
            @csrf @method('PUT')

            <div class="modal fade" id="edit-anggaran" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit_anggaran_id">

                            <label for="image" class="">Bukti pembayaran</label>
                            <div class="input-group flex-nowrap">
                                <input type="file" accept="image/*" name="image" class="form-control" id="edit-image" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <label for="type" class="mt-2">Type</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-star icon"></i></span>
                                <select class="form-select" aria-label="Default select example" name="type" id="edit-type" required>
                                    <option value="Sekertaris">Sekertaris</option>
                                    <option value="Acara">Acara</option>
                                    <option value="Konsumsi">Konsumsi</option>
                                    <option value="Perkap">Perkap</option>
                                    <option value="Lain - lain">Lain - lain</option>
                                </select>
                            </div>

                            <label for="name" class="mt-2">Nama Barang</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cart-shopping"></i></span>
                                <input type="text" name="name" id="edit-name" class="form-control" placeholder="Nama barang" aria-label="name" aria-describedby="addon-wrapping" autocomplete="off" value="">
                            </div>

                            <label for="satuan" class="mt-2">Satuan</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-sack-dollar"></i></span>
                                <input type="text" name="satuan" id="edit-satuan" class="form-control" placeholder="Harga satuan" aria-label="satuan" aria-describedby="addon-wrapping" autocomplete="off" value="">
                            </div>

                            <label for="jumlah" class="mt-2">Jumlah</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-open"></i></span>
                                <input type="text" name="jumlah" id="edit-jumlah" class="form-control" placeholder="Jumlah" aria-label="jumlah" aria-describedby="addon-wrapping" autocomplete="off" value="">
                            </div>

                            <label for="date" class="mt-2">Date</label>
                            <div class="input-group">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-clock"></i></span>
                                <input type="date" name="date" id="edit-date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" value="">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit_anggaran_btn" id="edit_anggaran_btn" class="btn btn-primary btn-edit">Edit data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Bukti Pembayaran -->
        <div class="modal fade" id="kwitansiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <input type="hidden" id="kwitansi_id">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="img mx-auto d-block" src="" id="kwitansi_img" loading="lazy" style="width: 60%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a id="download_kwitansi" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengunduh gambar ini?')">Download</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal Anggaran End -->


    @include('components.toast')
@endsection



@push('script')
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

    <script>
        $('#edit-judul').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120
        });

        $('#edit-subjudul').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120
        });

        $('#edit-about-judul').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120
        });

        $('#edit-about-subjudul').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120
        });

        $(document).ready(function() {
            // Cek apakah ada session success
            if ("{{ session()->has('success') }}") {
                // Tampilkan toast
                $('#toast-success-content').toast('show');
            }
            if ("{{ session()->has('error') }}") {
                // Tampilkan toast
                $('#toast-error-content').toast('show');
            }

            $('#myDataTable').DataTable();
        });

        $('#myDataTable').DataTable({
            "language": {
                "searchPlaceholder": "Search here..."
            }
        });


        function editGallery(id, image, description) {
            $('#id').val(id);
            $('#edit-image').val('');
            $('#edit-description').val(description);

            $('#preview-img').attr('src', "{{ asset('storage/gallery/', '') }}" + '/' + image);

            $('#edit-gallery-form').attr('action', "{{ route('gallery.update', '') }}" + '/' + id);
            $('#edit-gallery').modal('show');
        }

        function kwitansi(id, image) {
            $('#kwitansi_id').val(id);
            $('#kwitansi_img').attr('src', "{{ asset('storage/anggaran/', '') }}" + '/' + image);
            $('#download_kwitansi').attr('href', "{{ route('kwitansi.download', '') }}" + '/' + id);
        }

        function editAnggaran(id, image, type, name, satuan, jumlah, date) {
            $('#edit_anggaran_id').val(id);
            $('#edit-image').val('');
            $('#edit-type').val(type);
            $('#edit-name').val(name);
            $('#edit-satuan').val(satuan);
            $('#edit-jumlah').val(jumlah);
            $('#edit-date').val(date);

            $('#edit-anggaran-form').attr('action', "{{ route('anggaran.update', '') }}" + '/' + id);
            $('#edit-anggaran').modal('show');
        }
    </script>
@endpush
