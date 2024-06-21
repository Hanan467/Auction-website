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
                       
                        </div>
                        <div class="mt-2">
                            <h2>{{ $totalActiveBids }}</h2>
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
                            
                        </div>
                        <div class="mt-2">
                            <h2>{{ $totalAuctions }}</h2>
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
                           
                        </div>
                        <div class="mt-2">
                            <h2>{{ $totalCategories }}</h2>
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
                        <div class="mt-2">
                            <h2>{{ $newCustomers }}</h2>
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
                                <th>Image</th>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Seller Name</th>
                                <th>Top bidder</th>
                                <th>Amount</th>
                        </tr>
                        @foreach ($todaysBids as $bid)
                            <tr>
                            <td><img src="{{ $bid->image_path }}" alt="{{ $bid->item_name }}" style="width: 200px; height: 100px;"></td>
                                    <td>{{ $bid->item_name }}</td>
                                    <td>{{ $bid->name }}</td>
                                    <td>{{ $bid->seller_name }}</td>
                                    <td>{{ $bid->bidder_name }}</td>
                                    <td>{{ $bid->bid_amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination_area pull-right mt-5">
            </div>
        </div>
    </div>
    <!-- Todays Bid List End -->
@endsection
