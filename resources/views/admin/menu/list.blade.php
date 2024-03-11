<?php

//   dd(@$posts);
?>

@extends('layouts.admin')
@section('pagename', 'Menus')
@section('styles')

    <style>

    </style>
@endsection

@section('content')

    <div id="content" class="main-content">
        <div class="  layout">
            <div class="  layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">
                    <h4 class="text-capitalize">Menu {{ @$type }} List</h4>
                    <!-- <a href="{{ route('admin.post.show-form', ['type' => @$type ? $type : 'menu']) }}"
                        class="btn btn-success float-right">Add
                        New</a> -->
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">

                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr no</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <!-- <th>Toggle Status</th> -->
                                    <th>Actions</th>
                                    <th>Created At</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($menuList as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ (@$row->title) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ @$row->is_active === 'inactive' ? 'badge-danger' : 'badge-success' }}">
                                                {{ @$row->is_active === 'inactive' ? 'InActive' : 'Active' }}
                                            </span>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.menu.toggle-status', ['id' => $row->id]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-{{ $row->is_active === 'inactive' ? 'success' : 'danger' }} btn-sm">
                                                    {{ $row->is_active === 'active' ? 'Make In Active' : 'Make Active' }}
                                                </button>
                                            </form>
                                        </td>
                                        <!-- <td>

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
                                        </td> -->
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
