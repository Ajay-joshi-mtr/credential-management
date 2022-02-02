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
    <form method="POST" class="form-horizontal" action="{{route('credential.update',$credential->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group row">
                <label for="categoryid" class="col-sm-3 text-end control-label col-form-label">Category</label>
                <div class="col-sm-9">
                    <select name="category_id" class="form-control">

                        @if(count($categories)>0)
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}" {{$cat->id == $credential->category->id  ? 'selected' : '' }}>
                            {{ucwords($cat->name ?? '')}}</option>
                        @endforeach
                        @else
                        <option value="{{$cat->id}}">--Select Category--</option>
                        @endif

                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- <h4 class="card-title">Edit Credential Data</h4> -->
            <div class="form-group row">
                <label for="title" class="col-sm-3 text-end control-label col-form-label">Title </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name='title' value="{{$credential->title}}"
                        placeholder="title Here">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-3 text-end control-label col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" id="" cols="50" rows="4" class="form-control"
                        placeholder="Description here">{{$credential->description}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-3 text-end control-label col-form-label">URL</label>
                <div class="col-sm-9">
                    <input type='text' class="form-control" id="url" value="{{$credential->url}}" name='url'
                        placeholder="url Here">
                    @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-3 text-end control-label col-form-label">User Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" value="{{$credential->username}}"
                        name='username' placeholder="UserName Here">
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" value="{{$credential->password}}"
                        name='password' placeholder="password Here">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h4 class="text-center mt-4 mb-4">Credential Additional Fields</h4>
            @if(count($cred)>0)
            @php
            $counter=0;
            @endphp
            <div class="increment"> 
            @foreach($cred as $key => $value)
            
            <div class="row input-group control-group mb-3">
                <label for="categoryid" class="col-sm-3 text-end control-label col-form-label">Meta Field</label>

                <div class="col-sm-4">
                    <input type="text" name="key[]" id="" class="form-control" placeholder="Meta Data Key"
                        value="{{$key}}">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="value[]" id="" class="form-control" placeholder="Meta Data Value"
                        value="{{$value}}">
                </div>
                <div class="col-sm-1 " style="display: flex;">
                    <a class="btn btn-danger"><i class="fa fa-trash"></i></a> &nbsp;
                    <a class="btn btn-success"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            @php $counter++; @endphp
            @endforeach
            @else
            <div class="increment"> 
            <div class="row input-group control-group mb-3">
               
                    <label for="categoryid" class="col-sm-3 text-end control-label col-form-label">Meta Field</label>

                    <div class="col-sm-4">
                        <input type="text" name="key[]" id="" class="form-control" placeholder="Meta Data Key">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" name="value[]" id="" class="form-control" placeholder="Meta Data Value">
                    </div>
                    <div class="col-sm-1 " style="display: flex;">
                    <a class="btn btn-danger"><i class="fa fa-trash"></i></a> &nbsp;
                    <a class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
            </div>            
            </div>
            @endif
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
      
    </form>
</div>
@endsection