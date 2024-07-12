@extends('admin/template_admin/main')

@section('template_admin_styles')
@endsection

@section('content_admin')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Dashboard
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kelompok UMKMnesia</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>NIM
                                            </th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Nomer WhatsApp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-secondary">0110223161</span></td>
                                            <td>Agas Triawan</td>
                                            <td>
                                                Tapos, Depok
                                            </td>
                                            <td>
                                                088295747113
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-secondary">0110223143</span></td>
                                            <td>Arby Ali Amaludin</td>
                                            <td>
                                                Cibinong, Bogor
                                            </td>
                                            <td>
                                                081295563905
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-secondary">0110223153</span></td>
                                            <td>Egi Vrinaldi A</td>
                                            <td>
                                                Citayam, Depok
                                            </td>
                                            <td>
                                                089509929298
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-secondary">0110223151</span></td>
                                            <td>Kafi Rijal</td>
                                            <td>
                                                Cilodong, Depok
                                            </td>
                                            <td>
                                                085156629197
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-secondary">0110223304</span></td>
                                            <td>Zhairan Ahmad</td>
                                            <td>
                                                Bojong Gede, Bogor
                                            </td>
                                            <td>
                                                085814155342
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_admin_scripts')
@endsection
