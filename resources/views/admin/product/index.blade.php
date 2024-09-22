@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- Data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Product List</h2>
                      </div>

                       <div class="row">
                            <div class="col-sm-3 p-4">
                                <label>Filter with Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 p-4">
                                <label>Filter with Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 p-4">
                                <label>Filter with Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>

                            <div class="col-sm-3 p-4">
                                <a href="{{ route('admin.product.manage') }}" class="btn btn-primary btn-block" style="margin-top:30px;">All</a>
                            </div>
                        </div>

                      <div class="card-body">
                         <div class="filter_result">
                            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Sl no.</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Subcategory</th>
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
                                   @include('admin.product.partials.product_list')
                                </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
            </div>
        </div>
    </div>
 </div>

 {{-- product filter --}}
 <script>
    $(document).ready(function() {
    // Bind the change event to the filter dropdowns
    $('#category_id, #brand_id, #status').on('change', function() {
        var category_id = $('#category_id').val();
        var brand_id = $('#brand_id').val();
        var status = $('#status').val();

        // Perform the AJAX request
        $.ajax({
            url: "{{ route('admin.product.manage') }}",
            type: 'GET',
            data: {
                category_id: category_id,
                brand_id: brand_id,
                status: status
            },
            success: function(data) {
                // Replace the table body with the filtered data
                $('#tbody').html(data);
            }
        });
    });
});

 </script>
 {{-- product filter --}}
@endsection
