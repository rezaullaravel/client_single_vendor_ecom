@extends('frontend.frontend_master')
@section('title')
Wishlist
@endsection
<style>
    .form-control{
        width:80px !important;
    }
</style>
@section('main-content')
<!--banner-->
<div class="banner-top" style="margin-top: 15px;">
   <div class="container">
      <h3 >Wishlist</h3>
      <h4><a href="{{ url('/') }}">Home</a><label>/</label>Wishlist</h4>
      <div class="clearfix"> </div>
   </div>
</div>
<!-- contact -->
<div class="check-out">
   <div class="container">
      <div class="spec ">
         <h3>Wishlist</h3>
         <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
         </div>
      </div>

      <div class="alert alert-success" style="display: none;">

      </div>


      @if(Auth::check())

      @php
        $wishlists = App\Models\Wishlist::where('user_id',Auth::user()->id)->get();
      @endphp

        @if (count($wishlists)>0)
        <table class="table">
            <tr>
               <th class="t-head" style="text-align: center;">Sl no.</th>
               <th class="t-head head-it" style="text-align: center;">Products</th>
               <th class="t-head" style="text-align: center;">Thumbnail</th>
               <th class="t-head" style="text-align: center;">Price</th>
               <th class="t-head" style="text-align: center;">Quantity</th>
               <th class="t-head" style="text-align: center;">Color</th>
               <th class="t-head" style="text-align: center;">Size</th>
               <th class="t-head" style="text-align: center;">Add To Cart</th>
               <th class="t-head" style="text-align: center;">Action</th>
            </tr>




            @foreach ($wishlists as $key => $wishlist)
               <tr class="cross wishlistpage" style="text-align: center;">
                   <td class="t-data">{{ $key+1 }} </td>
                   <td class="t-data">
                           {{ $wishlist->product->name }}
                   </td>
                   <td class="t-data">
                       <img src="{{ asset($wishlist->product->thumbnail) }}" alt="" width="80" height="80">
                   </td>
                   <td class="t-data">{{ $wishlist->product->selling_price }} TK.</td>
                 {{-- <form action="{{ url('/addTocart-from/wishlist') }}" method="POST">
                    @csrf --}}

                   <td class="t-data">
                    <input type="hidden" name="id" value="{{ $wishlist->id }}">
                     <input type="number" min="1" value="1"  name="quantity" class="form-control quantity" required>
                   </td>
                   <td class="t-data">
                    <select name="color"  class="form-control color" required>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select>
                   </td>

                   <td class="t-data">
                    <select name="size"  class="form-control size" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                   </td>

                   <td class="t-data t-w3l">
                        <button  class="add-1 addTocart" title="Add To Cart"
                        data-id={{ $wishlist->id }},
                        >
                            <i class="fa fa-plus"></i>
                        </button>
                   </td>
                {{-- </form> --}}

                   <td class="t-data">
                       <a href="{{ url('/wishlist-product/delete',$wishlist->id) }}" class="btn btn-danger" title="Remove"><i class="fa fa-trash"></i></a>
                   </td>
               </tr>
            @endforeach
         </table>
        @else
         <h3 class="text-danger text-center">Your wishlist is empty.....</h3>
        @endif

      @endif
   </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
{{-- ajax setup --}}
<script>
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

</script>
{{-- ajax setup end --}}


{{-- add to cart product by ajax --}}
 {{-- this code is in frontend master page --}}
 {{-- add to cart product by ajax end--}}


 {{-- refresh page and keep scroll position --}}
 <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
