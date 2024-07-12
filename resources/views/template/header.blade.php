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
            <a href="{{ url('/') }}" class="navbar-brand">
                <h1 class="text-primary display-6">UMKMnesia</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link" id="nav-link-beranda">Beranda</a>
                    <a href="{{ url('umkm') }}" class="nav-item nav-link" id="nav-link-umkm">UMKM</a>
                    <a href="{{ url('pembina') }}" class="nav-item nav-link" id="nav-link-pembina">Pembina</a>
                    <a href="{{ url('contact') }}" class="nav-item nav-link" id="nav-link-contact">Kontak</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <a href="{{ url('auth/login') }}" class="my-auto btn btn-secondary text-dark">
                        <i class="fas fa-user"></i> MASUK / DAFTAR
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
