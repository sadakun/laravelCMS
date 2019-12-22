@extends('layouts.admin')
@section('content-header')
<!-- /.container -->
<div class="container-fluid">
    <!-- /.container row -->
    <div class="row mb-2">
        <!-- /.title column-->
        <div class="col-sm-6">
            <h1>Gallery</h1>
        </div>
        <!-- /.end title column-->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Galery Panel</a></li>
                <li class="breadcrumb-item active">Show All Galery</li>
            </ol>
        </div>
        <!-- /.end container row -->
    </div>
    <!-- /.end container -->
</div>
@endsection
@section('content')
<!-- /.container -->
<div class="container-fluid">
    <!-- /.container row -->
    <div class="row">
        <!-- /.container column -->
        <div class="col">
            <!-- /.card -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">IMAGES TABLE</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.end card-header -->

                <!-- /.card-body -->
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <!-- /.card table-->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    {{-- <th>Email</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @if($photos)
                                @foreach($photos as $photo)

                                <tr>
                                    <td>{{$photo->id}}</td>
                                    <td><img height="50" src="{{$photo->file}}" alt=""></td>
                                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}
                                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'No Date'}}
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',
                                        $photo->id]]) !!}
                                        <div class="form-group">
                                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        </div>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- /.end card table-->
                    </div>
                </div>
                <!-- /.end card-body -->

                <!-- card-footer -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{$photos->render()}}
                    </ul>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.end card -->
        </div>
        <!-- /.end container column -->
    </div>
    <!-- /.end container row -->
</div>
<!-- /.end container -->
@endsection