@extends('frontend.frontend_master')
@section('title')
Search Product
@endsection
@section('content')
<div class="content">
   <!--search product-->
   <div class="new-arrivals-w3agile">
      <div class="container">
         <div class="arrivals-grids">
            @if (count($products)>0)
            @foreach ($products  as $product)
            <div class="col-md-3 arrival-grid simpleCart_shelfItem">
               <div class="grid-arr">
                  <div  class="grid-arrival">
                     <figure>
                        <a href="{{ url('product/single',$product->id) }}" class="new-gri">
                           <div class="grid-img">
                              <img  src="{{asset($product->thumbnail)}}" class="img-responsive" alt="">
                           </div>
                        </a>
                     </figure>
                  </div>
                  <div class="block">
                     <div class="starbox small ghosting"> </div>
                  </div>
                  <div class="women">
                     <h6><a href="{{ url('product/single',$product->id) }}">{{ $product->name }}</a></h6>
                     <p >
                        <del>TK.{{ $product->purchase_price }}</del>
                        <em class="item_price">TK.{{ $product->selling_price }}</em>
                     </p>
                     <a href="{{ url('product/single',$product->id) }}" data-text="Add To Cart" class="my-cart-b item_add">Details</a>
                  </div>
               </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
            <div>
               {{ $products->appends(request()->query())->links() }}
            </div>
            @else
            <p class="text-center">No products found ....</p>
            @endif
         </div>
      </div>
   </div>
   <!--search product end-->
</div>
@endsection
