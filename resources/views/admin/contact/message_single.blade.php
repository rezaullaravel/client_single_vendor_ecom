@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h5>Message Details
                            <a href="{{ url('admin/contact/all') }}" class="btn btn-dark" style="float: right;">Back</a>
                        </h5>
                      </div>

                      <div class="card-body">
                        <table  class="table table-striped table-bordered table-sm">

                            <tbody>
                               <tr class="text-center">
                                 <th width="20%">Sender</th>
                                 <td>{{ $message->name }}</td>
                               </tr>

                               <tr class="text-center">
                                <th width="20%">Email</th>
                                <td>{{ $message->email }}</td>
                              </tr>

                              <tr class="text-center">
                                <th width="20%">Message</th>
                                <td>{{ $message->message }}</td>
                              </tr>
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
