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
                                                <th>Seller name</th>
                                                <th>Bidder name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $bid)
                        <tr>
                            <td>{{ $bid->name }}</td>
                            <td>{{ $bid->email }}</td>
                            <td>{{ $bid->created_at }}</td>
                            <td>{{ $bid->id }}</td>
                            <td>{{ $bid->id }}</td>
                            <td>
                            <ul class="d-flex justify-content-center">
                                <li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                <li><form action="{{ route('admin.bid.destroy', encrypt($bid->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"><i class="ti-trash"></i></button>

                                </form></li>
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
