@extends('seller.layout.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'My Items')

@section('content')

@if (session('success'))
        <div class="alert alert-success alert-dismissible fade category" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade category" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
                <div class="col-7 mt-5 mx-5 ms-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add item</h4>
                                        <form class="form-horizontal" id="myForm" action="{{ route('seller.additem') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label" for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-12">
                                                <label class="col-form-label" for="description">Description</label>
                                                <textarea name="description" id="description" rows="3" class="col-sm-12"  ></textarea>       
                                            </div>
                                            </div>
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-6">
                                                <label class="col-form-label">Category</label>
                                             <select class="custom-select" onchange="categoryChanged(event)">
                                                <option selected="selected">Select</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            </select>               
                                        </div>
                                        <div class="col-sm-6">
                                                <label class="col-form-label">Condition</label>
                                             <select class="custom-select" onchange="conditionChanged(event)">
                                                <option selected="selected">Select</option>
                                                <option value="new">New</option>
                                                <option value="used">Used</option>
                                            </select>               
                                        </div>
                                            </div>
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-6">
                                                    <label for="bidprice"> Bid price</label>
                                                    <input type="number" class="form-control" id="bidprice" name="bidprice">
                                                </div>
                                                <div class="col-sm-6">
                                                <div class="custom-file">
                                                  
                                                    <label for="image">Item Image</label>
                                                    <input class="form-control" type="file" id="image" name="image">
                                                </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="selectedcategoryId" id="selectedcategoryId">
                                            <input type="hidden" name="selectedcondition" id="selectedcondition">

                                            <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<script>
    function categoryChanged(event) {
        var selectedcategoryId = event.target.value;
        document.getElementById('selectedcategoryId').value = selectedcategoryId;
    }

    function conditionChanged(event) {
        var selectedcondition = event.target.value;
        document.getElementById('selectedcondition').value = selectedcondition;
    }
</script>

@endsection