@extends('layouts.app')
@section('seo_tags')
<title>Careers List</title>

<!-- Open Graph (OG) meta tags for social media -->
<meta property="og:title" content="Careers List">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('fronts.home') }}">

<!-- Twitter meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
<meta name="twitter:title" content="Careers List">
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
            <h1 clas="orgoheading">Careers List</h1>
        </center>

        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Details</th>
                    <th>Advertisement Date</th>
                    <th>Closing Date</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($careers as $index => $career)
                <tr>
                    <td>{{ $career->position }}</td>
                    <td>{{ $career->details }}</td>
                    <td>{{ $career->ad_date }}</td>
                    <td>{{ $career->closing_date }}</td>
                    <td>
                        <a href="#" class="view-details" data-bs-toggle="modal" data-bs-target="#careerDetailsModal" data-details="{{ $career->details }}">View Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="careerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="careerDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="careerDetailsModalLabel">Career Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="careerDetailsBody"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</main>


@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.view-details').click(function (e) {
            e.preventDefault();
            var details = $(this).data('details');
            $('#careerDetailsBody').text(details);

            $('.modal-backdrop').removeClass('modal-backdrop');
            // Add the modal class to the modal element
            $('#careerDetailsModal').addClass('modal');
            // Show the modal
            $('#careerDetailsModal').modal('show');
        });
    });

</script>
@endsection
