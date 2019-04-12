<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin<sup>NEWS</sup></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li>
    </li>
    <hr class="sidebar-divider">
    
    <li style="margin-left:20px; font-size:20px; margin-bottom:20px;" class="nav-item active">
        <i class="fa fa-user"></i>
        <a href="/admin" style="text-decoration: none;">
        <span style="color:white">User</span>
        </a>
    </li>

    <li style="margin-left:20px; font-size:20px; margin-bottom:20px;" class="nav-item active">
        <i class="fas fa-align-left"></i>
        <a href="/admin/categories" style="text-decoration: none;">
        <span style="color:white">Category</span>
        </a>
    </li>

    <li style="margin-left:15px; font-size:20px; margin-bottom:20px;" class="nav-item active">
        <i class="fab fa-accusoft"></i>
        <a href="/admin/news" style="text-decoration: none;">
        <span style="color:white">News</span>
        </a>
    </li>
    <li style="font-size:20px; margin-bottom:20px; text-decoration: none;">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><span style="color:white">{{ __('Logout') }}</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul> 
