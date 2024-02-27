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
    .video-tittle{
        font-size: 1.1em;
    font-weight: 500;
    }
</style>
<h1 class="heading">Video Gallery</h1>
<div class="gallery-container">

    <div class="image-wrapper">
            <div class="video-item">
           <iframe width="1000" height="200" src="https://www.youtube.com/embed/qBHi8C49Q1Y?si=1YyCoRmnKYx1_627" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h1 class="video-tittle">مومن اباد ٹاون ترقیاتی کام جاری ھے چیرمین ملک عارف</h1>
            </div>
             <div class="video-item">
         <iframe width="1000" height="200" src="https://www.youtube.com/embed/T4IVtdn9O-U?si=lwjJ2l-H4NAQy6ZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h1 class="video-tittle">مومن اباد ٹاون چیرمین میونسپل کمشنر ادھی رات کو خدمت میں</h1>
            </div>
                  <div class="video-item">
        <iframe width="1000" height="200" src="https://www.youtube.com/embed/5JgZ7umhxxM?si=Etmm2vHRUgklFwxA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h1 class="video-tittle">مومن اباد ٹاون کونسل اجلاس انتہائی اہم قراردادیں منظور</h1>
            </div>
    </div>

</div>
@endsection