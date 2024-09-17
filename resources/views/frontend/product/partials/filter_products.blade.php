
<div class="product-tab prod1">
    @if ($products->count() > 0)
        <div class="row">
            @foreach ($products as $index => $product)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 product-tab-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div class="grid-arrival">
                            <figure>
                                <a href="{{ url('product/single', $product->id) }}" class="new-gri">
                                    <div class="grid-img">
                                        <img src="{{ asset($product->thumbnail) }}" class="img-responsive" alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"></div>
                        </div>
                        <div class="women">
                            <h6><a href="{{ url('product/single', $product->id) }}">{{ $product->name }}</a></h6>
                            <p>
                                <del>TK.{{ $product->purchase_price }}</del>
                                <em class="item_price">TK.{{ $product->selling_price }}</em>
                            </p>
                            <a href="{{ url('product/single', $product->id) }}" data-text="Add To Cart" class="my-cart-b item_add">Details</a>
                        </div>
                    </div>
                </div>

                {{-- Add margin after every row of products --}}
                 @if (($index + 1) % 3 == 0 && !$loop->last)
                    </div><div class="row" style="margin-top: 20px;">
                @endif
            @endforeach
        </div>

        <div class="clearfix"></div>

        <div>
            {{ $products->links() }}
        </div>
    @else
        <p class="text-center">No products found.</p>
    @endif
</div>



