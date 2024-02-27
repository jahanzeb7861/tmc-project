@extends('layouts.app')
@section('content')
<style>
    .heading {
        font-size: 64px;
        font-weight: 500;
        margin-bottom: 20px;
        text-align: center;
        color:var(--dark-green);
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
</style>
<h1 class="heading">Gallery</h1>
<div class="gallery-container">

    <div class="image-wrapper">
        @for ($i = 0; $i < 12; $i++)
            <div class="image-item">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Image">
                <h1>Logo {{ $i + 1 }}</h1>
            </div>
        @endfor
    </div>

</div>
@endsection