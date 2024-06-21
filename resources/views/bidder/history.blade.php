@extends('bidder.layout.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Bid History')

@section('content')

@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="col-10 mx-5 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">My Bids</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Image</th>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Seller Name</th>
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
