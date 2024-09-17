@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h3><b>Coupon List</b>
                            <a href="{{ url('/admin/coupon/add') }}" class="btn btn-dark" style="float: right"><b>Add New</b></a>
                        </h3>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Coupon code</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Valid date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($coupons as $key=>$coupon)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    <td>
                                        @if ( $coupon->type=='1')
                                        <p>Fixed</p>

                                        @else
                                           <p>Percentage</p>
                                        @endif
                                    </td>
                                    <td>{{ $coupon->amount }}</td>
                                    <td>
                                        @if ($coupon->status=='1')
                                        <p>Active</p>

                                        @else
                                          <p>Inactive</p>
                                        @endif
                                    </td>
                                    <td>{{ $coupon->valid_date }}</td>
                                    <td>
                                        <a href="{{ url('admin/coupon/edit',$coupon->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ url('admin/coupon/trash',$coupon->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
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
