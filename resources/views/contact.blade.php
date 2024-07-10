@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Kontak Start -->
    <div class="container-fluid contact py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <h1 class="text-primary">Kontak</h1>
                            <p class="mb-4">Hubungi kami</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="h-100 rounded">
                            <iframe class="rounded w-100" style="height: 400px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3175618529776!2d106.83004867355626!3d-6.352919162148884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec6b07b68ea5%3A0x17da46bdf9308386!2sSTT%20Terpadu%20Nurul%20Fikri%20-%20Kampus%20B!5e0!3m2!1sen!2sid!4v1720278556916!5m2!1sen!2sid"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    {{-- <div class="col-lg-7">
                        <form action="" class="">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Nama Lengkap">
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Email">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Nama UMKM">
                            <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Informasi UMKM"></textarea>
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                type="submit">Submit</button>
                        </form>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Alamat</h4>
                                <p class="mb-2">Jl. Raya Lenteng Agung No.20-21, RT.4/RW.1, Srengseng Sawah, Kec.
                                    Jagakarsa, Jakarta Selatan,</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Email</h4>
                                <p class="mb-2">umkmnesia@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>No. Telpon</h4>
                                <p class="mb-2">(+62) 85156629197</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kontak End -->
@endsection

@section('template_scripts')
@endsection
