@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <div class="container-fluid contact py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="p-5 bg-light rounded">
                <form action="{{ url('auth/_register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Daftar Akun</h1>
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
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="name" id="name" class="w-100 form-control border-0 py-3"
                                placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                            @error('name')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <input type="email" id="email" name="email" class="w-100 form-control border-0 py-3"
                                value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <input type="number" name="no_telp" id="no_telp" class="w-100 form-control border-0 py-3"
                                placeholder="No Telp" value="{{ old('no_telp') }}" required>
                            @error('no_telp')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-select w-100 form-control border-0 py-3" required>
                                <option value="" {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>Jenis Kelamin
                                </option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <select name="id_role" id="role" class="form-select w-100 form-control border-0 py-3"
                                required>
                                <option value="">Role</option>
                            </select>
                            @error('role')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <input type="password" name="password" id="password" class="w-100 form-control border-0 py-3"
                                placeholder="Kata Sandi" required>
                            @error('password')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-100 form-control border-0 py-3" placeholder="Konfirmasi Kata Sandi" required>
                            @error('password_confirmation')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mt-3">
                        <h3>Alamat</h3>
                        <div class="col-lg-6">
                            <select id="id_provinsi" name="id_provinsi"
                                class="form-select w-100 form-control border-0 py-3 mb-4">
                                <option selected>Provinsi</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <select id="id_kabkota" name="id_kabkota"
                                class="form-select w-100 form-control border-0 py-3 mb-4">
                                <option selected>Kabupaten Kota</option>
                            </select>
                        </div>
                    </div>
                    <span class="mt-3"> Sudah Memiliki Akun?
                        <a href="{{ url('auth/login') }}">Masuk</a>
                    </span>
                    <div class="col-lg-2 mt-3">
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                            type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('template_scripts')
    <script>
        $(document).ready(function() {
            let token = $('meta[name="csrf-token"]').attr('content');

            function getProvinsi() {
                $.ajax({
                    url: "{{ url('auth/provinsi') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(data) {
                        var provinceSelect = $('#id_provinsi');
                        provinceSelect.empty();
                        provinceSelect.append('<option selected>Provinsi</option>');
                        $.each(data, function(key, value) {
                            let selected = (value.id == "{{ old('id_provinsi') }}") ?
                                'selected' : '';
                            provinceSelect.append('<option value="' + value.id + '" ' +
                                selected + '>' + value.nama + '</option>');
                        });
                        if ("{{ old('id_provinsi') }}") {
                            getKota("{{ old('id_provinsi') }}");
                        }
                    }
                });
            }

            function getRole() {
                $.ajax({
                    url: "{{ url('auth/_role') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(data) {
                        var provinceSelect = $('#role');
                        provinceSelect.empty();
                        provinceSelect.append('<option selected>Role</option>');
                        $.each(data, function(key, value) {
                            let selected = (value.id == "{{ old('role') }}") ?
                                'selected' : '';
                            provinceSelect.append('<option value="' + value.id + '" ' +
                                selected + '>' + value.role + '</option>');
                        });
                        if ("{{ old('role') }}") {
                            getKota("{{ old('role') }}");
                        }
                    }
                });
            }

            function getKota(provinsiId) {
                $.ajax({
                    url: "{{ url('auth/kota') }}/" + provinsiId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(data) {
                        var citySelect = $('#id_kabkota');
                        citySelect.empty();
                        citySelect.append('<option selected>Kabupaten Kota</option>');
                        $.each(data, function(key, value) {
                            let selected = (value.id == "{{ old('id_kabkota') }}") ?
                                'selected' : '';
                            citySelect.append('<option value="' + value.id + '" ' + selected +
                                '>' + value.nama + '</option>');
                        });
                    }
                });
            }

            getRole();
            getProvinsi();
            $('#id_provinsi').on('change', function() {
                var provinsiId = $(this).val();
                if (provinsiId) {
                    getKota(provinsiId);
                } else {
                    $('#id_kabkota').empty();
                    $('#id_kabkota').append('<option selected>Kabupaten Kota</option>');
                }
            });
        });
    </script>
@endsection
