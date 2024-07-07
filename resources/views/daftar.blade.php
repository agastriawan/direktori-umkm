@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Kontak Start -->
    <div class="container-fluid contact py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="p-5 bg-light rounded">
                <form action="" class="">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Daftar Akun</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Nama Lengkap">
                            <input type="number" class="w-100 form-control border-0 py-3 mb-4" placeholder="No Telp">
                            <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Kata Sandi">
                        </div>
                        <div class="col-lg-6">
                            <select class="form-select w-100 form-control border-0 py-3 mb-4">
                                <option selected>Jenis Kelamin</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Email">
                            <input type="password" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder="Konfirmasi Kata Sandi">
                        </div>
                    </div>
                    <div class="row g-4">
                        <h3>Alamat</h3>
                        <div class="col-lg-6">
                            <select class="form-select w-100 form-control border-0 py-3 mb-4">
                                <option selected>Provinsi</option>
                                <option value="1">Jawa Barat</option>
                                <option value="2">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-select w-100 form-control border-0 py-3 mb-4">
                                <option selected>Kabupaten Kota</option>
                                <option value="1">Bandung</option>
                                <option value="2">Surabaya</option>
                            </select>
                        </div>
                    </div>
                    <span class="mt-3"> Sudah Memiliki Akun?
                        <a href="{{ url('login') }}">Masuk</a>
                    </span>
                    <div class="col-lg-2 mt-3">
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                            type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Kontak End -->
@endsection

@section('template_scripts')
@endsection
