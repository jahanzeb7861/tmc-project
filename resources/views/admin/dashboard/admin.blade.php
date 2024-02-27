@extends('layouts.admin')
@section('pagename', 'Dashboard')
@section('styles')
    <style>

    </style>
@endsection


@section('content')

    <!--  BEGIN MAIN CONTAINER  -->


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info d-flex justify-content-between"
                                    style="justify-content: space-between;width:100%;">
                                    <h6 class="value">Total Category</h6>
                                    <i class="fa fa-server fa-solid fa-2x text-yellow"></i>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info w-100 d-flex align-items-center justify-content-between">

                                    <h1 class="h4"> {{ $data['totalCategory'] }}</h1>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info d-flex justify-content-between"
                                    style="justify-content: space-between;width:100%;">
                                    <h6 class="value"> Header Category</h6>
                                    <i class="fa fa-navicon fa-solid fa-2x text-yellow"></i>
                                </div>
                            </div>

                            <div class="w-content">
                                <div class="w-info w-100 d-flex align-items-center justify-content-between">

                                    <h1 class="h4"> {{$data['headerCategory']}}</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info d-flex justify-content-between"
                                    style="justify-content: space-between;width:100%;">
                                    <h6 class="value">Asside Category</h6>
                                    <i class="fa fa-list-alt fa-solid fa-2x text-yellow"></i>
                                </div>
                            </div>

                            <div class="w-content">
                                <div class="w-info w-100 d-flex align-items-center justify-content-between">

                                    <h1 class="h4">{{$data['asideCategory']}}</h1>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info d-flex justify-content-between"
                                    style="justify-content: space-between;width:100%;">
                                    <h6 class="value">Total Blogs</h6>
                                    <i class="fa fa-connectdevelop fa-2x text-yellow"></i>
                                </div>
                            </div>

                            <div class="w-content">
                                <div class="w-info w-100 d-flex align-items-center justify-content-between">

                                    <h1 class="h4">{{$data['post']}}</h1>
                                   
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
    <script></script>
@endsection
