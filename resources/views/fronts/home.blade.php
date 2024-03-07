@extends('layouts.app')

@section('content')
<style>
    .container {
        display: flex;
        justify-content: space-around;
        padding: 20px;
    }

    .column {
        flex: 1;
        text-align: center;
        /*padding: 20px;*/
        border: 1px solid #22574D;
        border-radius: 10px;
        margin: 10px;
    }

    .image {
        width: 100%;
        max-width: 500px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .title {
        font-size: 25px;
        font-weight: bold;
        color: black;
        padding: 10px;
    }

    img.d-block.w-100.muu {
        object-fit: cover;
        height: 450px;
    }

    .outer-box {
        margin: 15px 0;
        border: 2px solid #22574d;
        border-radius: 10px;
    }

    .outer-box a img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
    }

</style>
<div class="main pt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 main-area">
                <!-- filter -->
                <x-AsideComponent />
                <!-- main section -->
                <div class="main-section order-lg-2 order-3 w-100">
                    <div class="container-fluid">
                        <x-QuickCategory />
                        @if (!empty(@$BannerPost))
                        <div class="row justify-content-center ">
                            <div class="col-xl-8 col-12 mb-3">
                                <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
                                    <div class="carousel-inner ">
                                        @foreach ($BannerPost->postMedia as $key => $media)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img alt="{{ $media->file_name }}"
                                                src="{{ asset('uploads/content/' . $media->file_name) }}" alt=""
                                                class="w-100 " />
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12  mt-xl-3 mt-0 mb-3">
                                <div class=" council-card h-100">
                                    {{ @($BannerPost->title) }}
                                    <br /><br />
                                    <p class="Agenda m-0 p-0 text-light">
                                        {{ @base64_decode($BannerPost->short_description) }}</p>
                                    <br /><br />
                                    <a style="gap:5px"
                                        class="btn btn-success d-flex justify-content-center align-items-center"
                                        href="{{ route('fronts.detail-view', ['slug' => $BannerPost['slug']]) }}">

                                        Read More

                                        <i class="bi bi-arrow-right-circle-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                <!-- news -->
                <x-Announcement />
            </div>
        </div>

        <div class="container-crousel px-4">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    @foreach ($data->bannerMedia as $key => $media)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($data->bannerMedia as $key => $media)
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
        </div>

        <!-- <div class="container-crousel px-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('assets/images/Hospital/Hospital 3.jpeg') }}" class="d-block w-100 muu" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/images/collage/collage1.jpeg') }}" class="d-block w-100 muu" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/images/Museum/Museum1.jpg') }}" class="d-block w-100 muu" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
     </div> -->


        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-md-12">
                    <h2 class="title_heading text-center">Services</h2>
                </div>

                <!--@foreach ($posts as $post)-->
                <!--    <div class="col-xl-3 col-lg-4 col-md-6  mb-3 flip-images" >-->
                <!--        <a href="{{ route('fronts.detail-view', ['slug' => $post['slug']]) }}"-->
                <!--            class="flip-card d-block bg-white">-->
                <!--            @if(isset($post->postMedia[0]))-->
                <!--                <img alt="{{ $post->postMedia[0]->file_name }}"-->
                <!--                     src="{{ asset('uploads/content/' . $post->postMedia[0]->file_name) }}"-->
                <!--                     class="img-fluid"   />-->
                <!--            @else-->
                <!--                <img alt=""-->
                <!--                     src="{{ asset('uploads/website/logo.png') }}"-->
                <!--                     class="img-fluid" />-->
                <!--            @endif-->
                <!--            <div class="flip-card-content">-->
                <!--                <h1 style="color: #22574d;">{{ @($post->title) }}</h1>-->
                <!--                <p style="color: #000000; font-weight: 400;">{{ @base64_decode($post->short_description) }}</p>-->
                <!--            </div>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--@endforeach-->

                @foreach ($posts as $post)
                <div class="col-md-4 ">
                    <div class="outer-box">
                        <a href="{{ route('fronts.detail-view', ['slug' => $post['slug']]) }}">
                            @if(isset($post->postMedia[0]))
                            <img alt="{{ $post->postMedia[0]->file_name }}"
                                src="{{ asset('uploads/content/' . $post->postMedia[0]->file_name) }}"
                                class="img-fluid" />
                            @else
                            <img alt="" src="{{ asset('uploads/website/logo.png') }}" class="img-fluid" />
                            @endif
                        </a>
                        <div class="title">
                            <h4 style="color: #22574d;">{{ @($post->title) }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row d-none">
                <div class="col-lg-12 px-0">
                    <div id="WhatsOnBlock" class="space-below noFeedback">
                        <div id="WhatsOnBlockInner">
                            <div id="WhatsOnBlockText ">
                                Find out what’s on in Karachi with all the latest events,<br> restaurants, shops and
                                things to do.
                                <a href="" tabindex="0">Visit What’s On&nbsp;<i
                                        class="bi bi-arrow-right-circle-fill ms-3 text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 mt-3">
                        <div href="" class="flip-card flip-card2">
                            <img src="assets/images/sk1.jpg" alt="" class="img-fluid" />
                            <div class="flip-card-content">
                                <h1>Neighbourhood portals</h1>
                                <p>Your one-stop shop for neighbourhood information</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-3">
                        <div href="" class="flip-card flip-card2">
                            <img src="assets/images/sk2.jpg" alt="" class="img-fluid" />
                            <div class="flip-card-content">
                                <h1>Neighbourhood portals</h1>
                                <p>Your one-stop shop for neighbourhood information</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-3">
                        <div href="" class="flip-card flip-card2">
                            <img src="assets/images/sk1.jpg" alt="" class="img-fluid" />
                            <div class="flip-card-content">
                                <h1>Neighbourhood portals</h1>
                                <p>Your one-stop shop for neighbourhood information</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-3">
                        <div href="" class="flip-card flip-card2">
                            <img src="assets/images/sk1.jpg" alt="" class="img-fluid" />
                            <div class="flip-card-content">
                                <h1>Neighbourhood portals</h1>
                                <p>Your one-stop shop for neighbourhood information</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!--<x-EventsComponent />-->

            <section class="d-none">
                <div class="container d-flex flex-column align-items-center justify-content-center mt-5">
                    <div class="col-lg-8 col-md-12 col-12 text-center py-3 dck-footer">
                        <h5 class="dck-footer-h5"><strong>Quick Links</strong>:
                            <a href="#" class="quick-links">Local goverment<span>,</span></a>
                            <a href="#" class="quick-links">Click<span>,</span></a>
                            <a href="#" class="quick-links">SWEEP<span>,</span></a>
                            <a href="#" class="quick-links">KDA<span>,</span></a>
                            <a href="#" class="quick-links">KWSB<span></span></a>
                        </h5>
                        <!-- <div class="citizen_complain mt-3">
                                                                                    <a class="mt-4"
                                                                                        href="http://1339.gos.pk/">Citizen
                                                                                        Complaint # 1339</a>
                                                                                </div> -->
                    </div>
                    <div class="col-lg-8 col-md-12 col-12 d-flex flex-column align-items-center justify-content-center">
                        <div class="my-4 text-dark">
                            <p>© 2022 District Council Karachi, <span style="display: none;">DEVELOPED BY </span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="py-4 mt-3 bg-section d-none">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="d-flex align-items-start">
                                <div>
                                    <img src="assets/images/download.png" alt="" class="mt-1" width="80">
                                    <img src="assets/images/download.png" alt="" width="80" class="mt-1">
                                </div>
                                <p class="ms-3 f-14 mb-0 pb-0">
                                    Saddar is a commercial and residential area in the heart of Karachi, known for
                                    its bustling markets, shops, and historical landmarks. If you have a specific
                                    question or need information about a particular aspect of TMC Saddar or any
                                    recent developments,
                                    I recommend contacting local authorities or conducting an online search for the
                                    most up-to-date information.
                                    <br> Saddar is a commercial and residential area in the heart of Karachi, known
                                    for its bustling markets, shops, and historical landmarks. If you have a
                                    specific question or need information about a particular aspect
                                    of TMC Saddar or any recent developments, I recommend contacting local
                                    authorities or conducting an online search for the most up-to-date information.
                                </p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="container">-->
    <!--    <div class="col-md-2" style="border: none !important;">-->
    <!--        </div>-->

    <!--    <div class="column">-->
    <!--        <a href="/shelter" target="_blank"> -->
    <!--            <img class="image" src="{{ asset('assets/images/animal.jpg') }}" alt="Premium Image 1">-->
    <!--        </a>-->
    <!--        <div class="title">Animal Shelters</div>-->
    <!--    </div>-->

    <!--    <div class="column">-->
    <!--        <a href="/elder" target="_blank">  -->
    <!--            <img class="image" src="{{ asset('assets/images/old.jpg') }}" alt="Premium Image 2">    -->
    <!--        </a>-->
    <!--        <div class="title">Old Age Home </div>-->
    <!--    </div>-->

    <!--    <div class="col-md-2" style="border: none !important;">-->
    <!--<a href="/elder" target="_blank">  -->
    <!--    <img class="image" src="{{ asset('assets/images/old.jpg') }}" alt="Premium Image 2">    -->
    <!--</a>-->
    <!--<div class="title">Old Age Home </div>-->
    <!--    </div>-->

    <!--</div>-->

</div>
@endsection
