@extends('backend.app')
@section('content')
<div class="page-breadcrumb mb-2">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Catgory</h4>
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
        <!-- <h5 class="card-title">Basic Datatable</h5> -->
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>   
                    @if($category->count()>0)
                    @php 
                    $key=1;
                    @endphp
                    @foreach($category as $catg)                     
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{ucwords($catg->name ?? '')}}</td>
                        <td>{{ucwords($catg->description ?? '')}}</td>
                        <td>
                            <a href="{{route('category.edit',$catg->id)}}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-success btn-xs" href="{{route('category.show',$catg->id)}}"><i class="fas fa-eye"></i></a>
                            <a class=" del_lead btn btn-danger btn-xs" href="javascript:void(0);" data="{{$catg->id}}" ><i class="fas fa-trash-alt"></i></a>
                            <form id="del_leadf_{{$catg->id}}" action="{{route('category.destroy', $catg->id)}}" method="POST" onsubmit="return confirm(\'Are you sure\');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">                    
                            </form>
                       
                        </td>
                    </tr>
                    @php $key++; @endphp
                    @endforeach                    
                    @else
                    <tr><td colspan="4"> No Category Found!</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{$category->links()}}
    </div>
</div>
@endsection
