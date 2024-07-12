@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Produk Lokal</h4>
                    <h1 class="mb-5 display-3 text-primary">Produk Lokal, Kualitas Global</h1>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src={{ asset('assets/img/slide1.png') }}
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">UMKMnesia</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src={{ asset('assets/img/slide2.png') }}
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">UMKMnesia</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Featurs Section Start -->
    <div class="container-fluid featurs py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa-solid fa-user-pen fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Perizinan</h5>
                            <p class="mb-0">Informasi Perizinan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa-solid fa-hand-holding-dollar fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Pembiayaan</h5>
                            <p class="mb-0">Informasi Pembiayaan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa-solid fa-bullhorn fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Pemasaran</h5>
                            <p class="mb-0">Informasi Pemasaran</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Dukungan 24 Jam</h5>
                            <p class="mb-0">Dukungan kapanpun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->

    <!-- Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Produk UMKM</h1>
                <p>Temukan beragam produk lokal berkualitas dari UMKM terbaik di Indonesia. Dari makanan
                    lezat hingga kerajinan tangan unik, semua ada di sini!</p>
            </div>
            <div class="row g-4">
                @if (!empty($data['umkm']))
                    @foreach ($data['umkm'] as $umkm)
                        <div class="col-lg-6 col-xl-6">
                            <div class="p-4 rounded bg-light">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <img src="{{ asset('images') .'/'. $umkm->image }}"
                                            class="img-fluid rounded-circle" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="col-6">
                                        <b><a href="{{ url('informasi') .'/'. $umkm->id }}" class="mb-2 text-dark">{{ $umkm->nama }}</a></b>
                                        <h6 class="mb-3 mt-2">RP. {{ number_format((float) $umkm->harga, 0, ',', '.') }}</h6>
                                        <div class="d-flex my-3">
                                            <i class="fa-solid fa-user"> <a href="#" class="text-dark">{{ $umkm->pemilik }}</a></i>
                                        </div>
                                        <a href="#"
                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary"></i> Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-3 ms-auto">
                <a class="w-100 btn border-secondary py-3 bg-white text-primary mt-3" href="{{ url('umkm') }}">Semua
                    Produk <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- Product End -->


    <!-- Fact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa-solid fa-shop text-secondary"></i>
                            <h4>1000+ UMKM</h4>
                            <h6>UMKM yang Berkolaborasi</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa-solid fa-cart-shopping text-secondary"></i>
                            <h4>Toko Online</h4>
                            <h6>Produk UMKM</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa-solid fa-utensils text-secondary"></i>
                            <h4>1000+ Produk</h4>
                            <h6>Produk UMKM Indonesia</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>100+ Pembina</h4>
                            <h6>Pembina Berpengalaman</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->


    <!-- Pembina Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Pembina</h4>
                <h1 class="display-10 mb-5 text-dark">Pembina Kami yang Berpengalaman</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @if (!empty($data['pembina']))
                    @foreach ($data['pembina'] as $pembina)
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                    style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0"> {{ $pembina->quote }}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">

                                        <img src={{ asset('images') .'/'. $pembina->image }} class="img-fluid rounded"
                                            style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="ms-4 d-block">
                                        <h4 class="text-dark">{{ $pembina->nama }}</h4>
                                        <p class="m-0 pb-3">Pembina UMKM</p>
                                        <div class="d-flex pe-5">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $pembina->rating)
                                                    <i class="fas fa-star text-primary"></i>
                                                @else
                                                    <i class="fas fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-3 ms-auto">
                <a class="w-100 btn border-secondary py-3 bg-white text-primary mt-3" href="{{ url('pembina') }}">Semua
                    Pembina <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- Pembina End -->
@endsection

@section('template_scripts')
@endsection
