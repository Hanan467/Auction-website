@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Users')

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
                                <h4 class="header-title">Bidders</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>phone number</th>
                                                <th>Address</th>
                                                <th>username</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $user)
                        <tr>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_no }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                            <ul class="d-flex justify-content-center">
                                <li><form action="{{ route('admin.users.destroy', encrypt($user->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('PATCH')
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
