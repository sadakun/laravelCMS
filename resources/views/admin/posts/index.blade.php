@extends('layouts.admin')
@section('content-header')
@if (Session::has('deleted_user'))
{{session('deleted_user')}}

@endif
@include('includes.error_form')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Show All Posts</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Post Panel</a></li>
                <li class="breadcrumb-item active">Show All Posts</li>
            </ol>
        </div>
    </div>
</div>
<!-- Main content -->
@endsection
@section('content-header')
<!-- Default box -->
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">USERS TABLE</h3>

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
                <div class="card-body">

                </div>
                <div class="card-footer"></div>
            </div>
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
                <div class="card-header">
                    <h3 class="card-title">POSTS TABLE</h3>

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
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="3" class="text-center">Action</th>
                                {{-- <th>View</th>
                                <th>More</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if($posts)
                            @foreach($posts as $post)
                            <tr>
                                <td> {{$post->id}} </td>
                                <td><img height="50"
                                        src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"
                                        alt=""></td>
                                <td> {{$post->title}} </td>
                                <td> {{str_limit($post->body, 10)}} </td>
                                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                                <td> {{$post->user->name}} </td>
                                <td> {{$post->created_at->toCookieString()}} </td>
                                <td> {{$post->updated_at->diffForHumans()}} </td>
                                <td>
                                    <a href="{{route('comments.show',$post->id)}}">
                                        <button type="submit" class="border border-0" data-toggle="tooltip" title="Look Comments?">
                                            <i class='far fa-comment-alt fa-2x text-olive'></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('home.post',$post->id)}}">
                                        <button type="submit" class="border border-0" data-toggle="tooltip" title="View Post?">
                                            <i class='fas fa-binoculars fa-2x text-olive'></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}">
                                        <button type="submit"class="border border-0" data-toggle="tooltip" title="Edit More?">
                                            <i class='fas fa-tools fa-2x text-danger'></i>
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
<!-- /.row -->
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@endsection
