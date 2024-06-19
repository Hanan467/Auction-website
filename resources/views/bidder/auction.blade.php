@extends('bidder.layout.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Auctions')

@section('content')

<div class="main-content-inner">
    <div class="card-area">
        <div class="row">
            @foreach($items as $item)
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="card card-bordered">
                        <img class="card-img-top img-fluid" src="{{ $item->image_path }}" alt="image" style="height:200px;">
                        <div class="card-body">
                            <h5 class="title">{{ $item->name }}</h5>
                            <div class="row">
                                <p class="card-text col-6">{{ $item->username }}</p>
                                <p class="card-text col-6">{{ $item->bid_price }}</p>
                            </div>
                            <a href="#" class="btn btn-primary">Go More....</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>                       
</div>

@endsection
