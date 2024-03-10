@extends('layouts.app')
@section('seo_tags')
<meta name="description" content="{{ base64_decode($data->short_description) }}">
<meta name="keywords" content="{{($data->keywords)}}">
<title>{{ ($data->title) }}</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="{{ ($data->title) }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">
<meta property="og:image" content="{{ asset('uploads/content/' . $data->postMedia[0]->file_name) }}">
<meta property="og:description" content="{{ base64_decode($data->short_description) }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="{{ ($data->title) }}">
<meta name="twitter:description" content="{{ base64_decode($data->short_description) }}">
<meta name="twitter:image" content="{{ asset('uploads/content/' . $data->postMedia[0]->file_name) }}">
@endsection
@section('content')
<style>
    .detail-content p,
    .detail-content span,
    .detail-content h1,
    .detail-content h2,
    .detail-content h3,
    .detail-content h4,
    .detail-content h5,
    .detail-content h6 {
        font-size: 15px !important;
        font-family: 'Inter', sans-serif !important;
        font-size: var(--font-size) !important;
    }

</style>

@if ($data->category != 15)
<div class="main pt-2">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12 main-area">
                <!-- filter -->
                <x-AsideComponent />

                <!-- main section -->
                <div class="slides px-2">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach ($data->postMedia as $key => $media)
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                aria-label="Slide 1"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($data->postMedia as $key => $media)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                <img src="{{ asset('uploads/content/' . $media->file_name) }}" class="d-block w-100"
                                    alt="{{ $media->file_name }}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- content -->
                    <div class="content-area-head py-2">
                        <h4>{{ ($data->title) }}</h4>
                        <p>
                            {{ base64_decode($data->short_description) }}
                        </p>

                        <p>
                            {!! base64_decode($data->description) !!}
                        </p>
                    </div>

                </div>

                <!-- news -->
                <x-Announcement />
            </div>
        </div>

    </div>
</div>
@endif

@if ($data->category == 15)

<div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach ($data->postMedia as $key => $media)
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                aria-label="Slide 1"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($data->postMedia as $key => $media)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                <img src="{{ asset('uploads/content/' . $media->file_name) }}" class="d-block w-100"
                                    alt="{{ $media->file_name }}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

<p>
    {!! base64_decode($data->description) !!}
</p>

<!-- <main class="py-1">
    <style>
        body {
            overflow-x: hidden !important;
        }

    </style>
    <div class="section section-contents bg-light section-pad">
        <div class="row"
            style="background: url(https://staging.tmcsaddar.gos.pk/uploads/content/inner-hd-new.jpg);
        background-position: center center; background-repeat: no-repeat; background-size: cover; height: 300px; width: 110%; margin-top:-85px;">
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Pay my taxes</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum. </p>
                </div>
            </div>
        </div>
    </div>

</main> -->
@endif

@if ($data->is_faq == 'on' && !empty($data->faq_details))
<div class="accordion acc" id="accordionExample">
    @foreach ($data->faq_details as $key => $faq)
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                {{ $faq->question }}
            </button>
        </h2>
        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                {{ $faq->answer }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="container-fluid last-can d-none">
    <h4>Admissions</h4>
    <p class="last">Interested in becoming a part of the TMC Karachi family? Learn more about our admission process,
        requirements, and key dates to start your journey with us.

        At TMC Karachi, we are dedicated to providing an educational experience that goes beyond textbooks, preparing
        students to excel in a rapidly evolving world. Join us as we embark on a journey of knowledge, growth, and
        success.</p>
</div>
</div>
@endsection
