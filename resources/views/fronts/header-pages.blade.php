@extends('layouts.app')
@section('seo_tags')
<title>{{ ($data->title) }}</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="{{ ($data->title) }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="{{ ($data->title) }}">
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
<div id="carouselExampleIndicators" class="carousel slide">
    <!-- <div class="carousel-indicators">
        @foreach ($data->pageMedia as $key => $media)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        @endforeach
    </div> -->
    <div class="carousel-inner">
        @foreach ($data->pageMedia as $key => $media)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
            <img src="{{ asset('uploads/content/' . $media->file_name) }}" class="d-block w-100"
                alt="{{ $media->file_name }}">
        </div>
        @endforeach
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> -->
</div>


{!! base64_decode($data->description) !!}


<!-- <div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contentalert"></div>
                <form class="contentform" action="{{ route('front.content.update') }}">
                    <input type="hidden" name="content_id" class="form-control" id="content_id">
                    <div class="form-group">
                        <label for="content-text" class="col-form-label">Content:</label>
                        <textarea class="form-control" name='content_text' id="content-text"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </form>
            </div>



        </div>
    </div>
</div>

<div class="modal fade" id="imageContentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Media File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="mediaalert"></div>
                <form class="mediaform" action="{{ route('front.content.update-image') }}">
                    <input type="hidden" name="media_id" class="form-control" id="media_id">
                    <div class="form-group">
                        <input id="image" type="file" accept="images/*" name="image" class="">
                        <div class="user_profile_add">
                            <img src="" class="media_previewer" id="output" />
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </form>
            </div>



        </div>
    </div>
</div> -->
@endsection

@section('script')
<!-- <script src="{{ asset('assets/js/about.js') }}"></script>
<script>
    jQuery(document).on('change', '#image', function (e) {
        let file = e.target.files[0];
        jQuery('#output').attr('src', URL.createObjectURL(file));
    })

</script> -->
@endsection
