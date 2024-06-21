<div class="header-area header-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                       
                            <li class="active">
                                <a href="{{ route('bidder.auctions') }}"><i class="ti-layout-list-thumb"></i><span>Auctions
                                        </span></a>
                    
                            </li>
                            <li>
                                <a href="{{ route('bidder.auctions.history') }}" i class="ti-pie-chart"></i><span>  Bid history</span></a>
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

