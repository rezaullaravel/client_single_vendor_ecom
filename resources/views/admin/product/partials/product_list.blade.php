@if(count($products) > 0)
    @foreach ($products as $key => $product)
        <tr class="text-center">
            <td>{{ $key + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->category_name }}</td>
            <td>{{ $product->subcategory->subcategory_name }}</td>
            <td>{{ $product->brand->brand_name }}</td>
            <td>
                @if ($product->status == 1)
                    <a href="{{ url('/admin/product-status/deactive', $product->id) }}" class="bg-success btn-sm">Active</a>
                @else
                    <a href="{{ url('/admin/product-status/active', $product->id) }}" class="bg-danger btn-sm">Deactive</a>
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
            <!-- Add more fields like featured, today deal, best selling, thumbnail, etc. -->
            <td><img src="{{ asset($product->thumbnail) }}" alt="" width="80"></td>
            <td>
                <a href="{{ url('admin/product/view', $product->id) }}" class="btn btn-primary btn-sm" title="view"><i class="fa fa-eye"></i></a>
                <a href="{{ url('admin/product/edit', $product->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                <a href="{{ url('admin/product/delete', $product->id) }}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="10" class="text-center">No products found</td>
    </tr>
@endif
