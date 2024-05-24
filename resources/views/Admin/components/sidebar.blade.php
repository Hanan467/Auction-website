<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="" style="font-weight: 800; color: azure;">
                <h1>Bidify</h1>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Users</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('admin.users.bidders') }}">Bidders</a></li>
                            <li><a href="{{ route('admin.users.sellers') }}">Sellers</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('admin/bids/*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Bids</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('admin/bids/active') ? 'active' : '' }}"><a href="{{ route('admin.bids.active') }}">Active bids</a></li>
                            <li class="{{ request()->is('admin/bids/closed') ? 'active' : '' }}"><a href="{{ route('admin.bids.closed') }}">Closed bids</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('admin/categories') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories') }}" aria-expanded="true"><i class="ti-pie-chart"></i><span>Categories</span></a>
                    </li>
                    <li class="{{ request()->is('admin/requests') ? 'active' : '' }}">
                        <a href="{{ route('admin.requests') }}" aria-expanded="true"><i class="ti-palette"></i><span>Request</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
