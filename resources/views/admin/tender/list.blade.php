 @extends('layouts.admin')
 @section('pagename', 'Tender')
 @section('styles')

 <style>

 </style>
 @endsection

 @section('content')

 <div id="content" class="main-content">
     <div class="  layout">
         <div class="  layout-top-spacing">

             <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex mb-3 justify-content-between">
                 <h4 class="text-capitalize">Tender List</h4>
                 <a href="{{ route('admin.tender.create-form') }}" class="btn btn-success float-right">Add
                     New</a>
             </div>

             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                 <div class="widget-content widget-content-area" style="overflow-x: auto; ">

                     <table id="zero-config" class="table dt-table-hover" style="width:100%">
                         <thead>
                             <tr>
                                 <th>S.No</th>
                                 <th>Description</th>
                                 <th>Department</th>
                                 <th>Diary No</th>
                                 <th>Tender Date</th>
                                 <th>Opening Date</th>
                                 <th>Actions</th>
                                 <th>Created At</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($tenders as $key => $row)
                             <tr>
                                 <td>{{ $key + 1 }}</td>
                                 <td>{{ $row->description }}</td>
                                 <td>{{ $row->department }}</td>
                                 <td>{{ $row->diary_no }}</td>
                                 <td>{{ $row->tender_date }}</td>
                                 <td>{{ $row->opening_date }}</td>
                                 <td>
                                     <a class="btn btn-info btn-sm px-2 py-1"
                                         href="{{ route('admin.tender.update-form', ['id' => $row['id']]) }}">
                                         <i class="far pt-1 fa fa-edit fa-2x"></i>
                                     </a> |
                                     <a href="javascript:void(0)" class="delete-record btn btn-danger btn-sm px-2  py-1"
                                         data-route="{{ route('admin.tender.delete', ['id' => $row['id']]) }}">
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
