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
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @if (!empty($umkms))
                                    @foreach ($umkms as $umkm)
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="p-4 rounded bg-light">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <img src="{{ asset('images') . '/' . $umkm->image }}"
                                                            class="img-fluid rounded-circle w-100" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        @php
                                                            $words = explode(' ', $umkm->nama);
                                                            $limitedName = implode(' ', array_slice($words, 0, 2));
                                                        @endphp

                                                        <a href="{{ url('informasi' .'/'. $umkm->id ) }}"
                                                            class=" mb-1">{{ $limitedName }}{{ count($words) > 2 ? '...' : '' }}</a>
                                                        <b>
                                                            <p class="mb-3">RP.
                                                                {{ number_format((float) $umkm->harga, 0, ',', '.') }}</p>
                                                        </b>
                                                        <div class="d-flex my-3">{{ $umkm->pemilik }}
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

                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        {{-- Previous Page Link --}}
                                        @if ($umkms->onFirstPage())
                                            <a href="#" class="rounded disabled">&laquo;</a>
                                        @else
                                            <a href="{{ $umkms->previousPageUrl() }}" class="rounded">&laquo;</a>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @for ($i = 1; $i <= $umkms->lastPage(); $i++)
                                            @if ($i == $umkms->currentPage())
                                                <a href="#" class="active rounded">{{ $i }}</a>
                                            @else
                                                <a href="{{ $umkms->url($i) }}" class="rounded">{{ $i }}</a>
                                            @endif
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($umkms->hasMorePages())
                                            <a href="{{ $umkms->nextPageUrl() }}" class="rounded">&raquo;</a>
                                        @else
                                            <a href="#" class="rounded disabled">&raquo;</a>
                                        @endif
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
