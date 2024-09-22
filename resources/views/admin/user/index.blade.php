@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h4>User List
                            <a href="{{ route('admin.user.create') }}" class="btn btn-dark" style="float: right;"><strong>Create User</strong></a>
                        </h4>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center" width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($users as $key=>$row)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>
                                        @if (!empty($row->image))
                                           <img src="{{ asset($row->image) }}" width="80" height="80" style="border-radius: 50%;">
                                        @else

                                        @endif
                                    </td>
                                    <td>{{ $row->address }}</td>

                                    <td>
                                        <a href="{{ route('admin.user.edit',$row->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pen"></i></a>

                                        <a href="{{ route('admin.user.delete',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>

                                    </td>
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
