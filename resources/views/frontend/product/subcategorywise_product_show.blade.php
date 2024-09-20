@extends('frontend.frontend_master')

@section('title')
Product Page
@endsection

@section('content')
<div class="content">
   <div class="products-agileinfo">
      <h2 class="tittle">{{ $category->category_name }} </h2>

      <div class="container">
         <div class="product-agileinfo-grids w3l">
            <div class="col-md-3 product-agileinfo-grid">

                @if (count($products) > 0)
                <div class="brand-w3l">
                   <h3>Category Filter</h3>
                   <div class="form-check">
                      @foreach ($subcategories as $subcat)
                      <input type="checkbox" class="subcat-filter" {{ $subcategory->id==$subcat->id ? 'checked':'' }} data-id="{{ $subcat->id }}">
                      <span class="label-text">{{ $subcat->subcategory_name }}</span><br>
                      @endforeach
                   </div>
                </div>
                @endif


                @if (count($products) > 0)
                <div class="brand-w3l">
                   <h3>Brands Filter</h3>
                   <div class="form-check">
                      @foreach ($brands as $brand)
                      <input type="checkbox" class="brand-filter" data-id="{{ $brand->id }}">
                      <span class="label-text">{{ $brand->brand_name }}</span><br>
                      @endforeach
                   </div>
                </div>
                @endif

                @if (count($products) > 0)
                    <div class="brand-w3l">
                        <h3>Color Filter</h3>
                        <div class="form-check">
                            @foreach ($colors as $color)
                                <a href="#" class="color-option" data-id="{{ $color->id }}"
                                style="background-color: {{ $color->code }}; display: inline-block; width: 20px; height: 20px; border-radius: 50%; margin-right: 5px; border: 2px solid transparent;">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif



               @if (count($products) > 0)
               <div class="price">
                  <h3>Price Range</h3>
                  <form id="price-form">
                     <div class="form-group">
                        <input type="number" id="min-price" min="1" class="form-control" placeholder="Min">
                     </div>
                     <div class="form-group">
                        <input type="number" id="max-price" min="1" class="form-control" placeholder="Max">
                     </div>
                     <div class="form-group">
                        <button type="button" id="filter-price" class="btn btn-info btn-sm">Filter</button>
                     </div>
                  </form>
               </div>
               @endif

            </div><!-- col-md-3 -->

            <div class="col-md-9 product-agileinfon-grid1 w3l">
               <div class="mens-toolbar">
                  <p id="product-count">Showing {{ $products->total() }} results</p> <!-- Use $products->total() to get total number of results -->

                  <p class="showing">
                     Sorting By
                     <select id="sort-select">
                        <option value="" selected disabled>Select</option>
                        <option value="price-asc">Price low to high</option>
                        <option value="price-desc">Price high to low</option>
                     </select>
                  </p>
                  <div class="clearfix"></div>
               </div>

               <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                  <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div id="product-list" class="product-tab prod1">
                           @include('frontend.product.partials.filter_products', ['products' => $products])
                        </div>
                     </div>
                  </div>
               </div>

               {{-- pagination --}}
               {{ $products->links() }}
               {{-- pagination end --}}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize variables
            var selectedColorId = null;

             // Handle color click event
            $(document).on('click', '.color-option', function(e) {
                e.preventDefault(); // Prevent the default link behavior

                var clickedColorId = $(this).data('id');

                // Check if the clicked color is already selected
                if (selectedColorId === clickedColorId) {
                    // If it's selected, unselect it
                    selectedColorId = null;
                    $(this).css('border', '2px solid transparent'); // Remove the border
                } else {
                    // If it's not selected, unselect the previous and select the new one
                    $('.color-option').css('border', '2px solid transparent'); // Unselect all
                    selectedColorId = clickedColorId;
                    $(this).css('border', '2px solid #000'); // Highlight the new selection
                }

                // Fetch products after selecting/unselecting color
                fetchProducts();
            });

            // Fetch products function
            function fetchProducts(page = 1) {
                var minPrice = $('#min-price').val();
                var maxPrice = $('#max-price').val();
                var categoryId = {{ $category->id }};
                var brands = [];
                var subcats = [];

                // Collect selected brands
                $('.brand-filter:checked').each(function() {
                    brands.push($(this).data('id'));
                });

                // Collect selected subcategories
                $('.subcat-filter:checked').each(function() {
                    subcats.push($(this).data('id'));
                });

                var sort = $('#sort-select').val();

                $.ajax({
                    url: "{{ route('products.filter') }}?page=" + page,
                    method: 'GET',
                    data: {
                        category_id: categoryId,
                        min_price: minPrice,
                        max_price: maxPrice,
                        brands: brands,
                        subcats: subcats,
                        color:selectedColorId,
                        sort: sort
                    },
                    success: function(response) {
                        $('#product-list').html(response);

                        // Update the product count
                        var productCount = $(response).find('.product-tab-grid').length;
                        $('#product-count').html('<p>Showing ' + productCount + ' results</p>');
                    }
                });
            }

            // Filter products by price
            $('#filter-price').on('click', function() {
                fetchProducts();
            });

            // Event delegation for pagination links
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetchProducts(page);
            });

            // Sort products
            $('#sort-select').on('change', function() {
                fetchProducts();
            });

            // Filter by brand
            $(document).on('change', '.brand-filter', function() {
                fetchProducts();
            });

            // Filter by subcategory
            $(document).on('change', '.subcat-filter', function() {
                fetchProducts();
            });
        });
        </script>


