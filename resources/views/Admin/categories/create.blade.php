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
          <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Create Category</h4>
                                        <form method="POST" action="{{ route('admin.category.create') }}">
                                             @csrf
                                            <div class="form-group">
                                            <x-input-label for="category_name" :value="('category_name')" />
                                            <x-text-input id="category_name"  type="text" name="category_name" :value="old('category_name')" required autofocus autocomplete="organizationName" />
                                            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->        
    @endsection
