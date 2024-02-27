@extends('layouts.admin')
@section('pagename', 'User')
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
                            Update User
                        @else
                            Add New User
                        @endif
                    </h4>

                    <a href="{{ route('admin.header-categories.list') }}" class="btn btn-dark float-right">Back to list</a>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div id="alert"></div>
                        @if (isset($data))
                            <form method="PUT" class="p-5" id="addform" enctype="multipart/form-data"
                                action="{{ route('admin.user.update', ['id' => $data->id]) }}">
                                @method('PUT')
                            @else
                                <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                                    action="{{ route('admin.user.create') }}">
                        @endif
                        @CSRF

                        <input type="hidden" name="id" value="{{ @$data->id }}">

                        <div class="row">

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="first_name" class="">First Name</label>
                                    <input id="first_name" type="text" name="first_name" class="form-control"
                                        value="{{ @$data->first_name }}">
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="last_name" class="">Last Name</label>
                                    <input id="last_name" type="text" name="last_name" class="form-control"
                                        value="{{ @$data->last_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="email" class="">Email</label>
                                    <input id="email" type="email" name="email" class="form-control"
                                        value="{{ @$data->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="password" class="">Password</label>
                                    <input id="password" type="password" name="password" class="form-control"
                                        value="">
                                    @if ($data)
                                        <p class="text-danger">
                                            Leave blank password if don't want to change
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="status" class="">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option {{ @$data->status == 'active' ? 'selected' : '' }} value="active">Active
                                        </option>
                                        <option {{ @$data->status == 'in-active' ? 'selected' : '' }} value="in-active">
                                            In-Active</option>
                                    </select>
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
        jQuery(document).on('change', '#image', function(e) {
            let file = e.target.files[0];
            jQuery('#output').attr('src', URL.createObjectURL(file));
        })

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
