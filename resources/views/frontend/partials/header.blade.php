
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

<style>
    .multi-column-dropdown li a:hover {
    color: #fff !important; /* Change text color on hover */
    background-color: #007bff; /* Add background color on hover */
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
                            @php
                            $categories = App\Models\Category::all();
                            @endphp

                                @foreach ($categories as $category)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name }}
                                        @if (!empty($category->subcategories) && $category->subcategories->count() > 0)
                                            <b class="caret"></b>
                                        @endif
                                    </a>

                                    @if (!empty($category->subcategories) && $category->subcategories->count() > 0)
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-3">
                                                    <ul class="multi-column-dropdown">
                                                        @foreach ($category->subcategories as $subcategory)
                                                            <li><a href="{{ route('subcategory-wise.product.show',$subcategory->id) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
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
