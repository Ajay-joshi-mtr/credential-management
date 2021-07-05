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
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger" role='alert'>
            {{session('error')}}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success" role='alert'>
            {{session('success')}}
        </div>
        @endif
    </div>
    <form method="POST" class="form-horizontal" action="{{url('profile/update_password/'.Auth::user()->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <!-- <h4 class="card-title">Edit Category Info</h4> -->
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Current Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="curpwd" name="current_password" placeholder="Current Password here....">
                    @error('current_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    New Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="newpwd" name="new_password" value=""
                        placeholder="New Password here....">
                    @error('new_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">
                    Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="conpwd" name="confirm_password" value=""
                        placeholder="Confirm Password.....">
                        @error('confirm_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
    </form>
</div>
@endsection