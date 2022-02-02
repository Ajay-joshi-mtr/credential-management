@extends('backend.app')

@section('content')
<div class="page-breadcrumb mb-2">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Credential</h4>
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
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><b>Id</b></th>
                        <th><b>Title</b></th>
                        <th><b>Description</b></th>
                        <th><b>Url</b></th>
                        @if (Auth::user()->role == 'admin')

                        <th><b>Username</b></th>
                        <th><b>Password</b></th>
                        @endif
                        <th><b>Category</b></th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    @if ($credential->count() > 0)
                    <tr>
                        <td>{{ucwords($credential->id ?? '')}}</td>
                        <td>{{ucwords($credential->title ?? '')}}</td>
                        <td>{{ucwords($credential->description ?? '')}}</td>
                        <td>{!! $credential->url ? '<a href="'.$credential->url.'" target="_blank">'.$credential->url.'</a>' :'' !!}</td>
                       
                        @if (Auth::user()->role == 'admin')

                        <td>{{ucwords($credential->username ?? '')}}</td>
                        <td>{{ucwords($credential->password ?? '')}}</td>
                        @endif
                        <td>{{ucwords($credential->category->name ?? '')}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
<h4 class="text-center">Additional Details</h4>
<div class="card">
    <div class="card-body">
        <div class="table-responsive row">
            @if ($cred->count() > 0)
            @foreach($cred as $key => $value)
            <div class="col-sm-3 border-bottom border-left p-2" >
                <h5><b>{{ucwords(str_replace('_',' ',$key))}} : </b></h5>
            </div>
            <div class="col-sm-3 border-bottom p-2">
                <h5>{{$value}}</h5>
            </div>
            @endforeach
            @endif
            <!-- <table id="zero_config" class="table table-striped table-bordered">

                <tbody>
                    @if ($cred->count() > 0)
                    @foreach($cred as $key => $value)
                    <tr>
                        <td><b>{{ucwords(str_replace('_',' ',$key))}}</b></td>
                        <td>{{$value}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table> -->
        </div>

    </div>
</div>
@endsection