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
<div class="row gutters-sm d-floex justify-content-center">  
    <div class="col-md-4 mb-3">
        <div class="profile-card">
            <div class="edit-icon">
                <a href="{{route('profile.edit',Auth::user()->id)}}"><i class="far fa-edit fa-1x "></i></a>
            </div>
            <div class="profile-card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                        width="150">
                    <div class="mt-4">
                        <!-- <h5>EID : {{ Auth::user()->eid }}</h5> -->
                        <h4 class="text-dark p-2">{{ Auth::user()->name }}</h4>
                        <h5 class="text-secondary mb-1 text-dark p-2">Role : {{ Auth::user()->role }}</h5>
                        <h5 class="font-size-sm text-dark p-2">Phone No : {{ Auth::user()->phone }}</h5>
                    </div>
                </div>
            </div>
        </div>
@endsection