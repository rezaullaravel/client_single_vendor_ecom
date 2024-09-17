
<style>
    .menu_active{
        background: rgb(218, 210, 210);
    }
</style>

<div class="list-group">
    <a href="{{ url('home') }}" class="list-group-item {{ request()->is('home') ? 'menu_active':'' }}">Dashboard</a>

    <a href="{{ url('my-order-list') }}" class="list-group-item {{ request()->is('my-order*') ? 'menu_active':'' }}">My Order</a>

    <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
 </div>
