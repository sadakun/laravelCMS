@extends('layouts.admin')
@section('content-header')
@include('includes.error_form')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">User Panel</a></li>
                <li class="breadcrumb-item active">Add User</li>
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

                {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('name','Fullname') !!}
                        {!! Form::text('name',null , ['class'=>'form-control','placeholder'=>'Enter Your Fullname'])
                        !!}
                        @error('name')
                        <div class="error" style="color:red">{{ "*".$message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','Email Address') !!}
                        {!! Form::email('email',null , ['class'=>'form-control','placeholder'=>'example@example.com'])
                        !!}
                        @error('email')
                        <div class="error" style="color:red">{{ "*".$message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('role_id','Role') !!}
                        {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control'])
                        !!}
                        @error('role_id')
                        <div class="error" style="color:red">{{ "*".$message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('status','Status') !!}
                        {!! Form::select('status', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Password') !!}
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password'])
                        !!}
                        @error('password')
                        <div class="error" style="color:red">{{ "*".$message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('photo_id','Your Image') !!}
                        {!! form::file('photo_id',['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit('Create',['class'=>'btn btn-primary float-right']) !!}
                    {!! Form::close() !!}

                    <a href="{{route('users.index')}}">
                        <input class="btn btn-warning" name="cancel" type="button" value="Cancel">
                    </a>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- /.row -->

@endsection