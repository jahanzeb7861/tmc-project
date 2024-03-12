@extends('layouts.app')
@section('seo_tags')
<title>Map</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="Map">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="Map">
@endsection
@section('content')

<div class="banner">
    <img alt="Banner Image" data-id="26"  src="{{ asset('uploads/content/' . $data->file) }}">
</div>

@endsection

@section('script')

@endsection
