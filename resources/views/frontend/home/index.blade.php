@extends('frontend.frontend_master')

@section('title')
Home Page
@endsection


@section('content')
@include('frontend.partials.slider')
<div class="content">

    <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h2 class="tittle">New Arrivals</h2>
                <div class="arrivals-grids">
                  @foreach ($newArrivalProducts  as $product)
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
                                {{-- <div class="ribben">
                                    <p>NEW</p>
                                </div> --}}
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
                </div>
            </div>
        </div>
    <!--new-arrivals-->

    <!--best-selling-product-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h2 class="tittle">Best Selling Products</h2>
                <div class="arrivals-grids">
                @foreach ($bestSellingProducts  as $product)
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
                                {{-- <div class="ribben">
                                    <p>Best Selling</p>
                                </div> --}}
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="women">
                                    <h6><a href="{{ url('product/single',$product->id) }}">{{ $product->name }}</a></h6>
                                    <p ><del>TK.{{ $product->purchase_price }}</del><em class="item_price">TK.{{ $product->selling_price }}</em></p>
                                    <a href="{{ url('product/single',$product->id) }}" data-text="Add To Cart" class="my-cart-b item_add">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--best-selling-product-->


    <!--featured-product-->
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Featured Products</h2>
            <div class="arrivals-grids">
            @foreach ($featuredProducts  as $product)
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
                            {{-- <div class="ribben">
                                <p>Featured</p>
                            </div> --}}
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="{{ url('product/single',$product->id) }}">{{ $product->name }}</a></h6>
                                <p ><del>TK.{{ $product->purchase_price }}</del><em class="item_price">TK.{{ $product->selling_price }}</em></p>
                                <a href="{{ url('product/single',$product->id) }}" data-text="Add To Cart" class="my-cart-b item_add">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<!--featured-product-->

</div>
@endsection
