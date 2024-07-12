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
                            Kategori
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
                                Tambah Kategori Baru
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
                                <h3 class="card-title">Daftar Kategori</h3>
                            </div>
                            <div class="table-responsive p-3">
                                <table id="kategoriTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kategori</th>
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
                    <h5 class="modal-title">Tambah kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('kategori/_post_kategori') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" id="nama" required
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div>{{ $message }}</div>
                                @enderror
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
                    <h5 class="modal-title">Ubah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-kategori-form" action="{{ url('kategori/_update_kategori') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="kategori_id_edit">

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" id="nama_edit" required
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div>{{ $message }}</div>
                                @enderror
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
            $('#kategoriTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "{{ url('kategori/_list_kategori') }}",
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

        $('#kategoriTable').on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var kategoriId = $(this).data('id');
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
                        url: `{{ url('kategori/_delete/') }}/${kategoriId}`,
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
                            $('#kategoriTable').DataTable().ajax.reload();
                        },
                        error: function(error) {
                            console.error('Gagal menghapus data:', error);
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Data gagal dihapus Karena Id Kategori Sudah digunakan di umkm',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });

        $('#kategoriTable').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            var kategoriId = $(this).data('id');

            $.ajax({
                url: `{{ url('kategori/_get_kategori_by_id/') }}/${kategoriId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#kategori_id_edit').val(response.id);
                    $('#nama_edit').val(response.nama);

                    $('#modal-edit').modal('show');
                },
                error: function(error) {
                    console.error('Gagal mendapatkan data:', error);
                }
            });
        });
    </script>
@endsection
