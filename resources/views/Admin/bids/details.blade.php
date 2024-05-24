@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Bid Details')

@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">@foreach ($bids as $index => $bid)
    @if ($index == 0)
       <span style="color:blue;">{{$bid->item_name}}</span>
        @break
    @endif
@endforeach</h4>                   

                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Bidder Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bids as $bid)

                                <tr>
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
