@extends('layouts.app')
@section('seo_tags')
<title>Press List</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="Press List">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="Press List">
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
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 100vw;
            margin: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #22574D !important;
            color: #ecf0f1;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .container {
            padding-left: 50px;
            padding-right: 130px;
        }

        .orgoheading {
            font-size: 45px;
            font-weight: 600;
        }

        center {
            padding: 30px;
        }

    </style>



    <div class="container">
        <center>
            <h1 clas="orgoheading">Press List</h1>
        </center>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>More Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($press as $index => $press)
                <tr>
                    <td>{{ $press->description }}</td>
                    <td>{{ $press->date }}</td>
                    <td>
                        @if($press->pdf_file)
                            <a href="{{ asset('uploads/pdf/' . $press->pdf_file) }}" download>
                                View PDF
                            </a>
                        @else
                            No PDF available
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</main>


@endsection

@section('script')

@endsection
