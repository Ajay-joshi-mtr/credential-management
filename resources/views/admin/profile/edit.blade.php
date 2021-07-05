@extends('backend.app')

@section('content')
<div class="page-breadcrumb mb-2">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Profile</h4>
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
    <form method="POST" class="form-horizontal" action="{{route('profile.update',Auth::user()->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <!-- <h4 class="card-title">Edit Category Info</h4> -->
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    EID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="eid" name="eid" value="{{ Auth::user()->eid }}"
                        placeholder="EID Here">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}"
                        placeholder="Name Here">
                        <!-- @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                        placeholder="Email Here" readonly>
                        <!-- @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Role</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="role" name="role" value="{{ Auth::user()->role }}"
                        placeholder="Role Here" readonly>
                        <!-- @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}"
                        placeholder="Phone Here" >
                        @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Image</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="image" name="image" >
                    <!-- <img src="{{asset('uploads/users/'.Auth::user()->image)}}" alt=""> -->
                        <!-- @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
    </form>
</div>
@endsection