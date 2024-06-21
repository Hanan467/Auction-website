@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Bids')

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
                <h4 class="header-title">Bid request</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Image</th>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Seller Name</th>
                                <th>Condition</th>
                                <th>Bid price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                                <tr>
                                    <td><img src="{{ $item->image_path}}" alt="{{$item->item_name }}" style="width: 200px; height: 100px;"></td>
                                    <td>{{$item->name }}</td>
                                    <td>{{$item->category }}</td>
                                    <td>{{$item->description }}</td>
                                    <td>{{$item->seller->name }}</td>
                                    <td>{{$item->condition }}</td>
                                    <td>{{$item->bid_price }}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                        <li class="mr-3">
                                         <form action="{{ route('admin.requests.approve', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                         <button type="submit" class="btn btn-link text-secondary">
                                        <i class="fa fa-check"></i>
                        </button>
                    </form>
                </li>                                            <li>
                                                <form action="{{ route('admin.requests.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                                    @method('PATCH')
                                                    @csrf
                                                    <button type="submit" class="btn btn-link"><i class="ti-trash"></i></button>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").alert('close');
            }, 5000); 
        });
    </script>
@endsection