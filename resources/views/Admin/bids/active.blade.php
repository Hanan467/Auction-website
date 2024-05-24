@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Active Bids')

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


    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Active Bids</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Image</th>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Seller Name</th>
                                <th>Top bidder</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bids as $bid)

                                <tr>
                                    <td><img src="{{ asset('storage/' . $bid->image_path) }}" alt="{{ $bid->item_name }}" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $bid->item_name }}</td>
                                    <td>{{ $bid->category }}</td>
                                    <td>{{ $bid->seller_name }}</td>
                                    <td>{{ $bid->bidder_name }}</td>
                                    <td>{{ $bid->bid_amount }}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="{{ route('admin.bids.active.details', $bid->bid_id) }}" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                                            <li>
                                                <form action="{{ route('admin.bids.active.destroy', $bid->bid_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                                    @method('PATCH')
                                                    @csrf
                                                    <button type="submit" class="text-secondary"><i class="ti-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
