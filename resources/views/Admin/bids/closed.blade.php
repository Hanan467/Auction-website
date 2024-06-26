@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Bids')

@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Closed Bids</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Image</th>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Seller Name</th>
                                <th>Bidder Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bids as $bid)

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
            </div>
        </div>
    </div>
@endsection
