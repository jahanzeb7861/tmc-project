@extends('layouts.admin')
@section('pagename', 'Image Gallery')
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
                            Update Image Gallery
                        @else
                            Add New Image Gallery
                        @endif
                    </h4>

                    <!-- <a href="{{ route('admin.event.show-list') }}" class="btn btn-dark float-right">Back to list</a> -->
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div id="alert"></div>
                        @if (isset($data))
                            <form method="PUT" class="p-5" id="addform" enctype="multipart/form-data"
                                action="{{ route('admin.i_gallery.update', ['id' => $data->id]) }}">
                                @method('PUT')
                            @else
                                <form method="POST" class="p-5" id="addform" enctype="multipart/form-data"
                                    action="{{ route('admin.i_gallery.store', ['type' => 'menu']) }}">
                        @endif
                        @CSRF

                        <input type="hidden" name="id" value="{{ @$data->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                    <label>Upload (Allow Multiple)
                                        <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                            title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input name="file[]" type="file"
                                            class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                @if (isset($data))
                                    <div class="image-list">
                                        @foreach ($data->imageGalleryMedia as $media)
                                            <div class="form-media-box media-{{ $media->id }}">
                                                <img src="{{ asset('uploads/content/' . $media->file_name) }}" />
                                                <div class="media-toolbar">
                                                    <a href="{{ asset('uploads/content/' . $media->file_name) }}"
                                                        target="_blank" class="view-media">
                                                        <i class="fa fa-eye fa-solid"></i>
                                                    </a>
                                                    <button type="button" class="remove-file"
                                                        data-id='{{ $media->id }}'>
                                                        <i class="fas fa-trash fa fa-solid"></i>
                                                    </button>
                                                    <button type="button" class="restore-media"
                                                        data-id='{{ $media->id }}'>
                                                        Restore
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="remove-media-list">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="title" class=""> Title</label>
                                    <input id="title" type="text" name="title" class="form-control"
                                        value="{{@$data->title}}">
                                </div>
                            </div>


                            <div class="col-md-12 mt-3" style="display: none;">
                                <div class="form-group">
                                    <label for="summernote" class=""> Description</label>

                                    <div class="bg-white p-2 rounded-sm" id="">
                                        <textarea id="mytextareaa" name="description" rows="4">{{ @base64_decode($data->description) }}</textarea>
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
    <script type="text/javascript" src="{{ asset('admin-assets/plugins/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin-assets/plugins/richtexteditor/plugins/all_plugins.js') }}">
    </script>
    <script src="{{ asset('admin-assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        jQuery(document).on('change', '.is_faq', function() {
            let value = $(this).is(':checked');
            if (value) {
                jQuery(".faq-sec").show(500)
            } else {
                jQuery(".faq-sec").hide(500)

            }
        })
        jQuery(document).on('click', '.new-faq', function() {
            let html = `
            <div class="faq-main">
                 <div class="faq-question">
                     <input placeholder="list item" class="form-control" name="question[]" type="text">
                     <button type='button' class="btn btn-danger btn-sm px-2  py-1 remove-faq" > <i class="fas fa-trash  pt-1 fa fa-solid fa-2x"></i> </button>
                 </div>
                 <div class="faq-answer">
                     <textarea placeholder="list description" class="form-control" name="answer[]"></textarea>
                 </div>
             </div>
            `;
            jQuery('.faq-sec').prepend(html)
        })
        jQuery(document).on('click', '.remove-faq', function() {
            jQuery(this).parent().parent().hide(500);
            setTimeout(() => {
                jQuery(this).parent().parent().remove();
            }, 600);
        })
        $(document).on('change', '#language', function() {

            if ($(this).val() == 'urdu') {

                $('#addform').attr('dir', 'rtl')
            } else {

                $('#addform').attr('dir', 'ltr')
            }
        })

        $(document).on('click', '.remove-file', function() {
            let id = $(this).attr('data-id');
            $('.remove-media-list').append(
                `<input type="hidden" name="removeMedia[]" value='${id}' id="removed-file-${id}">`);
            $(`.media-${id}`).addClass('removed-mediaa');
        })
        $(document).on('click', '.restore-media', function() {
            let id = $(this).attr('data-id');
            $(`#removed-file-${id}`).remove();
            $(`.media-${id}`).removeClass('removed-mediaa');
        })


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
                        $('.custom-file-container__image-preview ').html();
                        $('#keywords').val(null).trigger('change')
                        $('#summernote').summernote('code', '');
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

        var editor1 = new RichTextEditor("#mytextareaa");
        var secondUpload = new FileUploadWithPreview('mySecondImage')
        jQuery(".tagging").select2({
            tags: true
        });
    </script>
@endsection
