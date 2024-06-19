@extends('seller.layout.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'My Items')

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


    <div class="col-11 mt-5 mx-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">On-Bid Items</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Assigned Price</th>
                                <th>Top bid</th>
                                <th>Remaining Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                                <tr>
                                    <td><img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->item_name }}" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->bid_price }}</td>
                                    <td>{{ $item->bid_amount }}</td>
                                    <td></td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
