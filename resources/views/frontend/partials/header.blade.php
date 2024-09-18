
<style>

/* General Reset */
body, div, a, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box; /* Ensures padding and border are included in width/height */
}

.header-top {
    background: #1565c0;
    padding: .7em 0;
}

.top-left, .top-right, .top-middle {
    display: inline-block;
    vertical-align: middle; /* Aligns inline-block elements vertically */
}

.top-left {
    float: left;
    margin-right: 1em;
}

.top-middle {
    text-align: center; /* Center align the form */
    display: inline-flex; /* Align input and button horizontally */
    align-items: center; /* Center align items vertically */
}

.top-middle form {
    display: inline-flex; /* Align input and button horizontally */
    align-items: center; /* Center align items vertically */
}

.top-middle input[type="text"] {
    padding: .5em;
    border: none;
    border-radius: .3em;
    width: 100%;
    max-width: 300px; /* Adjust as needed */
    margin-right: 0.5em; /* Space between input and button */
}

.top-middle button {
    padding: .5em 1em;
    border: none;
    border-radius: .3em;
    background-color: #fff; /* Button background color */
    color: #1565c0; /* Button text color */
    font-size: 1em;
    font-weight: 600;
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth background color transition */
}

.top-middle button:hover {
    background-color: #e0e0e0; /* Change background on hover */
}

.top-right {
    float: right;
    display: inline-flex; /* Align login button horizontally with other elements */
    align-items: center; /* Center align items vertically */
}

.top-right ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex; /* Display items in a horizontal row */
}

.top-right ul li {
    padding: 0 1em;
    display: inline-block;
}

.top-right ul li a {
    font-size: 1em;
    text-transform: capitalize;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-family: 'Open Sans', sans-serif;
}

.top-right ul li.text a {
    color: #fff;
}

/* Clearfix for floated elements */
.header-top::after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .top-middle input[type="text"] {
        width: 100%; /* Full width on smaller screens */
        margin-right: 0; /* Remove margin for full-width input */
    }

    .top-middle button {
        width: 100%; /* Full width button on smaller screens */
         /* Space above button on smaller screens */
    }

    .top-right {
        float: none; /* Remove float for small screens */
        text-align: center; /* Center align items on smaller screens */
    }
}



</style>
<div class="header">
    <div class="header-top">
       <div class="container">
          <div class="top-left col-md-4">
             <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
          </div>
          <div class="top-middle">
            <form action="{{ route('product.search') }}" method="GET">
                <input type="text" name="string" placeholder="search here....">
                <button type="submit">Search</button>
             </form>
          </div>
          <div class="top-right">
             <ul>
                @if (Auth::check())
                   <li><a href="{{ url('/home') }}"> Dashboard </a></li>
                @else
                   <li><a href="{{ url('/login') }}">Login</a></li>
                @endif

             </ul>
          </div>
          <div class="clearfix"></div>
       </div>
    </div>
    <div class="heder-bottom">
       <div class="container">
          <div class="logo-nav">
             <div class="logo-nav-left">
                <h1><a href="{{ url('/') }}">My Shop <span>Shop anywhere</span></a></h1>
             </div>
             <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                   <!-- Brand and toggle get grouped for better mobile display -->
                   <div class="navbar-header nav_2">
                      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      </button>
                   </div>
                   <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                      <ul class="nav navbar-nav">
                         <li class="active"><a href="{{ url('/') }}" class="act">Home</a></li>
                         <!-- Mega Menu -->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                               <div class="row">
                                @php
                                    $categories = App\Models\Category::all();
                                @endphp
                                  <div class="col-sm-3 col-xs-3">
                                     <ul class="multi-column-dropdown">
                                        @foreach ($categories as $category)
                                          <li><a href="{{ route('category-wise.product.show',$category->id) }}">{{ $category->category_name }}</a></li>
                                        @endforeach
                                     </ul>
                                  </div>
                                  <div class="clearfix"></div>
                               </div>
                            </ul>
                         </li>
                         <li><a href="{{ route('about') }}">About Us</a></li>
                         <li><a href="{{ route('contact') }}">Contact Us</a></li>
                         <li><a href="{{ route('order.track') }}">Order Tracking</a></li>
                      </ul>
                   </div>
                </nav>
             </div>

             <div class="header-right2">
                <div class="cart box_1">
                   <a href="{{ url('/cart/view') }}">
                      <h3>
                         <div class="total">
                            @if (Auth::check())
                            @php
                            $products =App\Models\ShoppingCart::where('user_id',Auth::user()->id)->count();
                            @endphp
                            (<span id="simpleCart_quantity">{{ $products }}</span> items)
                            @endif
                         </div>
                         <img src="{{asset('/')}}frontend/images/bag.png" alt="" />
                      </h3>
                   </a>
                   <div class="clearfix"> </div>
                </div>
             </div>
             <div class="clearfix"> </div>
          </div>
       </div>
    </div>
 </div>
