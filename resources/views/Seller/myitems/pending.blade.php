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
                <h4 class="header-title">Pending Items</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th>Assigned Price</th>
                                <th>Assigned Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                                <tr>
                                    <td><img src="{{$item->image_path }}" alt="{{ $item->item_name }}" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->condition }}</td>
                                    <td>{{ $item->bid_price }}</td>
                                    <td></td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                                            <li>
                                                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
