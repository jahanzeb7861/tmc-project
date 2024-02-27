@extends('layouts.admin')
@section('pagename', 'Chairman')
@section('styles')

@endsection


@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/forms/switches.css') }}">
    <div id="content" class="main-content">
        <div class=" layout">
            <div class=" layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">

                    <h4>
                        @if (isset($data->id))
                            Update Chairman
                        @else
                            Add New Chairman
                        @endif
                    </h4>

                    <a href="{{ route('admin.chairman.list') }}" class="btn btn-dark float-right">Back to list</a>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div id="alert"></div>
                        @if (isset($data))
                            <form method="PUT" class="p-5" id="addform" enctype="multipart/form-data"
                                action="{{ route('admin.chairman.update', ['id' => $data->id]) }}">
                                @method('PUT')
                            @else
                                <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                                    action="{{ route('admin.chairman.create') }}">
                        @endif
                        @CSRF

                        <input type="hidden" name="id" value="{{ @$data->id }}">

                        <div class="row">

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="uc" class="">UC</label>
                                    <input id="uc" type="text" name="uc" class="form-control"
                                        value="{{ @$data->UC }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="uc_name" class="">UC Name</label>
                                    <input id="uc_name" type="text" name="uc_name" class="form-control"
                                        value="{{ @$data->UC_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="chairman_name" class="">Chairman Name</label>
                                    <input id="chairman_name" type="text" name="chairman_name" class="form-control"
                                        value="{{ @$data->chairman_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="contact" class="">Contact</label>
                                    <input id="contact" type="text" name="contact" class="form-control"
                                        value="{{ @$data->contact }}">
                                </div>
                            </div>

                            <div class="col-md-12 mx-auto mt-4">
                                <button class="btn btn-success  mt-4 mb-3 mr-3 submit-btn shadow-none" type="submit">
                                    Save Changes
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
        jQuery(document).on('submit', '#addform', function(e) {
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
                success: function(result) {
                    $("#alert").html(alertMessage(result));
                    $("html, body").animate({
                        scrollTop: 0,
                    }, 1000);

                    if (result['status'] == "success" && method.toLowerCase() === 'post') {
                        $("#addform").trigger("reset");
                    }

                    // Additional logic for success can go here
                },
                error: function(error) {
                    console.log(error);
                    jQuery('.submit-btn').html(`Try Again!`);
                },
                complete: function() {
                    // This will be executed whether the request is successful or not
                    jQuery('.submit-btn').html(`Save Changes`);
                }
            });
        });
    </script>
@endsection
