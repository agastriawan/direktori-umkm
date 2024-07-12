@extends('admin/template_admin/main')

@section('template_admin_styles')
@endsection

@section('content_admin')
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Profile User
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="row g-2 p-5">
                            <div class="col-12 col-md-12 d-flex flex-column">
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
                                <form action="{{ url('settings/_update_user') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="card-body">
                                        <h3 class="card-title">Foto Profile</h3>
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <span class="avatar avatar-xl"
                                                    style="background-image: url({{ asset('images') . '/' . $user->image ?? './static/avatars/000m.jpg' }})"></span>
                                                <input class="form-control mt-2" type="file" name="image">
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-4">
                                            <h3>Detail Profile</h3>
                                            <div class="col-md-6">
                                                <div class="form-label">Nama</div>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-label">Email</div>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $user->email }}">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-label">Jenis Kelamin</div>
                                                <select class="form-control" name="jenis_kelamin">
                                                    <option value="">Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-label">Nomer Telepon</div>
                                                <input type="text" name="no_telp" class="form-control"
                                                    value="{{ $user->no_telp }}">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Provinsi</label>
                                                <select id="id_provinsi" name="id_provinsi" class="form-control" required>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Kabupaten/Kota</label>
                                                <select id="id_kabkota" name="id_kabkota" class="form-control" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-4">
                                            <h3>Ubah Password</h3>
                                            <div class="col-md-6">
                                                <div class="form-label">Password</div>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-label">Konfirmasi Password</div>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent mt-auto">
                                        <div class="btn-list justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_admin_scripts')
    <script>
        $(document).ready(function() {
            getProvinsi();
            getKotaAll();
        });

        var user = @json($user);

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
                        let selected = (value.id == user.id_provinsi) ? 'selected' : '';
                        provinceSelect.append('<option value="' + value.id + '" ' + selected + '>' +
                            value.nama + '</option>');
                    });
                    if (user.id_provinsi) {
                        getKotaAll(user.id_provinsi);
                    }
                }
            });
        }

        $('#id_provinsi').on('change', function() {
            var provinsiId = $(this).val();
            if (provinsiId) {
                getKota(provinsiId);
            }
        });

        function getKotaAll() {
            $.ajax({
                url: "{{ url('auth/_kota') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var kotaSelect = $('#id_kabkota');
                    kotaSelect.empty();
                    kotaSelect.append('<option>Kabupaten/Kota</option>');
                    $.each(data, function(key, value) {
                        var selected = (value.id == user.id_kabkota) ? 'selected' : '';
                        kotaSelect.append('<option value="' + value.id + '" ' + selected + '>' + value
                            .nama + '</option>');
                    });
                }
            });
        }

        $('#id_provinsi').on('change', function() {
            var provinsiId = $(this).val();
            if (provinsiId) {
                getKota(provinsiId); 
            } else {
                $('#id_kabkota').empty().append(
                '<option>Kabupaten/Kota</option>'); 
            }
        });

        function getKota(provinsiId) {
            $.ajax({
                url: "{{ url('auth/kota') }}/" + provinsiId,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var kotaSelect = $('#id_kabkota');
                    kotaSelect.empty();
                    kotaSelect.append('<option>Kabupaten/Kota</option>');
                    $.each(data, function(key, value) {
                        kotaSelect.append('<option value="' + value.id + '">' + value.nama +
                            '</option>');
                    });
                }
            });
        }
    </script>
@endsection
