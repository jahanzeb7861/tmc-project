@extends('layouts.admin')
@section('pagename', 'Banner Settings')

@section('content')
    <style>
        .search-result {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .post-card {
            display: flex;
            padding: 10px;
            box-shadow: 5px 0px 10px #0d600822;
            border-radius: 5px;
            width: 100%;
            gap: 10px;
            background: #f5f5f5;
        }

        .post-card img {
            width: 80px;
            max-height: 60px;
            object-fit: contain;
            background: #000;
            border-radius: 5px;
        }

        .post-card h4 {
            font-size: 14px;
        }
    </style>

    <div id="content" class="main-content">
        <div class=" layout">
            <div class=" layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">

                    <h4>
                        Banner Settings
                    </h4>

                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">
                        <div class="row w-100 m-0 mb-4 py-3">
                            <div class="col-md-12 mt-4">
                                <h4>Currect Banner</h4>
                                <div class="selected-banner">
                                    <div class="post-card col-md-12">
                                        <img src="{{ asset('uploads/content/' . @$banner->postMedia[0]->file_name) }}" />
                                        <div class='row'>
                                            <h4 class='col-md-10'>{{ @$banner->title }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 d-flex justify-content-center align-items-center">
                                <div class="form-group w-100">
                                    <label for="search"> Search Post</label>
                                    <input id="search" type="text" placeholder="Search Title" name="search"
                                        class="form-control">
                                </div>
                                <button id='searchPost' type="button" class="btn btn-sm ml-2  py-2 btn-success">
                                    <i class="fa-solid fa fa-magnifying-glass"></i>
                                </button>
                            </div>
                            <div class="col-md-12">

                                <div class="search-result">

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
@section('scripts')
    <script>
        jQuery(document).on('click', '#searchPost', function() {
            let asset_path = "{{ asset('uploads/content/') }}"
            let value = $('#search').val()
            if (value.length < 3) {
                alert('Search Characters should be 4 or more')
                return;
            }
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.banner.search') }}",
                data: {
                    search: value
                },
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('.search-result').html('')
                    if (data.status == 'success') {
                        let html = '';
                        data.data.forEach(element => {
                            html += `
                            <div class="post-card col-md-5">
                                <img src='${asset_path}/${element?.post_media?.[0]?.file_name}' />
                                <div class='row'>
                                    <h4 class='col-md-8'>${(element?.title)}</h4>
                                    <div class='col-md-4'>
                                        <button class='btn-sm btn btn-info useBanner' data-id='${element?.id}' type='button'>Use</button>
                                        </div>
                                </div>
                            </div>
                        `
                        });
                        $('.search-result').html(html)
                    } else {
                        $('.search-result').html(data.message)
                    }
                }
            })


        })

        jQuery(document).on('click', '.useBanner', function(e) {
            e.preventDefault();
            let thisy = $(this)
            jQuery(thisy).html('<i class="fa fa-spin fa-spinner fa-solid"></i>');
            let id = jQuery(thisy).data('id')

            $.ajax({
                type: 'PUT',
                url: "{{ route('admin.banner.update') }}",
                data: {
                    post_id: id
                },
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    if (result['status'] == "success") {
                        jQuery(thisy).html('Used');
                        setTimeout(() => {
                            location.reload()
                        }, 500);
                    } else {
                        $("#alert").html(alertMessage(result));
                    }

                    // Additional logic for success can go here
                },
                error: function(error) {
                    jQuery('.submit-btn').html(`Try Again!`);
                },
                complete: function() {
                    jQuery('.submit-btn').html(`Save Changes`);
                }
            });
        });
    </script>
@endsection
