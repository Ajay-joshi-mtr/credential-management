@extends('backend.app')
@section('content')
<div class="page-breadcrumb mb-2">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">User</h4>
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
    <form method="POST" class="form-horizontal" action="{{route('user.update',$user->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <!-- <h4 class="card-title">Edit User Data</h4> -->
            <div class="form-group row">
                <label for="eid" class="col-sm-3 text-end control-label col-form-label">EID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="eid" name='eid' value="{{$user->eid}}"
                        placeholder="E ID Here">
                        @error('eid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">Name </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name='name' value="{{$user->name}}"
                        placeholder="Name Here">
                        @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name='email' value="{{$user->email}}"
                        placeholder="Email Here">
                        @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name='password'
                        value="{{$user->password}}" placeholder="Password Here">
                        @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-3 text-end control-label col-form-label">Role</label>
                <div class="col-sm-9">
                    <select name="role" id="" class="form-control">
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-3 text-end control-label col-form-label">Contact No</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone" value="{{$user->phone}}" name='phone'
                        placeholder="Contact No Here">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>

    </form>
</div>
@endsection