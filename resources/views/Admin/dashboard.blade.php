@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <!-- Sales Report Area -->
    <div class="sales-report-area sales-style-two">
        <div class="row">
            <div class="col-xl-3 col-md-6 mt-5">
                <div class="single-report">
                    <div class="s-sale-inner pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Bids</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected="">Last 7 Days</option>
                                <option value="0">Last 7 Days</option>
                            </select>
                        </div>
                    </div>
                    <canvas id="coin_sales4" height="100"></canvas>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt-5">
                <div class="single-report">
                    <div class="s-sale-inner pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Auctions</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected="">Last 7 Days</option>
                                <option value="0">Last 7 Days</option>
                            </select>
                        </div>
                    </div>
                    <canvas id="coin_sales5" height="100"></canvas>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt-5">
                <div class="single-report">
                    <div class="s-sale-inner pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Categories</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected="">Last 7 Days</option>
                                <option value="0">Last 7 Days</option>
                            </select>
                        </div>
                    </div>
                    <canvas id="coin_sales6" height="100"></canvas>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt-5">
                <div class="single-report">
                    <div class="s-sale-inner pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">New Customers</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected="">Last 7 Days</option>
                                <option value="0">Last 7 Days</option>
                            </select>
                        </div>
                    </div>
                    <canvas id="coin_sales7" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Report Area End -->

    <!-- Todays Bid List -->
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Today's Bid List</h4>
            <div class="table-responsive">
                <table class="dbkit-table">
                    <tbody>
                        <tr class="heading-td">
                            <td>Product Name</td>
                            <td>Product Code</td>
                            <td>Category</td>
                            <td>Seller</td>
                            <td>Bidder</td>
                            <td>Price</td>
                        </tr>
                        <tr>
                            <td>Lady's Sunglass</td>
                            <td>#894750374</td>
                            <td><span class="pending_dot">Pending</span></td>
                            <td>01976 74 92 00</td>
                            <td>9241</td>
                            <td>View Order</td>
                        </tr>
                        <tr>
                            <td>Lady's Sunglass</td>
                            <td>#894750374</td>
                            <td><span class="shipment_dot">Shipment</span></td>
                            <td>01976 74 92 00</td>
                            <td>9241</td>
                            <td>View Order</td>
                        </tr>
                        <tr>
                            <td>Lady's Sunglass</td>
                            <td>#894750374</td>
                            <td><span class="pending_dot">Pending</span></td>
                            <td>01976 74 92 00</td>
                            <td>9241</td>
                            <td>View Order</td>
                        </tr>
                        <tr>
                            <td>Lady's Sunglass</td>
                            <td>#894750374</td>
                            <td><span class="confirmed_dot">Confirmed</span></td>
                            <td>01976 74 92 00</td>
                            <td>9241</td>
                            <td>View Order</td>
                        </tr>
                        <tr>
                            <td>Lady's Sunglass</td>
                            <td>#894750374</td>
                            <td><span class="pending_dot">Pending</span></td>
                            <td>01976 74 92 00</td>
                            <td>9241</td>
                            <td>View Order</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination_area pull-right mt-5">
                <ul>
                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Todays Bid List End -->
@endsection
