@extends('layouts.admin')
@section('pagename', 'Budget')
@section('styles')

<style>

</style>
@endsection

@section('content')

<div id="content" class="main-content">
    <div class="layout">
        <div
            class="layout-top-spacing align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">
            <h4 class="text-capitalize">Budget List</h4>
            <a href="{{ route('admin.budget.create-form') }}" class="btn btn-success float-right">Add New</a>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-content widget-content-area" style="overflow-x: auto;">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No. Details</th>
                            <th>Details</th>
                            <th>Actions</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budgets as $key => $row)
                        <tr>
                            <td>{{ $row->no_details }}</td>
                            <td>{{ $row->details }}</td>
                            <td>
                                <a class="btn btn-info btn-sm px-2 py-1"
                                    href="{{ route('admin.budget.update-form', ['id' => $row['id']]) }}">
                                    <i class="far pt-1 fa fa-edit fa-2x"></i>
                                </a> |
                                <a href="javascript:void(0)" class="delete-record btn btn-danger btn-sm px-2  py-1"
                                    data-route="{{ route('admin.budget.delete', ['id' => $row['id']]) }}">
                                    <i class="fas fa-trash  pt-1 fa fa-solid fa-2x"></i>
                                </a>
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

@endsection
@section('scripts')

@endsection
