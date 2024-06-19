<div class="header-area header-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                        <a href="{{ route('seller.dashboard') }}"><i class="ti-dashboard"></i><span>  Dashboard</span></a>
                            </li>
                            <li class="active">
                                <a href=""><i class="ti-layout-list-thumb"></i><span>My Items
                                        </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('seller.myitems.listed') }}">On bid</a></li>
                                    <li class="active"><a href="{{ route('seller.myitems.pending')}}">Pending</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('seller.additems')}}" i class="ti-pie-chart"></i><span>  Add item</span></a>
                            </li>
                            <!-- Add more menu items as needed -->
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 clearfix">
                <div class="search-box">
                    <form action="#">
                        <input type="text" name="search" placeholder="Search..." required>
                        <i class="ti-search"></i>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

