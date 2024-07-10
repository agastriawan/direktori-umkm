@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Form Start -->
    <div class="container-fluid contact py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-6">
                        <img src="{{ asset('assets/img/login.png') }}" class="img-fluid w-100" alt="">
                    </div>
                    <div class="col-lg-6">
                        <form action="" class="">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="mb-4">Masuk</h1>
                            </div>
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Email">
                            <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Kata Sandi">
                            <span class="mt-3"> Tidak Memiliki Akun?
                                <a href="{{ url('daftar') }}">Daftar</a>
                            </span>
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary mt-3"
                                type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection

@section('template_scripts')
@endsection
