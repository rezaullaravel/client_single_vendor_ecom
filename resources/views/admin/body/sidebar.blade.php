<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <img src="{{ asset('/') }}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::guard('admin')->user()->image)
              <img src="{{ asset(Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            @else
              <img src="{{ asset('/') }}admin/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            @endif

        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item {{ (request()->is('admin/dashboard*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                <i class="nav-icon las la-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item {{ (request()->is('admin/user*')) ? 'menu-open' : '' }}">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('admin/category*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/category*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin/category/add') }}"  class=" nav-link {{ (request()->is('admin/category/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.manage') }}" class="nav-link {{ (request()->is('admin/category/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ (request()->is('admin/subcategory*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/subcategory*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                SubCategory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/subcategory*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.subcategory.add') }}"  class=" nav-link {{ (request()->is('admin/subcategory/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subcategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.subcategory.manage') }}" class="nav-link {{ (request()->is('admin/subcategory/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Subcategory</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item {{ (request()->is('admin/brand*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/brand*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/brand*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.brand.add') }}"  class=" nav-link {{ (request()->is('admin/brand/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brand.manage') }}" class="nav-link {{ (request()->is('admin/brand/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage brand</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item {{ (request()->is('admin/coupon*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/coupon') }}" class="nav-link {{ (request()->is('admin/coupon*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                Coupon
              </p>
            </a>
          </li>


          <li class="nav-item {{ (request()->is('admin/color*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/color/list') }}" class="nav-link {{ (request()->is('admin/color*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                Color
              </p>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('admin/delivery*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/delivery-charge') }}" class="nav-link {{ (request()->is('admin/delivery*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                Delivery Charge
              </p>
            </a>
          </li>


          <li class="nav-item {{ (request()->is('admin/product*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/product*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ url('admin/product/add') }}"  class=" nav-link {{ (request()->is('admin/product/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/product/manage') }}" class="nav-link {{ (request()->is('admin/product/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage product</p>
                </a>
              </li>
            </ul>
          </li>


          {{-- order start --}}
          <li class="nav-item {{ (request()->is('admin/order*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/order*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/order*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.order.all') }}"  class=" nav-link {{ (request()->is('admin/order/all')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Order</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- order end --}}


           {{-- slider start --}}
           <li class="nav-item {{ (request()->is('admin/slider*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/slider*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/slider*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.slider.add') }}"  class=" nav-link {{ (request()->is('admin/slider/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.slider.manage') }}" class="nav-link {{ (request()->is('admin/slider/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Slider</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- slider end --}}

          <li class="nav-item {{ (request()->is('admin/about*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/about-us') }}" class="nav-link {{ (request()->is('admin/about*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                About Us
              </p>
            </a>
          </li>


          {{-- contact us start --}}
          <li class="nav-item {{ (request()->is('admin/contact*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/contact*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/contact*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.contact.all') }}"  class=" nav-link {{ (request()->is('admin/contact/all')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Message</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- contact us end --}}

          {{-- faq --}}
          <li class="nav-item {{ (request()->is('admin/faq*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/faq') }}" class="nav-link {{ (request()->is('admin/faq*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                Faq
              </p>
            </a>
          </li>
          {{-- faq --}}

          {{-- setting --}}
          <li class="nav-item {{ (request()->is('admin/setting*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/setting*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-hand-point-right"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/setting*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.setting.profile') }}"  class=" nav-link {{ (request()->is('admin/setting/profile')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.setting.password') }}" class="nav-link {{ (request()->is('admin/setting/password')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Password Change</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- setting --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
