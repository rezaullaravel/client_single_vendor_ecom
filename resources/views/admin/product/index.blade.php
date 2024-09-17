@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Product List</h2>
                      </div>

                       {{-- <div class="row">

                                <div class="col-sm-4 p-4">
                                    <label>Product Filter with Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4 p-4">
                                    <label>Product Filter with Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4 p-4">
                                    <label>Product Filter with Status</label>
                                    <select name="status" id="status"  class="form-control">
                                        <option value="" selected disabled>Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>

                                    </select>
                                </div>
                        </div> --}}

                      <div class="card-body">
                         <div class="filter_result">
                            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Sl no.</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Featured</th>
                                        <th class="text-center">Today deal</th>
                                        <th class="text-center">Best Selling</th>
                                        <th class="text-center">Thumbnail</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                   @foreach ($products as $key=>$product)
                                      <tr class="text-center">
                                        <td>{{ $key+1 }}</td>
                                       <td>{{ $product->name }}</td>
                                       <td>{{ $product->category->category_name }}</td>

                                       <td>{{ $product->brand->brand_name }}</td>
                                       <td>
                                            @if ($product->status==1)
                                            <a href="{{ url('/admin/product-status/deactive',$product->id) }}" class="bg-success btn-sm ">Active</a>

                                            @else
                                            <a href="{{ url('/admin/product-status/active',$product->id) }}" class="bg-danger btn-sm">Deactive</a>
                                            @endif
                                       </td>
                                       <td>
                                            @if ($product->featured==1)
                                              <a href="{{ url('/admin/product-featured/deactive',$product->id) }}" class="bg-success btn-sm">Active</a>
                                            @else
                                              <a href="{{ url('/admin/product-featured/active',$product->id) }}" class="bg-danger btn-sm">Deactive</a>
                                            @endif
                                       </td>
                                       <td>
                                          @if ($product->today_deal==1)
                                            <a href="{{ url('/admin/today-deal/deactive',$product->id) }}" class="bg-success btn-sm">Active</a>

                                          @else
                                             <a href="{{ url('/admin/today-deal/active',$product->id) }}" class="bg-danger btn-sm">Deactive</a>
                                          @endif
                                       </td>

                                       <td>
                                        @if ($product->best_selling==1)
                                          <a href="{{ url('/admin/best-selling/deactive',$product->id) }}" class="bg-success btn-sm">Yes</a>

                                        @else
                                           <a href="{{ url('/admin/best-selling/active',$product->id) }}" class="bg-danger btn-sm">No</a>
                                        @endif
                                     </td>
                                       <td>
                                          <img src="{{ asset($product->thumbnail) }}" alt="" width="80">
                                       </td>

                                        <td>
                                            <a href="{{ url('admin/product/view',$product->id) }}" class="btn btn-primary btn-sm" title="view"><i class="fa fa-eye"></i></a>

                                            <a href="{{ url('admin/product/edit',$product->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                            <a href="{{ url('admin/product/delete',$product->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                      </tr>

                                   @endforeach
                                </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>
    </div>
 </div>

 {{-- product filter by category --}}
 <script>
    $(document).ready(function(){
        $('#category_id').on('change',function(){
            let category_id = $(this).val();
            //alert(category_id);

            $.ajax({
                url:'/admin/product/filter/by-category',
                method:'GET',
                data:{category_id:category_id},
                success:function(data){

                    $('.filter_result').html(data);

                    if(data.status=='No data found'){
                        $('.filter_result').html('<h3 class="text-danger text-center" style="font-weight:bold;">'+'No data found.......'+'</h3>');
                    }

                }
            });
        })
    });
 </script>

 {{-- product filter by category end --}}

 {{-- product filter by brand --}}
 <script>
    $(document).ready(function(){
        $('#brand_id').on('change',function(){
            let brand_id = $(this).val();
            //alert(brand_id);

            $.ajax({
                url:'/admin/product/filter/by-brand',
                method:'GET',
                data:{brand_id:brand_id},
                success:function(data){

                    $('.filter_result').html(data);

                    if(data.status=='No data found'){
                        $('.filter_result').html('<h3 class="text-danger text-center" style="font-weight:bold;">'+'No data found.......'+'</h3>');
                    }

                }
            });
        })
    });
 </script>
 {{-- product filter by brand end --}}

 {{-- product filter by status --}}
 <script>
    $(document).ready(function(){
        $('#status').on('change',function(){
            let status = $(this).val();
            //alert(status);

            $.ajax({
                url:'/admin/product/filter/by-status',
                method:'GET',
                data:{status:status},
                success:function(data){
//console.log(data);
                    $('.filter_result').html(data);

                    if(data.status=='No data found'){
                        $('.filter_result').html('<h3 class="text-danger text-center" style="font-weight:bold;">'+'No data found.......'+'</h3>');
                    }

                },error:function(error){
                    alert('fail');
                }
            });
        })
    });
 </script>
 {{-- product filter by status end --}}




@endsection
