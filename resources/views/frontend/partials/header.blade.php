
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



<style>
.home{
    color:#fff;
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
                <input type="text"  name="string" placeholder="search here....">
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
    {{-- header bottom --}}
    <div class="header-bottom">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">MyShop</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="home"><a href="/">Home</a></li>

                    @php
                        $categories = App\Models\Category::all();
                    @endphp
                   @foreach ($categories as $category)
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff;">{{ $category->category_name }} @if (!empty($category->subcategories) && $category->subcategories->count() > 0)
                        <b class="caret"></b>
                    @endif
                   </a>
                   @if (!empty($category->subcategories) && $category->subcategories->count() > 0)
                    <ul class="dropdown-menu">
                        @foreach ($category->subcategories as $subcategory)
                          <li><a href="{{ route('subcategory-wise.product.show',$subcategory->id) }}">{{ $subcategory->subcategory_name }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                  </li>
                  @endforeach

                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="{{ url('/cart/view') }}">

                        <div class="total">
                            @if (Auth::check())
                            @php
                               $products =App\Models\ShoppingCart::where('user_id',Auth::user()->id)->count();
                            @endphp
                            (<span id="simpleCart_quantity">{{ $products }}</span> items)
                            @endif
                        </div>
                        <img src="{{asset('/')}}frontend/images/bag.png" alt="" />

                     </a>
                   </li>
                </ul>
              </div>
            </div>
        </nav>
    </div>

    {{-- header bottom --}}
 </div>
