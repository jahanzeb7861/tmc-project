@extends('layouts.admin')
@section('pagename', 'Events')
@section('styles')

@endsection


@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/forms/switches.css') }}">
    <link href="{{ asset('admin-assets/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/richtexteditor/rte_theme_default.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <div id="content" class="main-content">
        <div class=" layout">
            <div class=" layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">

                    <h4>
                        @if (isset($data->id))
                            Update Event
                        @else
                            Add New Event
                        @endif
                    </h4>

                    <a href="{{ route('admin.events.list') }}" class="btn btn-dark float-right">Back to list</a>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div id="alert"></div>
                        @if (isset($data))
                            <form method="PUT" class="p-5" id="addform" enctype="multipart/form-data"
                                action="{{ route('admin.events.update', ['id' => $data->id]) }}">
                                @method('PUT')
                            @else
                                <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                                    action="{{ route('admin.events.create') }}">
                        @endif
                        @CSRF

                        <input type="hidden" name="id" value="{{ @$data->id }}">

                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="title" class=""> Title</label>
                                    <input id="title" type="text" name="title" class="form-control"
                                        value="{{ @$data->title }}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="start_date" class="">Start Date Time</label>
                                    <input id="start_date" type="text" name="start_date" class="form-control"
                                        value="{{ @$data->start_date }}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="end_date" class="">End Date Time</label>
                                    <input id="end_date" type="text" name="end_date" class="form-control"
                                        value="{{ @$data->end_date }}">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="address" class=""> Location/Address</label>
                                    <input id="address" type="text" name="address" class="form-control"
                                        value="{{ @$data->address }}">
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group d-flex flex-column">
                                    <label for="Publish" class="">Is Publish</label>
                                    <label class="switch s-icons s-outline  s-outline-success  mb-4 ">
                                        <input type="checkbox" {{ @$data->is_publish == 'publish' ? 'checked' : '' }}
                                            name="is_publish">
                                        <span class="slider "></span>
                                    </label>
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
    <script type="text/javascript" src="{{ asset('admin-assets/plugins/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('admin-assets/plugins/richtexteditor/plugins/all_plugins.js') }}'>
    </script>
    <script src="{{ asset('admin-assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
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
