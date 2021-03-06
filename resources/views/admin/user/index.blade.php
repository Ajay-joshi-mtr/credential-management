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
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Eid</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                    @php 
                    $key=1;
                    @endphp
                    @foreach($users as $user)

                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$user->eid}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-info btn-xs "><i class="fas fa-edit"></i></a>
                            <a class="btn btn-xs btn-success" href="{{route('user.show',$user->id)}}"><i class="fas fa-eye"></i></a>
                            <a class=" del_lead btn btn-danger  btn-xs " href="javascript:void(0);" data="{{$user->id}}"><i
                                    class="fas fa-trash-alt"></i></a>
                            <form id="del_leadf_{{$user->id}}" action="{{route('user.destroy', $user->id)}}"
                                method="POST" onsubmit="return confirm(\'Are you sure\');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>

                        </td>
                    </tr>
                    @php 
                    $key++;
                    @endphp
                    @endforeach                    
                    @else
                    <tr><td colspan="6"> No Users Found!</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{$users->links()}}
    </div>
</div>
@endsection