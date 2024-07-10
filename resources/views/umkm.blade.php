@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5 mt-5">
        <div class="container py-5 mt-5">
            <h1 class="mb-4">Produk UMKM</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="Cari Produk"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3">
                                        <h4>Kategori</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fa-solid fa-laptop me-2"></i>Elektronik</a>
                                                    <span>(3)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i
                                                            class="fa-solid fa-hands-holding-circle me-2"></i>Kerajinan</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fa-solid fa-shirt me-2"></i>Fashion</a>
                                                    <span>(2)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fa-solid fa-bowl-rice me-2"></i>Makanan dan
                                                        Minuman</a>
                                                    <span>(8)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fa-solid fa-person me-2"></i>Bidang Jasa</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                <!-- Product Start -->
                                <div class="col-lg-6 col-xl-4">
                                    <div class="p-4 rounded bg-light">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <img src="{{ asset('assets/img/teh poci.webp') }}"
                                                    class="img-fluid rounded-circle w-100" alt="">
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('informasi') }}" class="h5">Teh Poci Milo</a>
                                                <h5 class="mb-3">RP. 9.000</h5>
                                                <div class="d-flex my-3">
                                                    <i class="fa-solid fa-user"> Kafi</i>
                                                </div>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="p-4 rounded bg-light">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <img src="{{ asset('assets/img/teh poci.webp') }}"
                                                    class="img-fluid rounded-circle w-100" alt="">
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('informasi') }}" class="h5">Teh Poci Milo</a>
                                                <h5 class="mb-3">RP. 9.000</h5>
                                                <div class="d-flex my-3">
                                                    <i class="fa-solid fa-user"> Kafi</i>
                                                </div>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="p-4 rounded bg-light">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <img src="{{ asset('assets/img/teh poci.webp') }}"
                                                    class="img-fluid rounded-circle w-100" alt="">
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('informasi') }}" class="h5">Teh Poci Milo</a>
                                                <h5 class="mb-3">RP. 9.000</h5>
                                                <div class="d-flex my-3">
                                                    <i class="fa-solid fa-user"> Kafi</i>
                                                </div>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="p-4 rounded bg-light">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <img src="{{ asset('assets/img/teh poci.webp') }}"
                                                    class="img-fluid rounded-circle w-100" alt="">
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('informasi') }}" class="h5">Teh Poci Milo</a>
                                                <h5 class="mb-3">RP. 9.000</h5>
                                                <div class="d-flex my-3">
                                                    <i class="fa-solid fa-user"> Kafi</i>
                                                </div>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="p-4 rounded bg-light">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <img src="{{ asset('assets/img/teh poci.webp') }}"
                                                    class="img-fluid rounded-circle w-100" alt="">
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('informasi') }}" class="h5">Teh Poci Milo</a>
                                                <h5 class="mb-3">RP. 9.000</h5>
                                                <div class="d-flex my-3">
                                                    <i class="fa-solid fa-user"> Kafi</i>
                                                </div>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="p-4 rounded bg-light">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <img src="{{ asset('assets/img/teh poci.webp') }}"
                                                    class="img-fluid rounded-circle w-100" alt="">
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('informasi') }}" class="h5">Teh Poci Milo</a>
                                                <h5 class="mb-3">RP. 9.000</h5>
                                                <div class="d-flex my-3">
                                                    <i class="fa-solid fa-user"> Kafi</i>
                                                </div>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection

@section('template_scripts')
@endsection
