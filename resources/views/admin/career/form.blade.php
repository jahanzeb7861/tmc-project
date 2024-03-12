@extends('layouts.admin')
@section('pagename', 'Career')
@section('styles')

@endsection


@section('content')
<style>
    .user_profile_add {
        width: 100%;
        overflow: hidden;
        height: 300px;
        position: relative;
        margin: 0 auto;
        background: #fff;
        padding: 10px;
        max-width: 150px;
        max-height: 180px;
        box-shadow: 0px 0px 16px #72717130;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user_profile_add img {
        width: fit-content;
        object-fit: contain;
        display: block;
    }

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/forms/switches.css') }}">
<div id="content" class="main-content">
    <div class=" layout">
        <div class=" layout-top-spacing">

            <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">

                <h4>
                    @if (isset($data->id))
                    Update Career
                    @else
                    Add New Career
                    @endif
                </h4>

                <!-- <a href="{{ route('admin.header-categories.list') }}" class="btn btn-dark float-right">Back to list</a> -->
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                    <div id="alert"></div>
                    @if (isset($data))
                    <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                        action="{{ route('admin.career.update', ['id' => $data->id]) }}">
                        @method('PUT')
                        @else
                        <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                            action="{{ route('admin.career.create') }}">
                            @endif
                            @csrf

                            <input type="hidden" name="id" value="{{ @$data->id }}">

                            <div class="row">

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="position" class="">Position</label>
                                        <input id="position" type="text" name="position" class="form-control"
                                            value="{{ @$data->position }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="details" class="">Detail</label>
                                        <textarea id="details" name="details" class="form-control"
                                            rows="4">{{ @$data->details }}</textarea>
                                    </div>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="ad_date" class="">Advertisement Date</label>
                                        <input id="ad_date" type="date" name="ad_date" class="form-control"
                                            value="{{ @$data->ad_date }}">
                                    </div>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="closing_date" class="">Closing Date</label>
                                        <input id="closing_date" type="date" name="closing_date" class="form-control"
                                            value="{{ @$data->closing_date }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mx-auto mt-4">
                                    <button class="btn btn-success mt-4 mb-3 mr-3 submit-btn shadow-none"
                                        type="submit">Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    jQuery(document).on('change', '#image', function (e) {
        let file = e.target.files[0];
        jQuery('#output').attr('src', URL.createObjectURL(file));
    })

    jQuery(document).on('submit', '#addform', function (e) {
        e.preventDefault();
        jQuery('.submit-btn').html(
            `<div class="spinner-border text-white mr-2 align-self-center loader-sm "></div> Loading...`
        );

        let action = jQuery(this).attr('action');
        let method = jQuery(this).attr('method');
        $.ajax({
            type: 'POST',
            url: action,
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                $("#alert").html(alertMessage(result));
                $("html, body").animate({
                    scrollTop: 0,
                }, 1000);

                if (result['status'] == "success" && method.toLowerCase() === 'post') {
                    $("#addform").trigger("reset");
                }

                // Additional logic for success can go here
            },
            error: function (error) {
                console.log(error);
                jQuery('.submit-btn').html(`Try Again!`);
            },
            complete: function () {
                // This will be executed whether the request is successful or not
                jQuery('.submit-btn').html(`Save Changes`);
            }
        });
    });

</script>
@endsection
