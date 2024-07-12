@extends('admin/template_admin/main')

@section('template_admin_styles')
@endsection

@section('content_admin')
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            UMKM
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah UMKM Baru
                            </a>
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-report" aria-label="Create new report">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row mt-2 g-2 align-items-center">
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
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar UMKM</h3>
                            </div>
                            <div class="table-responsive p-3">
                                <table id="umkmTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Toko</th>
                                            <th>Pemilik</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Pembina</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('umkm/_post_umkm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="text" class="form-control" name="nama" id="nama" required
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Pemilik</label>
                                <input type="text" class="form-control" name="pemilik" id="pemilik" required
                                    value="{{ old('pemilik') }}">
                                @error('pemilik')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" required
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" id="website" required
                                    value="{{ old('website') }}">
                                @error('website')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Provinsi</label>
                                <select id="id_provinsi" name="id_provinsi" class="form-control" required>
                                    <option selected>Provinsi</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Kabupaten/Kota</label>
                                <select id="id_kabkota" name="id_kabkota" class="form-control" required>
                                    <option selected>Kabupaten Kota</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select id="id_kategori" name="id_kategori" class="form-control" required>
                                    <option selected>Kategori</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Pembina</label>
                                <select id="id_pembina" name="id_pembina" class="form-control" required>
                                    <option selected>Pembina</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Rating</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="0">Pilih Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('rating')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Modal</label>
                                <input type="number" class="form-control" name="modal" id="modal" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" required>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi"></textarea>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" id="alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ms-auto">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-umkm-form" action="{{ url('umkm/_update_umkm') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="umkm_id_edit">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="text" class="form-control" name="nama" id="nama_edit" required>
                                @error('nama')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Pemilik</label>
                                <input type="text" class="form-control" name="pemilik" id="pemilik_edit" required>
                                @error('pemilik')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email_edit" required>
                                @error('email')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" id="website_edit" required>
                                @error('website')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Provinsi</label>
                                <select id="id_provinsi_edit" name="id_provinsi" class="form-control" required>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Kabupaten/Kota</label>
                                <select id="id_kabkota_edit" name="id_kabkota" class="form-control" required>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select id="id_kategori_edit" name="id_kategori" class="form-control" required>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Pembina</label>
                                <select id="id_pembina_edit" name="id_pembina" class="form-control" required>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Rating</label>
                                <select name="rating" id="rating_edit" class="form-control" required>
                                    <option value="0">Pilih Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('rating')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Image</label>
                                <img class="mb-2" id="previewImage" src="" width="100px" height="50px"
                                    alt="Preview Image">
                                <input type="file" class="form-control" name="image" id="image_edit">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Modal</label>
                                <input type="number" class="form-control" name="modal" id="modal_edit" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga_edit" required>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi_edit"></textarea>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" id="alamat_edit"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ms-auto">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('template_admin_scripts')
    <script>
        $(document).ready(function() {
            $('#umkmTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "{{ url('umkm/_get_umkm') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                },
                columns: [{
                        data: null,
                        className: 'text-center',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nama',
                    },
                    {
                        data: 'pemilik',
                    },
                    {
                        data: 'harga',
                    },
                    {
                        data: 'kategori_nama',
                    },
                    {
                        data: 'pembina_nama',
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            var deleteLink =
                                `<a href="#" class="btn btn-danger btn-sm delete-btn m-2" data-id="${data}"><i class="bi bi-trash"></i></a>`;
                            var editLink =
                                `<a href="#" class="btn btn-primary btn-sm edit-btn" data-id="${data}"><i class="bi bi-pencil"></i></a>`;
                            return deleteLink + ' ' + editLink;
                        }
                    }

                ]
            });

            getProvinsi();
            getKategori();
            getPembina();
        });

        $('#umkmTable').on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var umkmId = $(this).data('id');
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('umkm/_delete/') }}/${umkmId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                            $('#umkmTable').DataTable().ajax.reload();
                        },
                        error: function(error) {
                            console.error('Gagal menghapus data:', error);
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Data gagal dihapus.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });

        $('#id_provinsi').on('change', function() {
            var provinsiId = $(this).val();
            if (provinsiId) {
                getKota(provinsiId);
            } else {
                $('#id_kabkota').empty();
                $('#id_kabkota').append('<option selected>Kabupaten Kota</option>');
            }
        });

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

        function getKategori() {
            $.ajax({
                url: "{{ url('umkm/_kategori_umkm') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var provinceSelect = $('#id_kategori');
                    provinceSelect.empty();
                    provinceSelect.append('<option selected>Kategori</option>');
                    $.each(data, function(key, value) {
                        let selected = (value.id == "{{ old('id_kategori') }}") ?
                            'selected' : '';
                        provinceSelect.append('<option value="' + value.id + '" ' +
                            selected + '>' + value.nama + '</option>');
                    });
                    if ("{{ old('id_kategori') }}") {
                        getKota("{{ old('id_kategori') }}");
                    }
                }
            });
        }

        function getPembina() {
            $.ajax({
                url: "{{ url('pembina/_pembina') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var provinceSelect = $('#id_pembina');
                    provinceSelect.empty();
                    provinceSelect.append('<option selected>Pembina</option>');
                    $.each(data, function(key, value) {
                        let selected = (value.id == "{{ old('id_pembina') }}") ?
                            'selected' : '';
                        provinceSelect.append('<option value="' + value.id + '" ' +
                            selected + '>' + value.nama + '</option>');
                    });
                    if ("{{ old('id_pembina') }}") {
                        getKota("{{ old('id_pembina') }}");
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


        $('#id_provinsi_edit').on('change', function() {
            var provinsiId = $(this).val();
            if (provinsiId) {
                getKota(provinsiId);
            } else {
                $('#id_kabkota_edit').empty();
                $('#id_kabkota_edit').append('<option selected>Kabupaten Kota</option>');
            }
        });

        $('#umkmTable').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            var umkmId = $(this).data('id');

            $.ajax({
                url: `{{ url('umkm/_get_umkm_by_id/') }}/${umkmId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#umkm_id_edit').val(response.id);
                    $('#nama_edit').val(response.nama);
                    $('#pemilik_edit').val(response.pemilik);
                    $('#email_edit').val(response.email);
                    $('#website_edit').val(response.website);
                    $('#modal_edit').val(response.modal);
                    $('#harga_edit').val(response.harga);
                    $('#alamat_edit').val(response.alamat);
                    $('#rating_edit').val(response.rating);
                    $('#deskripsi_edit').val(response.deskripsi);

                    $('#previewImage').attr('src', "{{ asset('images') }}/" + response.image);

                    getProvinsiEdit(response.provinsi_id);
                    getKategoriEdit(response.kategori_umkm_id);
                    getPembinaEdit(response.pembina_id);
                    getKotaAllEdit(response.kabkota_id);

                    $('#modal-edit').modal('show');
                },
                error: function(error) {
                    console.error('Gagal mendapatkan data:', error);
                }
            });
        });

        $('#id_provinsi_edit').on('change', function() {
            var provinsiId = $(this).val();
            console.log(provinsiId);
            if (provinsiId) {
                getKotaEdit(provinsiId);
            } else {
                $('#id_kabkota_edit').empty();
                $('#id_kabkota_edit').append('<option>Kabupaten Kota</option>');
            }
        });

        $('#image_edit').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        function getProvinsiEdit(id = null) {
            $.ajax({
                url: "{{ url('auth/provinsi') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var provinceSelect = $('#id_provinsi_edit');
                    provinceSelect.empty();
                    provinceSelect.append('<option>Provinsi</option>');
                    $.each(data, function(key, value) {
                        var selected = (id && id == value.id) ? 'selected' : '';
                        provinceSelect.append('<option value="' + value.id + '" ' + selected + '>' +
                            value.nama + '</option>');
                    });
                }
            });
        }

        function getKotaAllEdit(id = null) {
            $.ajax({
                url: "{{ url('auth/_kota') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var provinceSelect = $('#id_kabkota_edit');
                    provinceSelect.empty();
                    provinceSelect.append('<option>Kabupaten/Kota</option>');
                    $.each(data, function(key, value) {
                        var selected = (id && id == value.id) ? 'selected' : '';
                        provinceSelect.append('<option value="' + value.id + '" ' + selected + '>' +
                            value.nama + '</option>');
                    });
                }
            });
        }

        function getKategoriEdit(id = null) {
            $.ajax({
                url: "{{ url('umkm/_kategori_umkm') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var categorySelect = $('#id_kategori_edit');
                    categorySelect.empty();
                    categorySelect.append('<option>Kategori</option>');
                    $.each(data, function(key, value) {
                        var selected = (id && id == value.id) ? 'selected' : '';
                        categorySelect.append('<option value="' + value.id + '" ' + selected + '>' +
                            value.nama + '</option>');
                    });
                }
            });
        }

        function getPembinaEdit(id = null) {
            $.ajax({
                url: "{{ url('pembina/_pembina') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var pembinaSelect = $('#id_pembina_edit');
                    pembinaSelect.empty();
                    pembinaSelect.append('<option>Pembina</option>');
                    $.each(data, function(key, value) {
                        var selected = (id && id == value.id) ? 'selected' : '';
                        pembinaSelect.append('<option value="' + value.id + '" ' + selected + '>' +
                            value.nama + '</option>');
                    });
                }
            });
        }

        function getKotaEdit(provinsiId) {
            $.ajax({
                url: "{{ url('auth/kota') }}/" + provinsiId,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    var citySelect = $('#id_kabkota_edit');
                    citySelect.empty();
                    citySelect.append('<option>Kabupaten Kota</option>');
                    $.each(data, function(key, value) {
                        citySelect.append('<option value="' + value.id + '">' + value.nama +
                            '</option>');
                    });
                }
            });
        }
    </script>
@endsection
