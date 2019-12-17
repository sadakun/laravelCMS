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
<!-- /.container -->
<div class="container-fluid">
    <!-- /.container row -->
    <div class="row mb-2">
        <!-- /.container column-->
        <div class="col-12">
            <!-- /.outer card-->
            <div class="card">
                <!-- /.outer card body -->
                <div class="card-body">
                    <!-- /.middle card row -->
                    <div class="row mb-2">
                        <!-- /.middle card column-->

                        <!--inner card col left -->
                        <div class="col-4">
                            <!-- /.inner card left -->
                            <div class="card">
                                <!-- /.left card header -->
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
                                <!-- /.end left card header-->

                                <!-- /.left card body-->
                                <div class="card-body">
                                    <!-- /.left form -->
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
                                <!-- /.left footer -->
                                <div class="card-footer">
                                    {!! Form::submit('Create',['class'=>'btn btn-primary float-right']) !!}
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.end left form-->
                                <!-- /.end left footer-->
                            </div>
                            <!-- /.end left card -->
                        </div>
                        <!-- /.end inner left card -->

                        <!--/.inner card col right-->
                        <div class="col-8">
                            <!-- /.inner card right -->
                            <div class="card">
                                <!-- /.right card header -->
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
                                <!-- /.end right header -->

                                <!-- /.right card body-->
                                <div class="card-body table-responsive p-0">
                                    <!-- /.right card table-->
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
                                    <!-- /.end right card table-->
                                </div>
                                <!-- /.end right card body -->
                            </div>
                            <!-- /.end right card -->
                        </div>
                        <!-- /.end middle card column-->
                    </div>
                    <!-- /.end middle card row -->
                </div>
                <!-- /.end outer card body -->
            </div>
            <!-- /.end outer card-->
        </div>
        <!-- /.end container column-->
    </div>
    <!-- /.end container row -->
</div>
<!-- /.end container -->
@endsection