@extends('frontend.frontend_master')

@section('title')
Product Page
@endsection

@section('content')
<div class="content">
   <div class="products-agileinfo">
      <h2 class="tittle">{{ $category->category_name }}</h2>

      <div class="container">
         <div class="product-agileinfo-grids w3l">
            <div class="col-md-3 product-agileinfo-grid">
               <div class="categories">
                  <h3>Category</h3>
                  <ul class="tree-list-pad">
                     <li>
                        <input type="checkbox" checked="checked" id="item-0">
                        <label for="item-0">
                        <span></span>{{ $category->category_name }}
                        </label>
                     </li>
                  </ul>
               </div>

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
    function fetchProducts(page = 1) {
        var minPrice = $('#min-price').val();
        var maxPrice = $('#max-price').val();
        var categoryId = {{ $category->id }};
        var brands = [];
        $('.brand-filter:checked').each(function() {
            brands.push($(this).data('id'));
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
    $('.brand-filter').on('change', function() {
        fetchProducts();
    });
});
</script>
