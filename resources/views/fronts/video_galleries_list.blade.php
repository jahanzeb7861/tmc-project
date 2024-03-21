@extends('layouts.app')
@section('seo_tags')
<title>Video Gallery</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="Video Gallery">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_Video">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="Video Gallery">
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

<main class="py-1">
    <style>
        .heading {
            font-size: 64px;
            font-weight: 500;
            margin-bottom: 20px;
            text-align: center;
            color: var(--dark-green);
        }

        .gallery-container {
            max-width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
        }

        .image-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .image-item {
            width: calc(15% - 10px);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .image-item img {
            width: 70%;
            height: auto;
            border-radius: 6px;
        }

        h1 {
            margin-top: 20px;
            color: black;
            margin-left: 25px;
            font-size: 1em;

        }

        .video-item {
            width: calc(25% - 15px);
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }

        .video-item video {
            width: 100%;
            height: 200px;
            border-radius: 6px;
        }

        .video-tittle {
            font-size: 1.1em;
            font-weight: 500;
        }

    </style>
    <h1 class="heading">Video Gallery</h1>
    <div class="gallery-container">

        <div class="image-wrapper">
            @foreach ($videoGalleries as $key => $videoGallery)
            <div class="video-item">
                <iframe width="1000" height="200" src="{{$videoGallery->address}}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen=""></iframe>
                <h1 class="video-tittle">{{$videoGallery->title}}</h1>
            </div>
            @endforeach

            <!-- <div class="video-item">
         <iframe width="1000" height="200" src="https://www.youtube.com/embed/T4IVtdn9O-U?si=lwjJ2l-H4NAQy6ZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                <h1 class="video-tittle">مومن اباد ٹاون چیرمین میونسپل کمشنر ادھی رات کو خدمت میں</h1>
            </div>
                  <div class="video-item">
        <iframe width="1000" height="200" src="https://www.youtube.com/embed/5JgZ7umhxxM?si=Etmm2vHRUgklFwxA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                <h1 class="video-tittle">مومن اباد ٹاون کونسل اجلاس انتہائی اہم قراردادیں منظور</h1>
            </div> -->
        </div>

    </div>
</main>

<!-- <main class="py-1">
    <h1 class="heading"
        style="margin-top: 20px; color: var(--dark-green); margin-left: 25px; font-size: 64px; font-weight: 500; margin-bottom: 20px; text-align: center">
        Video Gallery</h1>
    <div class="gallery-container"
        style="max-width: 90%; margin: 20px auto; padding: 20px; background-color: rgb(255, 255, 255); border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px">
        <div class="image-wrapper" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px">
            @foreach ($videoGalleries as $key => $videoGallery)

                <div class="image-item" style="width: calc(15% - 10px); margin-bottom: 20px; overflow: hidden"><img
                        src="{{ asset('uploads/content/' . @$videoGallery->videoGalleryMedia[0]->file_name) }}"
                        style="width: 100%;" alt="{{ @$videoGallery->videoGalleryMedia[0]->file_name }}">
                    <h1 style="margin-top: 20px; color: black; margin-left: 25px; font-size: 1em">{{$videoGallery->title}}</h1>
                </div>

            @endforeach
        </div>
    </div>
</main> -->


@endsection

@section('script')

@endsection
