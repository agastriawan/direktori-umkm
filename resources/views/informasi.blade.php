@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="row g-4">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{ asset('images') . '/' . $umkm->image }}" class="img-fluid rounded"
                                        alt="Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{ $umkm->nama }}</h4>
                            <p class="mb-3">Kategori: {{ $umkm->kategori_nama }}</p>
                            <h5 class="fw-bold mb-3">RP.
                                {{ number_format((float) $umkm->harga, 0, ',', '.') }}</h5>
                            <div class="d-flex my-3">
                                <i class="fa-solid fa-user"> <a href="#"
                                        class="text-dark">{{ $umkm->pemilik }}</a></i>
                            </div>
                            <div class="d-flex mb-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $umkm->rating)
                                        <i class="fas fa-star text-secondary"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="mb-4">{{ $umkm->deskripsi }}</p>
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="#"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i>Beli</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <div class="input-group w-100 mx-auto d-flex mb-4">
                                <input type="search" class="form-control p-3" placeholder="Cari Produk"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="mb-4">
                                <h4>Kategori</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    @if (!empty($kategori))
                                        @foreach ($kategori as $kat)
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#">{{ $kat->kategori_nama }}</a>
                                                    <span>({{ $kat->jumlah }})</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->
@endsection

@section('template_scripts')
@endsection
