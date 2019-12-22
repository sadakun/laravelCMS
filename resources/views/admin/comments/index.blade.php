@extends('layouts.admin')
@section('content-header')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Show All Comments</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Comment Panel</a></li>
                <li class="breadcrumb-item active">Show All Comments</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('content')
<!-- Default box -->
<!-- /.row -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">COMMENTS TABLE</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        @if (count($comments) > 0)
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Picture</th>
                                <th style="width:15%">Title</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Body</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="4" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($comments as $comment) 
                            <tr>
                                <td> {{$comment->id}} </td>
                                <td>
                                    <img height="50" src="{{$comment ? $comment->photo : asset('/images/img/default-profile.png')}}" alt="User profile picture">
                                </td>
                                <td> {{$comment->post->title}} </td>
                                <td> {{$comment->author}} </td>
                                <td> {{$comment->email}} </td>
                                <td> {{$comment->body}} </td>
                                <td> {{$comment->created_at->toCookieString()}} </td>
                                <td> {{$comment->updated_at->diffForHumans()}} </td>
                                <td>
                                    <a href="{{route('replies.show',$comment->id)}}">
                                        <button type="submit" class="border border-0" data-toggle="tooltip" title="Looking for replies?">
                                            <i class='far fa-comment-alt fa-2x text-olive'></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    @if ($comment->status == 1)
                                    
                                    {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                                    <input type="hidden" name="status" value="0">
                                    
                                    <div class="form-group">
                                        {{ Form::button('<i class="fas fa-unlock fa-2x text-olive"></i>', ['type' => 'submit', 'class' => 'border border-0', 'data-toggle'=>'tooltip', 'title'=>'Comment is unlock!'] )  }}
                                    </div>
                                    
                                    {!! Form::close() !!}
                                    @else
                                    
                                    {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                                    <input type="hidden" name="status" value="1">

                                    <div class="form-group">
                                        {{ Form::button('<i class="fas fa-lock fa-2x text-danger"></i>', ['type' => 'submit', 'class' => 'border border-0', 'data-toggle'=>'tooltip', 'title'=>'Comment is locked!'] )  }}
                                    </div>
                                    
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('home.post', $comment->post->slug)}}">
                                        <button type="submit" class="border border-0" data-toggle="tooltip" title="View Post?">
                                            <i class='fas fa-binoculars fa-2x text-olive'></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',
                                    $comment->id]]) !!}

                                    <div class="form-group">
                                        {{ Form::button('<i class="fas fa-trash-alt fa-2x text-danger"></i>', ['type' => 'submit', 'class' => 'border border-0', 'data-toggle'=>'tooltip', 'title'=>'Delete comment?'] )  }}
                                    </div>

                                    {!! Form::close() !!}
                                </td>    
                                                        
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                        <h1 class="text-center">NO COMMENTS</h1>
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- card-footer -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{$comments->render()}}
                    </ul>
                </div>
                <!-- /.card-footer -->
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
