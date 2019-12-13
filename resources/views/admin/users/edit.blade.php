@extends('layouts.admin')
@section('content-header')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><b>Edit</b> or <b>Delete</b> User</h1>
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
{{-- <img src="{{$user->photo->file}}" class="img-responsive img-circle" alt=""> --}}
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
                                    <h3 class="card-title text-center">Photo Profile</h3>
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
                                            src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"
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
                                    <h3 class="profile-username text-center">{{ucfirst($user->name)}}</h3>

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
                                        <li class="list-group-item">
                                            <b>Status</b> <a
                                                class="float-right">{{$user->status == 1 ? 'Active' : 'Nonactive'}}</a>
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
                                <div class="card-body">
                                    {!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update',
                                    $user->id],'files'=>true])
                                    !!}

                                    <div class="form-group">
                                        {!! Form::label('name','Fullname') !!}
                                        {!! Form::text('name',null , ['class'=>'form-control','placeholder'=>'Enter Your
                                        Fullname']) !!}
                                        @error('name')
                                        <div class="error" style="color:red">{{ "*".$message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email','Email Address') !!}
                                        {!! Form::email('email',null ,
                                        ['class'=>'form-control','placeholder'=>'example@example.com'])
                                        !!}
                                        @error('email')
                                        <div class="error" style="color:red">{{ "*".$message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('role_id','Role') !!}
                                        {!! Form::select('role_id', $roles, null, ['class'=>'form-control'])
                                        !!}
                                        @error('role_id')
                                        <div class="error" style="color:red">{{ "*".$message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('status','Status') !!}
                                        {!! Form::select('status', array(1=>'Active', 0=>'Not Active'), null,
                                        ['class'=>'form-control'])
                                        !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password','Password') !!}
                                        {!!
                                        Form::password('password',['class'=>'form-control','placeholder'=>'Password'])
                                        !!}
                                    </div>
                                    <div class="form-group">
                                        {!! form::label('photo_id','Your Image') !!}
                                        {!! form::file('photo_id',['class'=>'form-control']) !!}
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

                    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]]) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                    <a href="{{route('users.index')}}">
                        <input class="btn btn-warning" name="cancel" type="button" value="Cancel">
                    </a>
                    {!! Form::close() !!}




                </div>

            </div>
        </div>
    </div>
    <!-- /.row -->
    @endsection