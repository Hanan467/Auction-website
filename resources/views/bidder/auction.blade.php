@extends('bidder.layout.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Auctions')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <ul class="navbar-nav p-0 mb-0">
        <li class="nav-item mx-5">
            <a class="nav-link" style="color: black;" href="{{ route('bidder.auctions.filter', 'electronics') }}"><i class="ti-desktop"></i> Electronics</a>
        </li>
        <li class="nav-item mx-5">
            <a class="nav-link" style="color: black;" href="{{ route('bidder.auctions.filter', 'house') }}"><i class="ti-home"></i> House</a>
        </li>
        <li class="nav-item mx-5">
            <a class="nav-link" style="color: black;" href="{{ route('bidder.auctions.filter', 'cars') }}"><i class="ti-car"></i> Cars</a>
        </li>
        <li class="nav-item mx-5">
            <a class="nav-link" style="color: black;" href="{{ route('bidder.auctions.filter', 'furniture') }}"><i class="ti-layers"></i> Furniture</a>
        </li>
    </ul>
</nav>

<div class="main-content-inner mx-4 mt-1">
    <div class="card-area">
        <div class="row">
            @foreach($items as $item)
                <div class="col-lg-4 col-md-6 mt-1">
                    <div class="card card-bordered">
                        <img class="card-img-top img-fluid" src="{{ $item->image_path }}" alt="image" style="height:200px;">
                        <div class="card-body">
                            <h5 class="title">{{ $item->name }}</h5>
                            <div class="row">
                                <p class="card-text col-7">{{ $item->username }}</p>
                                <p class="card-text col-5"> Bid start: {{ $item->bid_price }}</p>
                            </div>
                            <a href="{{ route('bidder.auctions.bid', $item->id) }}" class="btn btn-primary">Bid</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>                       
</div>

@endsection
