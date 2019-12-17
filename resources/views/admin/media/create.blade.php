@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content-header')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Upload Files</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Media Panel</a></li>
                <li class="breadcrumb-item active">Upload File</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">


                <div class="card-box">
                    {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}

                    {!! Form::close() !!}

                </div>
                <div class="card-footer text-center">
                    <h3>Upload here
                        <i class="fas fa-arrow-up text-aqua"></i>
                    </h3>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection