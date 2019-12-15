@extends('layouts.admin')
@section('content-header')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Show All Users</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Category Panel</a></li>
                <li class="breadcrumb-item active">Show All Categories</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Default box -->
<!-- /.row -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <!-- col left -->
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">New Categories</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!
                                    Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])
                                    !!}

                                    <div class="form-group">
                                        {!! Form::label('name','Category Name') !!}
                                        {!! Form::text('name',null , ['class'=>'form-control','placeholder'=>
                                        'New Categories']) !!}
                                        @error('name')
                                        <div class="error" style="color:red">{{ "*".$message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer">
                                    {!! Form::submit('Create',['class'=>'btn btn-primary float-right']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        <!-- col right -->

                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">CATEGORIES TABLE</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($categories)
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}
                                                </td>
                                                <td>
                                                    <a href="{{route('categories.edit', $category->id)}}">
                                                        <button type="submit"
                                                            class="btn btn-block btn-sm btn-outline-primary">
                                                            <i class='fas fa-info'></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection