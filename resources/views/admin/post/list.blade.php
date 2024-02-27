<?php

//   dd(@$posts);
?>

@extends('layouts.admin')
@section('pagename', 'Post')
@section('styles')

    <style>

    </style>
@endsection

@section('content')

    <div id="content" class="main-content">
        <div class="  layout">
            <div class="  layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">
                    <h4 class="text-capitalize">Post {{ @$type }} List</h4>
                    <a href="{{ route('admin.post.show-form', ['type' => @$type ? $type : 'menu']) }}"
                        class="btn btn-success float-right">Add
                        New</a>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">

                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr no</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Categories</th>
                                    <th>Keywords</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th>Created At</th>

                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($posts as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ (@$row->title) }}</td>
                                        <td>
                                            @if (!empty($row->postMedia))
                                                <img alt="{{ @$row->postMedia[0]->file_name }}"
                                                    src="{{ asset('uploads/content/' . @$row->postMedia[0]->file_name) }}"
                                                    class="img-fluid" />
                                            @else
                                                <img alt="" src="{{ asset('uploads/website/logo.png') }}"
                                                    class="img-fluid" />
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            {{ @$row->category_details->title }}

                                        </td>
                                        <td>
                                            <p>
                                                @if (@$row->keywords)
                                                    @foreach (explode(',', @$row->keywords) as $keyword)
                                                        <span class="badge outline-badge-primary"> {{ $keyword }}
                                                        </span>
                                                    @endforeach
                                                @else
                                                    <span>No tags found</span>
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ @$row->is_publish === 'archive' ? 'badge-danger' : 'badge-success' }}">
                                                {{ @$row->is_publish === 'archive' ? 'Archive' : 'Publish' }}
                                            </span>
                                        </td>
                                        <td>

                                            <a class="btn btn-info btn-sm px-2 py-1"
                                                href="{{ route('admin.post.show-update-form', ['id' => $row['id']]) }}">
                                                <i class="far pt-1 fa fa-edit fa-2x"></i>
                                            </a>
                                            @if (auth()->user()->role == 'admin')
                                                |
                                                <a href="javascript:void(0)"
                                                    class="delete-record btn btn-danger btn-sm px-2  py-1"
                                                    data-route="{{ route('admin.post.delete', ['id' => $row['id']]) }}">
                                                    <i class="fas fa-trash  pt-1 fa fa-solid fa-2x"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
