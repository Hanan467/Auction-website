@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Categories')

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
                <h4 class="header-title">Categories</h4>
                <button style="float: right; color:white;" class="btn  btn-primary mb-3"><a href="{{route('admin.category.create')}}">Create</a></button>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Category name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)

                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
