@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2>Faq List
                                <a href="{{ route('admin.faq.create') }}" class="btn btn-dark" style="float: right;">Create Faq</a>
                        </h2>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Question</th>
                                    <th class="text-center">Answer</th>
                                    <th class="text-center" width="60">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($faqs as $key=>$row)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->question }}</td>
                                    <td>{{ $row->answer }}</td>
                                    <td>
                                        <a href="{{ route('admin.faq.edit',$row->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ route('admin.faq.delete',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
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
