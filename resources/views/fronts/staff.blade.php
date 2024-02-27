@extends('layouts.app')
@section('content')
    <style>
        .staff-page .box {

            border: 2px solid #22574D;
            padding: 20px 40px;
            text-align: center;
        }

        .staff-page img {
            width: 80%;
            height: 200px;
            padding-bottom: 10px;
            aspect-ratio: 3/2;
            border-radius: 5px;

        }

        .staff-page .Staff {
            font-size: 50px;
            font-family: Arial, Helvetica, sans-serif;
            color: #22574D;
        }

        .staff-page h1 {
            font-size: 50px !important;
            font-family: revert-layer !important;
            font-weight: 700 !important;
        }

        .staff-page h3,
        .staff-page p {
            font-size: medium !important;
            font-family: revert-layer !important;
            font-weight: 700 !important;
        }
            .orgoheading{
                font-size:45px;
                font-weight:600;
                    padding: 30px;
            }
            center {
    padding: 30px;
}
    </style>
    <div class="staff-page">
        <div class="container">

            <center>
                           <h1 clas="orgoheading">Head Of Department</h1>
            </center>
            <div class="row ">
                @if (!empty($staff))
                    <!-- Box 1 -->
                    @foreach ($staff as $item)
                        <div class="col-md-3 py-3">
                            <div class="box">
                                <img src="{{ asset('uploads/teams/' . $item->image) }}" alt="Image 1">
                                <h3>{{ $item->designation }}</h3>
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Staff not found</p>
                @endif
            </div>
        </div>
    </div>

@endsection
