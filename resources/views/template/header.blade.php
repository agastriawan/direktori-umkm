<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">Jakarta</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">umkmnesia@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Kebijakan Privasi</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Ketentuan Penggunaan</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary display-6">UMKMnesia</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Beranda</a>
                    <a href="{{ url('umkm') }}" class="nav-item nav-link">UMKM</a>
                    <a href="{{ url('pembina') }}" class="nav-item nav-link">Pembina</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pembina</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ url('chart') }}" class="dropdown-item">Cart</a>
                            <a href="{{ url('checkout') }}" class="dropdown-item">Chackout</a>
                            <a href="{{ url('testimoni') }}" class="dropdown-item">Testimonial</a>
                        </div>
                    </div> --}}
                    <a href="{{ url('contact') }}" class="nav-item nav-link">Kontak</a>
                </div>
                <div class="d-flex m-3 me-0">
                    {{-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                        data-bs-toggle="modal" data-bs-target="#searchModal"><i
                            class="fas fa-search text-primary"></i></button>
                    <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a> --}}
                    <a href="{{ url('login') }}" class="my-auto btn btn-secondary text-dark">
                        <i class="fas fa-user"></i> MASUK / DAFTAR
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
