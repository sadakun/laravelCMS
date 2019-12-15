@extends('layouts.admin')
@section('content-header')
@include('includes.error_form')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Post</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Post Panel</a></li>
                <li class="breadcrumb-item active">Add Post</li>
            </ol>
        </div>
    </div>
</div>
<!-- Main content -->
@endsection
@section('content')
<!-- Default box -->
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('title','Fullname') !!}
                        {!! Form::text('title',null , ['class'=>'form-control','placeholder'=>'Enter Your Fullname'])
                        !!}
                        @error('title')
                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id', array(1=>'Active', 0=>'Not Active'),
                        0,['class'=>'form-control']) !!}
                        @error('category_id')
                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_id','Author') !!}
                        {!! Form::select('user_id', array(''=>'options'), null, ['class'=>'form-control']) !!}
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
                        {!! Form::textarea('body',null , ['class'=>'form-control','rows'=>3]) !!}
                        @error('body')
                        <div class="error" style="color:tomato">{{ "*".$message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit('Create',['class'=>'btn btn-primary float-right']) !!}
                    {!! Form::close() !!}

                    <a href="{{route('posts.index')}}">
                        <input class="btn btn-warning" name="cancel" type="button" value="Cancel">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection