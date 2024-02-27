@extends('layouts.admin')
@section('pagename', 'Contacts')
@section('styles')

    <style>

    </style>
@endsection

@section('content')

    <div id="content" class="main-content">
        <div class="  layout">
            <div class="  layout-top-spacing">

                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">
                    <h4 class="text-capitalize">Contacts List</h4>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget-content widget-content-area" style="overflow-x: auto; ">

                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Problem</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                    <th>Created At</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $row)
                                    <tr>


                                        <td>{{ $row->name }}</td>

                                        <td>
                                            {{ $row->email }}
                                        </td>
                                        <td>
                                            {{ $row->phone }}
                                        </td>
                                        <td>
                                            {{ $row->problem }}
                                        </td>
                                        <td>
                                            <p style="resize: both; width: 237px; position: relative; overflow: hidden; height: 20px; display: inline-block; white-space: normal;">
                                                {{ $row->message }}
                                            </p>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="delete-record btn btn-danger btn-sm px-2  py-1"
                                                data-route="{{ route('admin.contact.delete', ['id' => $row['id']]) }}">
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
    </div>

@endsection
@section('scripts')

@endsection
