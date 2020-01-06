@extends('layouts.admin')
@section('content-header')
@include('includes.tinyeditor')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><b>Edit</b> or <b>Delete</b> Post</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">User Panel</a></li>
                <li class="breadcrumb-item active">Edit or Delete User</li>
            </ol>
        </div>
    </div>
</div>
<!-- Main content -->
@endsection
@section('content')
<!-- Default box -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- left column -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-center">Post Image</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="text-center">
                                        <img class=" img-fluid img-thumbnail"
                                            src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder()}}"
                                            alt="User profile picture">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-center">Bio</h3>
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
                                    <h3 class="profile-username text-center">{{$post->title}}</h3>

                                    <p class="text-muted text-center">Software Engineer</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Followers</b> <a class="float-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Following</b> <a class="float-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Friends</b> <a class="float-right">13,287</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- right column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card">
                                <!-- /.card-header -->
                                <!-- form start -->
                                {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id],'files'=>true]) !!}
                                <div class="card-body">
                                    <div class="form-group">
                                        {!! Form::label('title','Title') !!}
                                        {!! Form::text('title',null , ['class'=>'form-control','placeholder'=>'Enter
                                        Post Title '])
                                        !!}
                                        @error('title')
                                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('category_id','Category') !!}
                                        {!! Form::select('category_id', $categories,
                                        null,['class'=>'form-control']) !!}
                                        @error('category_id')
                                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! form::label('photo_id','Image') !!}
                                        {!! form::file('photo_id',['class'=>'form-control']) !!}
                                        @error('photo_id')
                                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('body','Description') !!}
                                        {!! Form::textarea('body',null , ['class'=>'form-control','rows'=>8]) !!}
                                        @error('body')
                                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @include('includes.error_form')
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit('Update',['class'=>'btn btn-success float-right']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id]]) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                    <a href="{{route('posts.index')}}">
                        <input class="btn btn-warning" name="cancel" type="button" value="Cancel">
                    </a>
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    <!-- /.row -->
    @endsection