@extends('template/main')

@section('template_styles')
@endsection

@section('content')
    <!-- Pembina Start -->
    <div class="container-fluid testimonial py-5 mt-5">
        <div class="container py-5 mt-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Pembina</h4>
                <h1 class="display-10 mb-5 text-dark">Pembina Kami yang Berpengalaman</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @if (!empty($pembinas))
                    @foreach ($pembinas as $pembina)
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                    style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0">{{ $pembina->quote }}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">
                                        <img src={{ asset('images') . '/' . $pembina->image }} class="img-fluid rounded"
                                            style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="ms-4 d-block">
                                        <h4 class="text-dark">{{ $pembina->nama }}</h4>
                                        <p class="m-0 pb-3">Pembina UMKM</p>
                                        <div class="d-flex pe-5">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $pembina->rating)
                                                    <i class="fas fa-star text-primary"></i>
                                                @else
                                                    <i class="fas fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Pembina End -->
@endsection

@section('template_scripts')
@endsection
