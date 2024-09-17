<table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
    <thead>
        <tr class="text-center">
            <th class="text-center">Sl no.</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Category</th>
            <th class="text-center">Subcategory</th>
            <th class="text-center">Childcategory</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Status</th>
            <th class="text-center">Featured</th>
            <th class="text-center">Today deal</th>
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
           <td>{{ $product->subcategory->subcategory_name }}</td>
           <td>

            <?php
            if($product->childcategory_id==null){
                echo 'null';
            } else{
                echo $product->childcategory->childcategory_name;
            }
                ?>
           </td>
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
              <img src="{{ asset($product->thumbnail) }}" alt="" width="80">
           </td>

            <td>
                <a href="{{-- route('admin.brand.edit',$brand->id) --}}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                <a href="{{-- route('admin.brand.delete',$brand->id) --}}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
            </td>
          </tr>

       @endforeach
    </tbody>
</table>



<script>
    $('#example').DataTable();
</script>
