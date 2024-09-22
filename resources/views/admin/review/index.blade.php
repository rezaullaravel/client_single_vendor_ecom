@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Review List</h2>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Product Image</th>
                                    <th class="text-center">Review</th>
                                    <th class="text-center">Rating Point</th>
                                    <th class="text-center">Date</th>
                                    {{-- <th class="text-center" width="100">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($reviews as $key=>$row)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->user->email }}</td>
                                    <td>{{ $row->product->name }}</td>
                                    <td>
                                        <img src="{{ asset($row->product->thumbnail) }}" width="80" height="80" alt="">
                                    </td>
                                    <td>{{ $row->review }}</td>
                                    <td>{{ $row->rating_point }}</td>
                                    <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>

                                    {{-- <td>
                                        <a href="{{ route('admin.order-details',$row->id) }}" class="btn btn-success btn-sm" title="View order details"><i class="fa fa-eye"></i></a>

                                        <a href="{{ route('admin.order-invoice',$row->id) }}" class="btn btn-primary btn-sm" title="Invoice" target="_blank"><i class="las la-download"></i></a>

                                        <a href="{{ route('admin.order-delete',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>

                                    </td> --}}
                                  </tr>

                               @endforeach
                            </tbody>
                        </table>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>
    </div>
 </div>
@endsection
