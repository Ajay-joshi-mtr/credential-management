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
    <form method="POST" class="form-horizontal" action="{{route('category.update',$category->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <!-- <h4 class="card-title">Edit Category Info</h4> -->
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}"
                        placeholder="Name Here">
                        @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-3 text-end control-label col-form-label">
                    Description</label>
                <div class="col-sm-9">
                    <textarea name="description" id="" cols="50" rows="4" class="form-control" 
                        placeholder="Description here...">{{$category->name}}</textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
    </form>
</div>
@endsection