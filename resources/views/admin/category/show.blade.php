@extends('backend.app')
@section('content')
<div class="page-breadcrumb mb-2">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Category</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <!-- <h4 class="card-title">Create Category Info</h4> -->
        <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">
                ID</label>
            <div class="col-sm-9">
                <label class="form-control">
                {{ucwords($category->id ?? '')}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">
                Name</label>
            <div class="col-sm-9">
                <label class="form-control">
                {{ucwords($category->name ?? '')}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-end control-label col-form-label">
                Description</label>
            <div class="col-sm-9">
                <label class="form-control">
                {{ucwords($category->description ?? '')}}</label>
            </div>
        </div>
    </div>
</div>
@endsection