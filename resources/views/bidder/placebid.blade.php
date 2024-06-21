@extends('bidder.layout.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Place Bid')

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
 
<div class="row mx-4 my-4">
<div class=" col-5 main-content-inner mt-1">
    <div class="card-area">
        <div class="row">
                <div class="col-lg-12 col-md-6 mt-1">
                    <div class="card card-bordered">
                        <img class="card-img-top img-fluid" src="{{ $item->image_path }}" alt="image" style="height:300px;">
                        <div class="card-body">
                            <h5 class="title">{{ $item->name }}</h5>
                            <div class="row">
                                <p class="card-text col-7">{{ $item->username }}</p>
                                <p class="card-text col-5"> Bid start: {{ $item->bid_price }}</p>
                                <p class="card-text col-12"> Decription:    {{$item->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>                       
</div>

<div class="col-7">
    <!-- basic form start -->
    <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Place Your Bid</h4>
                                        <form action="{{ route('bidder.auctions.placebid') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}">
                                            <div class="form-group" >
                                                <label for="bid_amount">Bid Amount</label>
                                                <input type="number" class="form-control" id="bid_amount" name="bid_amount">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
</div>
</div>
@endsection
