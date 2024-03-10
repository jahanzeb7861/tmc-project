@extends('layouts.app')
@section('content')
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow-x: hidden;
        }

        span.edit-content {
            cursor: pointer;
        }

        span.edit-image-content {
            position: absolute;
            transform: translateX(-110%) translateY(15%);
            color: #f1f1f1;
            background: #5c9511;
            padding: 10px;
            border: 1px solid #fff;
            cursor: pointer;
        }

        .user_profile_add {
            width: 100%;
            overflow: hidden;
            height: 280px;
            position: relative;
            margin: 24px auto;
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

    <div class="section section-contents bg-light section-pad">
        <div class="container">
            <div class="content row">

                <div class="wide-sm center">
                    <h2>
                        {!! content(1) !!}
                    </h2>
                    <!--<h3 class="color-primary">Why we’re an Insurance Agency... And why it matters to you.</h3>-->
                    <p> {!! content(2) !!}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">

                <div class="row row-column">
                    <div style="text-align: center;" class="col-md-7">
                        @php echo media_post(24,"alt='Banner Image'") @endphp
                        {{-- <img src="{{ asset('assets/images/2.jpg') }}" alt="Banner Image"> --}}
                        <h2
                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: 500; font-size: 30px; line-height: 33px; color: #333333;">
                            {!! content(3) !!}
                        </h2>
                        <h2
                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: 500; font-size: 25px; line-height: 33px; color: #333333;">
                            {!! content(4) !!}
                        </h2>
                    </div>
                    <div style="text-align: center;" class="col-md-5 pad-l">
                        @php echo media_post(25,"alt='Banner Image'") @endphp
                        <h2
                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: 500; font-size: 30px; line-height: 33px; color: #333333;">
                            {!! content(5) !!}
                        </h2>
                        <h2
                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal; font-weight: 500; font-size: 25px; line-height: 33px; color: #333333;">
                            {!! content(6) !!}
                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <hr class="hr-lg">
        <div class="row row-column-md">
            <div class="col-sm-4">
                <div class="box bg-light pd-x3 round">
                    <h4>{!! content(7) !!}</h4>
                    <p>{!! content(8) !!}</p>
                    <p>
                        <a href="https://tmcmominabad.gos.pk/staff" class="btn-link link-arrow-sm">
                            Show Staff
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box bg-light pd-x3 round">
                    <h4>{!! content(9) !!}
                    </h4>
                    <p>{!! content(10) !!}</p>
                    <!--<p><a href="#" class="btn-link link-arrow-sm">View all awards</a></p>-->
                </div>

            </div>
            <div class="col-sm-4">
                <div class="box bg-light pd-x3 round">
                    <h4>
                        {!! content(11) !!}

                    </h4>
                    <p>
                        {!! content(12) !!}
                    </p>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>

    <div class="banner">
        @php echo media_post(26,"alt='Banner Image'") @endphp
    </div>

    <div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="contentalert"></div>
                    <form class="contentform" action="{{ route('front.content.update') }}">
                        <input type="hidden" name="content_id" class="form-control" id="content_id">
                        <div class="form-group">
                            <label for="content-text" class="col-form-label">Content:</label>
                            <textarea class="form-control" name='content_text' id="content-text"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <div class="modal fade" id="imageContentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Media File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="mediaalert"></div>
                    <form class="mediaform" action="{{ route('front.content.update-image') }}">
                        <input type="hidden" name="media_id" class="form-control" id="media_id">
                        <div class="form-group">
                            <input id="image" type="file" accept="images/*" name="image" class="">
                            <div class="user_profile_add">
                                <img src="" class="media_previewer" id="output" />
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/about.js') }}"></script>
    <script>
        jQuery(document).on('change', '#image', function(e) {
            let file = e.target.files[0];
            jQuery('#output').attr('src', URL.createObjectURL(file));
        })
    </script>
@endsection
