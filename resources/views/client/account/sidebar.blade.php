<ul class="nav flex-column nav-pills nav-pills-dark">
    <!-- nav item -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('client/account/orders*') ? 'active' : '' }}" href="/client/account/orders">
            <i class="feather-icon icon-shopping-bag me-2"></i>
            Your Orders
        </a>
    </li>
    <!-- nav item -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('client/account/settings') || Request::is('client/account/settings*') ? 'active' : '' }}" href="/client/account/settings">
            <i class="feather-icon icon-settings me-2"></i>
            Profile Settings
        </a>
    </li>
    <!-- nav item -->
    {{-- You can add more items here if needed --}}

    <li class="nav-item">
        <hr>
    </li>
    <!-- nav item -->
    <li class="nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="feather-icon icon-log-out me-2"></i>
            Log out
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
