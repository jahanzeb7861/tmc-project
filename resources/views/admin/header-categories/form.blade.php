@extends('layouts.admin')
@section('pagename', 'Category')
@section('styles')
    <style>

    </style>
@endsection


@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/forms/switches.css') }}">
    <div id="content" class="main-content">
        <div class=" layout">
            <div class=" layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">

                    <h4>
                        @if (isset($data->id))
                            Update Category
                        @else
                            Add New Category
                        @endif
                    </h4>

                    <a href="{{ route('admin.header-categories.list') }}" class="btn btn-dark float-right">Back to list</a>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div id="alert"></div>
                        @if (isset($data))
                            <form method="PUT" class="p-5" id="addform" enctype="multipart/form-data"
                                action="{{ route('admin.header-categories.update', ['id' => $data->id]) }}">
                                @method('PUT')
                            @else
                                <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                                    action="{{ route('admin.header-categories.store') }}">
                        @endif
                        @CSRF

                        <input type="hidden" name="id" value="{{ @$data->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" id="ownThumbnail">
                                    <label for="image" class="text-center d-block">Category Image</label>
                                    <div class="user_profile_add">
                                        @if (isset($data->image))
                                            <img src="{{ asset('uploads/content/' . $data->image) }}" id="output">
                                        @else
                                            <img src="{{ asset('admin-assets/img/thumbnail.png') }}" id="output">
                                        @endif
                                        <input id="image" type="file" accept="images/*" name="image"
                                            class="">
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="parent" class="">Parent</label>
                                    <select id="parent" name="parent" class="form-control">
                                        <option value="0">Root</option>
                                        @foreach ($parent as $item)
                                            <option {{ @$data->parent == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="title" class="">Category Title</label>
                                    <input id="title" type="text" name="title" class="form-control"
                                        value="{{ @$data->title }}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="keywords" class="">Page Keywords</label>
                                    <select id="keywords" class="form-control tagging" multiple="multiple"
                                        name="keywords[]">
                                        @if (isset($data->keywords))
                                            @foreach (explode(',', $data->keywords) as $keyword)
                                                <option selected>{{ $keyword }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="description" class="">Page Description</label>
                                    <textarea id="description" name="description" class="form-control">{{ @$data->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group d-flex flex-column">
                                    <label for="Publish" class="">Is Publish</label>
                                    <label class="switch s-icons s-outline  s-outline-success  mb-4 ">
                                        <input type="checkbox" checked name="is_publish">
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
    <script>
        jQuery(".tagging").select2({
            tags: true
        });


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
