@extends('layouts.admin')
@section('pagename', 'Website Settings')


@section('content')
    <style>
        .user_profile_add {
            width: 100%;
            overflow: hidden;
            height: 280px;
            position: relative;
            margin: 0 auto;
            background: #fff;
            padding: 10px;
            max-width: 150px;
            max-height: 150px;
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
                        Website Settings
                    </h4>

                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div id="alert"></div>

                        <form method="PUT" class="p-5" id="addform" enctype="multipart/form-data"
                            action="{{ route('admin.web-settings.site-update') }}">
                            @method('PUT')

                            @CSRF

                            <input type="hidden" name="id" value="{{ @$data->id }}">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" id="ownThumbnail">
                                        <label for="logo" class="text-center d-block">Logo</label>
                                        <div class="user_profile_add">
                                            @if (isset($data->logo))
                                                <img src="{{ asset('uploads/website/' . $data->logo) }}" id="logo-img">
                                            @else
                                                <img src="{{ asset('admin-assets/img/thumbnail.png') }}" id="logo-img">
                                            @endif
                                            <input id="logo" type="file" accept="images/*" name="logo"
                                                class="">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" id="ownThumbnail">
                                        <label for="favicon" class="text-center d-block">Favicon</label>
                                        <div class="user_profile_add">
                                            @if (isset($data->logo))
                                                <img src="{{ asset('uploads/website/' . $data->favicon) }}"
                                                    id="favicon-image">
                                            @else
                                                <img src="{{ asset('admin-assets/img/thumbnail.png') }}" id="favicon-image">
                                            @endif
                                            <input id="favicon" type="file" accept="images/*" name="favicon"
                                                class="">
                                        </div>

                                    </div>
                                </div>



                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="name" class=""> Website Name</label>
                                        <input id="name" type="text" name="name" class="form-control"
                                            value="{{ $data->name }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="author" class=""> Website Author</label>
                                        <input id="author" type="text" name="author" class="form-control"
                                            value="{{ $data->author }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="email" class=""> Website Email</label>
                                        <input id="email" type="email" name="email" class="form-control"
                                            value="{{ $data->email }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="phone" class=""> Website Phone</label>
                                        <input id="phone" type="text" name="phone" class="form-control"
                                            value="{{ $data->phone }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="website_address" class=""> Website Address</label>
                                        <input id="website_address" type="text" name="website_address"
                                            class="form-control" value="{{ $data->website_address }}">
                                    </div>
                                </div>


                                {{-- ------------- BASIC SEO Settings  ------------- --}}
                                <div class="col-md-12 mt-3">
                                    <hr />
                                    <h4 class=" ">
                                        Basic SEO Settings
                                    </h4>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="title" class=""> Title</label>
                                        <input id="title" type="text" name="title" class="form-control"
                                            value="{{ $data->title }}">
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
                                        <textarea rows='4' id="description" name="description" class="form-control">{{ @base64_decode($data->description) }}</textarea>
                                    </div>
                                </div>

                                {{-- ------------- Social Settings  ------------- --}}
                                <div class="col-md-12 mt-3">
                                    <hr />
                                    <h4 class=" ">
                                        Social Links Settings
                                    </h4>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group social-linkedin mb-3">
                                        <div class="input-group-prepend mr-3">
                                            <span class="input-group-text" id="linkedin"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-linkedin">
                                                    <path
                                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                    </path>
                                                    <rect x="2" y="9" width="4" height="12">
                                                    </rect>
                                                    <circle cx="4" cy="4" r="2">
                                                    </circle>
                                                </svg></span>
                                        </div>
                                        <input type="text" class="form-control" name="linkedin"
                                            placeholder="linkedin Username" aria-label="Username"
                                            aria-describedby="linkedin" value="{{ $data->linkedin_link }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="input-group social-tweet mb-3">
                                        <div class="input-group-prepend mr-3">
                                            <span class="input-group-text" id="tweet"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-twitter">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                    </path>
                                                </svg></span>
                                        </div>
                                        <input type="text" class="form-control" name='twitter'
                                            placeholder="Twitter link" aria-label="Username" aria-describedby="tweet"
                                            value="{{ $data->twitter_link }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="input-group social-fb mb-3">
                                        <div class="input-group-prepend mr-3">
                                            <span class="input-group-text" id="fb"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-facebook">
                                                    <path
                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                    </path>
                                                </svg></span>
                                        </div>
                                        <input type="text" name="facebook" class="form-control"
                                            placeholder="Facebook Username" aria-label="Username" aria-describedby="fb"
                                            value="{{ $data->facebook_link }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="input-group social-instagram mb-3">
                                        <div class="input-group-prepend mr-3">
                                            <span class="input-group-text" id="instagram">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-instagram">
                                                    <rect x="2" y="2" width="20" height="20" rx="5"
                                                        ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5">
                                                    </line>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" name="instagram" class="form-control"
                                            placeholder="Instagram Username" aria-label="Username"
                                            aria-describedby="instagram" value="{{ $data->instagram_link }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="input-group social-youtube mb-3">
                                        <div class="input-group-prepend mr-3">
                                            <span class="input-group-text" id="youtube">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-youtube">
                                                    <path
                                                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                                                    </path>
                                                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" name="youtube" class="form-control"
                                            placeholder="Youtube Username" aria-label="Username"
                                            aria-describedby="youtube" value="{{ $data->youtube_link }}">
                                    </div>
                                </div>

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


        jQuery(document).on('change', '#favicon', function(e) {
            let file = e.target.files[0];
            jQuery('#favicon-image').attr('src', URL.createObjectURL(file));
        })

        jQuery(document).on('change', '#logo', function(e) {
            let file = e.target.files[0];
            jQuery('#logo-img').attr('src', URL.createObjectURL(file));
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
