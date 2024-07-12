@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <div class="container-fluid contact py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-6">
                        <img src="{{ asset('assets/img/login.png') }}" class="img-fluid w-100" alt="">
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ url('auth/_login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="mb-4">Masuk</h1>
                                @if ($errors->any())
                                    <div class="alert alert-danger text-center">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger text-center">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4"
                                    placeholder="Email" required value="{{ old('email') }}">
                                @error('email')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4"
                                    placeholder="Kata Sandi">
                                @error('password')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <span class="mt-3"> Tidak Memiliki Akun?
                                <a href="{{ url('auth/daftar') }}">Daftar</a>
                            </span>
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary mt-3"
                                type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_scripts')
@endsection
