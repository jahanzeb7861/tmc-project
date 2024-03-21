@extends('layouts.app')
@section('seo_tags')
<title>Events</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="Events">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="Events">
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
    <h1 class="heading"
        style="margin-top: 20px; color: var(--dark-green); margin-left: 25px; font-size: 64px; font-weight: 500; margin-bottom: 20px; text-align: center">
        Events</h1>
    <div class="gallery-container"
        style="max-width: 90%; margin: 20px auto; padding: 20px; background-color: rgb(255, 255, 255); border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px">
        <div class="image-wrapper" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px">
            @foreach ($events as $key => $event)

                <div class="image-item" style="width: calc(15% - 10px); margin-bottom: 20px; overflow: hidden"><img
                        src="{{ asset('uploads/content/' . @$event->eventMedia[0]->file_name) }}"
                        style="width: 100%;" alt="{{ @$event->eventMedia[0]->file_name }}">
                    <h1 style="margin-top: 20px; color: black; margin-left: 25px; font-size: 1em">{{$event->title}}</h1>
                </div>

            @endforeach
        </div>
    </div>
</main>


@endsection

@section('script')

@endsection
