@extends('frontend.frontend_master')
@section('title')
Product Single Page
@endsection
@section('content')

<style>
   .custom-radio-buttons {
   display: flex;
   align-items: center;
   gap: 10px; /* Adjust gap between button and text */
   }
   .custom-radio-buttons .btn {
   font-size: 12px; /* Font size for the radio button text and icon */
   width: 20px; /* Width of the button */
   height: 20px; /* Height of the button */
   padding: 0; /* Remove padding */
   border-radius: 50%; /* Circular shape */
   }
   .custom-radio-buttons .btn i {
   font-size: 10px; /* Size of the icon */
   }
   .custom-radio-buttons .btn input[type="radio"] {
   display: none; /* Hide the actual radio button */
   }
</style>
<div class="content">
   <!--single-->
   <div class="single-wl3">
      <div class="container">
         <div class="single-grids">
            <div class="col-md-12 single-grid">
               <div clas="single-top">
                  <div class="single-left">
                     <div class="flexslider">
                        <ul class="slides">
                           @if (count($product->productMultiImage) > 0)
                           @foreach ($product->productMultiImage as $image)
                           <li data-thumb="{{asset($image->product_image)}}">
                              <div class="thumb-image">
                                 <img src="{{asset($image->product_image)}}" data-imagezoom="true" class="img-responsive">
                              </div>
                           </li>
                           @endforeach
                           @else
                           <li data-thumb="{{asset($product->thumbnail)}}">
                              <div class="thumb-image">
                                 <img src="{{asset($product->thumbnail)}}" data-imagezoom="true" class="img-responsive">
                              </div>
                           </li>
                           @endif
                        </ul>
                     </div>
                  </div>
                  <div class="single-right simpleCart_shelfItem">
                     <h4>{{ $product->name }}</h4>
                     <div class="custom-radio-buttons" data-toggle="buttons">
                        @if ($product->stock_availability=='1')
                        <label class="btn btn-success btn-sm btn-circle active">
                        <input type="radio" name="q2" value="1">
                        <i class="glyphicon glyphicon-ok"></i>
                        </label>
                        <span class="stock-text">In Stock</span>
                        @else
                        <label class="btn btn-danger btn-sm btn-circle">
                        <input type="radio" name="q2" value="2">
                        <i class="glyphicon glyphicon-remove"></i>
                        </label>
                        <span class="stock-text">Out of Stock</span>
                        @endif
                        <span class="code-text" style="margin-left: 14px;">Code: {{ $product->code }}</span>
                     </div>
                     <div class="block">
                        <div class="starbox small ghosting"> </div>
                     </div>
                     <p class="price item_price"><del>TK.{{ $product->purchase_price }}</del></p>
                     @if (!empty($product->discount_price))
                     <p>Discount <strong>({{ $product->discount_price }}%)</strong></p>
                     @endif
                     <p class="price item_price">TK. {{ $product->selling_price }}</p>
                     <div class="description">
                        <p><span>Description : </span> {!! $product->description !!}</p>
                     </div>
                     <form action="{{ url('/addTo/cart') }}" method="POST">
                        @csrf
                        <div class="color-quality">
                           <h6>Quantity :</h6>
                           <div class="quantity">
                              <div class="quantity-select">
                                 <div class="entry value-minus1">&nbsp;</div>
                                 <input type="text" name="quantity" class="value1" value="1" readonly>
                                 <div class="entry value-plus1 active">&nbsp;</div>
                              </div>
                           </div>
                           <!--quantity-->
                           <script>
                              $('.value-plus1').on('click', function(){
                                      var input = $(this).parent().find('.value1');
                                      var newVal = parseInt(input.val(), 10) + 1;
                                      input.val(newVal);
                                  });

                                  $('.value-minus1').on('click', function(){
                                      var input = $(this).parent().find('.value1');
                                      var newVal = parseInt(input.val(), 10) - 1;
                                      if(newVal >= 1) {
                                          input.val(newVal);
                                      }
                                  });

                           </script>
                           <!--quantity-->
                        </div>
                        <div class="color-quality">
                           <h6>Color:
                           </h6>
                           @foreach($product->colors as $color)
                           <div style="display: inline-block; margin-right: 10px;">
                              <input type="radio" name="color_id" id="color_{{ $color->id }}" value="{{ $color->id }}" data-color="{{ $color->code }}" style="display: none;" required>
                              <label for="color_{{ $color->id }}" class="color-label" style="background: {{ $color->code }}; display: inline-block; width: 25px; height: 25px; border-radius: 50%; border: 2px solid transparent; cursor: pointer;"></label>
                           </div>
                           @endforeach
                           <!-- Selected color ID (hidden) -->
                           <p id="selectedColorIdWrapper" style="display: none;">
                              Selected Color ID: <span id="selectedColorId">None</span>
                           </p>
                           <script>
                              const colorLabels = document.querySelectorAll('.color-label');
                              const selectedColorDisplay = document.getElementById('selectedColorId');

                              colorLabels.forEach(label => {
                                  label.addEventListener('click', function() {
                                      // Get the corresponding radio button
                                      const radio = document.getElementById(this.getAttribute('for'));

                                      // Select the radio button
                                      radio.checked = true;

                                      // Show the selected color's ID (this part won't be visible because the p tag is hidden)
                                      selectedColorDisplay.textContent = radio.value;

                                      // Highlight the selected color by changing the border
                                      colorLabels.forEach(l => l.style.border = '2px solid transparent');  // Reset all borders
                                      this.style.border = '2px solid black';  // Highlight the selected color
                                  });
                              });
                           </script>
                        </div>
                        <div class="women">
                           <input type="hidden" name="product_id" value="{{ $product->id }}">
                           <button type="submit" class="my-cart-b item_add">Add To Cart</button>
                        </div>
                     </form>
                  </div>
                  <div class="clearfix"> </div>
               </div>
            </div>
            <div class="clearfix"> </div>
         </div>
         <!--Product Description-->
         <div class="product-w3agile">
            <h3 class="tittle1">Product Description</h3>
            <div class="product-grids">
               <div class="col-md-12 product-grid1">
                  <div class="tab-wl3">
                     <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                           <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                           <li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews ({{ count( $product_reviews) }})</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                           <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                              <div class="descr">
                                 <h4>{{ $product->name }} </h4>
                                 <p>{!! $product->description !!}</p>
                                 <div class="video">
                                    {!! $product->video !!}
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
                              <div class="descr">
                                @foreach ($product_reviews as $review)
                                    <div class="reviews-top">
                                        <div class="reviews-left">
                                        <img src="{{asset('/')}}frontend/images/men3.jpg" alt=" " class="img-responsive">
                                        </div>
                                        <div class="reviews-right">

                                        <ul>
                                            <li><a href="#">{{ $review->user->name }}</a></li>
                                        </ul>

                                        <ul>
                                            <li><a href="#">{{ $review->created_at }}</a></li>
                                        </ul>
                                        <p>{{ $review->review }}</p>
                                        @if ($review->rating_point == 5)
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                        @endif

                                        @if ($review->rating_point == 4)
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                        @endif

                                        @if ($review->rating_point == 3)
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                        @endif

                                        @if ($review->rating_point == 2)
                                            <span class="fa fa-star checked text-success"></span>
                                            <span class="fa fa-star checked text-success"></span>
                                        @endif

                                        @if ($review->rating_point == 1)
                                            <span class="fa fa-star checked text-success"></span>
                                        @endif

                                        </div>
                                        <div class="clearfix"></div>
                                    </div> <br>
                                 @endforeach
                                 <div class="reviews-bottom">
                                    <h4>Add Reviews</h4>


                                    <form action="{{ url('product/review') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="form-group" style="margin-top: 17px;">
                                            <textarea name="review" id=""  rows="7" placeholder="Write your review" class="form-control"></textarea>
                                            @error('review')
                                               <span class="text-danger">{{ $message }}

                                               </span>
                                            @enderror
                                        </div>

                                        <div class="form-group" style="margin-top: 17px;">
                                            <select name="rating_point" id="" class="form-control">
                                                <option selected disabled>Rating Point</option>
                                                <option value="1">Rating Point One</option>
                                                <option value="2">Rating Point Two</option>
                                                <option value="3">Rating Point Three</option>
                                                <option value="4">Rating Point Four</option>
                                                <option value="5">Rating Point Five</option>
                                            </select>
                                            @error('rating_point')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                        <button type="submit"  class="btn btn-success">Submit Review</button>
                                        </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <!--Product Description-->
      </div>
   </div>
   <!--single-->
   <!--related product-->
   @if (!empty($related_products))
   <div class="new-arrivals-w3agile">
      <div class="container">
         <div class="row">
            <div class="row">
               <div class="col-md-9">
                  <h3>Related Product</h3>
               </div>
               <div class="col-md-3">
                  <!-- Controls -->
                  <div class="controls pull-right">
                     <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a>
                     <a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
                  </div>
               </div>
            </div>
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
               <!-- Wrapper for slides -->
               <div class="carousel-inner">
                  <!-- First Item -->
                  <div class="item active">
                     <div class="row">
                        @foreach($related_products as $product)
                        <div class="col-sm-3">
                           <div class="col-item">
                              <div class="photo">
                                 <img src="{{ asset($product->thumbnail) }}" class="img-responsive" alt="{{ $product->name }}" />
                              </div>
                              <div class="info">
                                 <div class="row">
                                    <div class="price col-md-6">
                                       <h5>{{ $product->name }}</h5>
                                       <h5 class="price-text-color">TK.{{ $product->selling_price }}</h5>
                                    </div>
                                    {{--
                                    <div class="rating hidden-sm col-md-6">
                                       @for ($i = 0; $i < 5; $i++)
                                       <i class="{{ $i < $product->rating ? 'price-text-color fa fa-star' : 'fa fa-star' }}"></i>
                                       @endfor
                                    </div>
                                    --}}
                                 </div>
                                 <div class="separator clear-left">
                                    {{--
                                    <p class="btn-add">
                                       <i class="fa fa-shopping-cart"></i>
                                       <a href="{{ url('/product/single',$product->id) }}" class="hidden-sm">Details</a>
                                    </p>
                                    --}}
                                    <p class="btn-details">
                                       <i class="fa fa-list"></i>
                                       <a href="{{ url('/product/single',$product->id) }}" class="hidden-sm">Details</a>
                                    </p>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <!-- Second Item -->
                  <div class="item">
                     <div class="row">
                        @foreach($related_products as $product)
                        <div class="col-sm-3">
                           <div class="col-item">
                              <div class="photo">
                                 <img src="{{ asset($product->thumbnail) }}" class="img-responsive" alt="{{ $product->name }}" />
                              </div>
                              <div class="info">
                                 <div class="row">
                                    <div class="price col-md-6">
                                       <h5>{{ $product->name }}</h5>
                                       <h5 class="price-text-color">TK.{{ $product->selling_price }}</h5>
                                    </div>
                                    {{--
                                    <div class="rating hidden-sm col-md-6">
                                       @for ($i = 0; $i < 5; $i++)
                                       <i class="{{ $i < $product->rating ? 'price-text-color fa fa-star' : 'fa fa-star' }}"></i>
                                       @endfor
                                    </div>
                                    --}}
                                 </div>
                                 <div class="separator clear-left">
                                    {{--
                                    <p class="btn-add">
                                       <i class="fa fa-shopping-cart"></i>
                                       <a href="{{ $product->add_to_cart_url }}" class="hidden-sm">Add to cart</a>
                                    </p>
                                    --}}
                                    <p class="btn-details">
                                       <i class="fa fa-list"></i>
                                       <a href="{{ url('product/single',$product->id) }}" class="hidden-sm">Details</a>
                                    </p>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
   <!--related product end-->
</div>
@endsection
