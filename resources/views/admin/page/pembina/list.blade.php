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
                            Pembina
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
                                Tambah Pembina Baru
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
                                <h3 class="card-title">Daftar Pembina</h3>
                            </div>
                            <div class="table-responsive p-3">
                                <table id="pembinaTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Pembina</th>
                                            <th>Gender</th>
                                            <th>Tempat Lahir</th>
                                            <th>Keahlian</th>
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
                    <h5 class="modal-title">Tambah Pembina</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('pembina/_post_pembina') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Nama Pembina</label>
                                <input type="text" class="form-control" name="nama" id="nama" required
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Jenis Kelamin
                                    </option>
                                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required
                                    value="{{ old('tgl_lahir') }}">
                                @error('tgl_lahir')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required
                                    value="{{ old('tmp_lahir') }}">
                                @error('tmp_lahir')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Keahlian</label>
                                <input type="text" class="form-control" name="keahlian" id="keahlian" required
                                    value="{{ old('keahlian') }}">
                                @error('keahlian')
                                    <div>{{ $message }}</div>
                                @enderror
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

                            <div class="col-lg-6">
                                <label class="form-label">Quote</label>
                                <textarea class="form-control" rows="3" name="quote" id="quote"></textarea>
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
                    <h5 class="modal-title">Ubah Pembina</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-pembina-form" action="{{ url('pembina/_update_pembina') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="pembina_id_edit">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Nama Pembina</label>
                                <input type="text" class="form-control" name="nama" id="nama_edit" required
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="gender" id="gender_edit" class="form-control" required>
                                    <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Jenis Kelamin
                                    </option>
                                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir_edit" required
                                    value="{{ old('tgl_lahir') }}">
                                @error('tgl_lahir')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir_edit" required
                                    value="{{ old('tmp_lahir') }}">
                                @error('tmp_lahir')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Keahlian</label>
                                <input type="text" class="form-control" name="keahlian" id="keahlian_edit" required
                                    value="{{ old('keahlian') }}">
                                @error('keahlian')
                                    <div>{{ $message }}</div>
                                @enderror
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

                            <div class="col-lg-6">
                                <label class="form-label">Quote</label>
                                <textarea class="form-control" rows="3" name="quote" id="quote_edit"></textarea>
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
            $('#pembinaTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "{{ url('pembina/_list_pembina') }}",
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
                        data: 'gender',
                    },
                    {
                        data: 'tmp_lahir',
                    },
                    {
                        data: 'keahlian',
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
        });

        $('#pembinaTable').on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var pembinaId = $(this).data('id');
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
                        url: `{{ url('pembina/_delete/') }}/${pembinaId}`,
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
                            $('#pembinaTable').DataTable().ajax.reload();
                        },
                        error: function(error) {
                            console.error('Gagal menghapus data:', error);
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Data gagal dihapus Karena Id Pembina Sudah digunakan di umkm',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });

        $('#pembinaTable').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            var pembinaId = $(this).data('id');

            $.ajax({
                url: `{{ url('pembina/_get_pembina_by_id/') }}/${pembinaId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#pembina_id_edit').val(response.id);
                    $('#nama_edit').val(response.nama);
                    $('#gender_edit').val(response.gender);
                    $('#tgl_lahir_edit').val(response.tgl_lahir);
                    $('#tmp_lahir_edit').val(response.tmp_lahir);
                    $('#keahlian_edit').val(response.keahlian);
                    $('#quote_edit').val(response.quote);
                    $('#rating_edit').val(response.rating);

                    $('#previewImage').attr('src', "{{ asset('images') }}/" + response.image);

                    $('#modal-edit').modal('show');
                },
                error: function(error) {
                    console.error('Gagal mendapatkan data:', error);
                }
            });
        });
    </script>
@endsection
