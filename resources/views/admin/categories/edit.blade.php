@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Categories</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    {!! Form::model($category,
                    ['method'=>'PATCH','action'=>['AdminCategoriesController@update',
                    $category->id]])
                    !!}

                    <div class="form-group">
                        {!! Form::label('name','Category Name') !!}
                        {!! Form::text('name',null , ['class'=>'form-control','placeholder'=>
                        'New Categories']) !!}

                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Update',['class'=>'btn btn-success float-right']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',
                    $category->id]])
                    !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger float-right']) !!}

                    <a href="{{route('categories.index')}}">
                        <input class="btn btn-warning float-right" name="cancel" type="button" value="Cancel">
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>
</div>
@endsection