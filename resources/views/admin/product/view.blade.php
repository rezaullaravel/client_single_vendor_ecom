@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h5>Product Details
                            <a href="{{ url('/admin/product/manage') }}" class="btn     btn-dark" style="float:right;">Back
                            </a>
                        </h5>
                      </div>

                      <div class="card-body">
                         <div class="filter_result">
                            <table  class="table table-striped table-bordered table-sm" style="width:100%">

                                <tbody>
                                    <tr>
                                        <th width="20%" class="text-center">Product Name</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Category</th>
                                        <td>{{ $product->category->category_name }}</td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Subcategory</th>
                                        <td>{{ $product->subcategory->subcategory_name }}</td>
                                    </tr>


                                    <tr>
                                        <th width="20%" class="text-center">Brand</th>
                                        <td>{{ $product->brand->brand_name }}</td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Thumbnail</th>
                                        <td>
                                            <img src="{{ asset($product->thumbnail) }}" alt="" width="200" height="200">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Multiple Images</th>
                                        <td>
                                            @if(!empty($product->productMultiImage))
                                              @foreach ($product->productMultiImage as $image)

                                                <img src="{{ asset($image->product_image) }}" alt="" width="100" height="100" style="margin-left:5px;">
                                              @endforeach
                                            @else
                                            @endif

                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Color</th>
                                        <td>
                                            <ul>
                                                @foreach($colorNames as $colorName)
                                                    <li>{{ $colorName }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th width="20%" class="text-center">Description</th>
                                        <td>
                                            {!! $product->description !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Original Price</th>
                                        <td>
                                            {!! $product->purchase_price !!} TK.
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Discount Percent</th>
                                        <td>
                                            @if (!empty($product->discount_price))
                                               {!! $product->discount_price !!}%
                                            @else
                                                0
                                            @endif

                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Selling Price</th>
                                        <td>
                                            {!! $product->selling_price !!} TK.
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Featured</th>
                                        <td>
                                            @if ($product->featured==1)
                                              <span  class="badge badge-success">Active</span>
                                            @else
                                              <span  class="badge badge-danger">Deactive</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Today Deal</th>
                                        <td>
                                            @if ($product->today_deal==1)
                                              <span  class="badge badge-success">Active</span>
                                            @else
                                              <span  class="badge badge-danger">Deactive</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Best Selling</th>
                                        <td>
                                            @if ($product->best_selling==1)
                                              <span  class="badge badge-success">Yes</span>
                                            @else
                                              <span  class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="20%" class="text-center">Status</th>
                                        <td>
                                            @if ($product->status==1)
                                              <span  class="badge badge-success">Active</span>
                                            @else
                                              <span  class="badge badge-danger">Deactive</span>
                                            @endif
                                        </td>
                                    </tr>
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
@endsection
