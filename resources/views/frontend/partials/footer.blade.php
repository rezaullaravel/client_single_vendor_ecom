<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>About </h4>
                @php
                  $aboutus = App\Models\AboutUs::first();
                @endphp
                <p>{{ Str::limit($aboutus->description,100) }}</p>
                <div class="social-icon">
                    <a href="#"><i class="icon"></i></a>
                    <a href="#"><i class="icon1"></i></a>
                    <a href="#"><i class="icon2"></i></a>
                    <a href="#"><i class="icon3"></i></a>
                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>My Account</h4>
                <ul>
                    <li><a href="{{ url('checkout') }}">Checkout</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}"> Create Account </a></li>
                    <li><a href="{{ route('shipping.info') }}"> Shipping Info </a></li>
                    <li><a href="{{ route('payment.method') }}"> Payment Method </a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Information</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ url('order-tracking') }}">Order Tracking</a></li>
                    <li><a href="{{ route('faq') }}">Faq</a></li>
                    <li><a href="{{ route('privacy.policy') }}">Privacy & Policy</a></li>
                    <li><a href="{{ route('terms.condition') }}">Terms & Condition</a></li>
                    <li><a href="{{ route('returns.refunds') }}">Returns & Refund</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid foot">
                <h4>Contacts</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">E Comertown Rd, Westby, USA</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">1 599-033-5036</a></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com"> example@mail.com</a></li>

                </ul>
            </div>
        <div class="clearfix"> </div>
        </div>

    </div>
</div>


<div class="copy-section">
    <div class="container">
        <div class="copy-left">
            <p>&copy; 2024 My Shop . All rights reserved | Design by <a href="#">HAR IT</a></p>
        </div>
        <div class="copy-right">
            <img src="{{asset('/')}}frontend/images/card.png" alt=""/>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
