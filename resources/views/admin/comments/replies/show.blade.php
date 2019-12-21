@extends('layouts.admin')
@section('content-header')
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Show All Replies</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Reply Panel</a></li>
                <li class="breadcrumb-item active">Show All Replies</li>
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
                    <h3 class="card-title">REPLIES TABLE</h3>

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
                        @if(count($replies) > 0)
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width:15%">Title</th>
                                <th>Picture</th>
                                <th>Commented</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created</th>
                                <th>Updated</th>
                                {{-- <th>Status</th>
                                <th>Delete</th> --}}
                                <th colspan="3" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($replies as $reply)
                           
                            <tr>
                                <td> {{$reply->id}} </td>
                                <td> {{$reply->comment->post->title}} </td>
                                <td>
                                    <img height="50" src="{{$reply ? $reply->photo : asset('/images/img/default-profile.png')}}" alt="User profile picture">
                                </td>
                                
                                <td> {{$reply->author}} </td>
                                <td> {{$reply->email}} </td>
                                <td> {{$reply->body}} </td>
                                <td> {{$reply->created_at->toCookieString()}} </td>
                                <td> {{$reply->updated_at->diffForHumans()}} </td>
                                <div class="btn-gorup">
                                <td>
                                    @if ($reply->status == 1)
                                    
                                    {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id]]) !!}
                                    <input type="hidden" name="status" value="0">
                                    
                                    <div class="form-group">
                                        {{ Form::button('<i class="fas fa-unlock fa-2x text-olive"></i>', ['type' => 'submit', 'class' => 'border border-0', 'data-toggle'=>'tooltip', 'title'=>'Comment is unlock!'] )  }}
                                    </div>
                                    
                                    {!! Form::close() !!}
                                    @else
                                    
                                    {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id]]) !!}
                                    <input type="hidden" name="status" value="1">

                                    <div class="form-group">
                                        {{ Form::button('<i class="fas fa-lock fa-2x text-danger"></i>', ['type' => 'submit', 'class' => 'border border-0', 'data-toggle'=>'tooltip', 'title'=>'Comment is locked!'] )  }}
                                    </div>
                                    
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                                {{-- <td>
                                    <a href="{{route('home.post', $reply->comments->post->id)}}">
                                        <button type="submit" class="border border-0" data-toggle="tooltip" title="View Post?">
                                            <i class='fas fa-binoculars fa-2x text-olive'></i>
                                        </button>
                                    </a>
                                </td> --}}
                                <td>
                                    {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',
                                    $reply->id]]) !!}

                                    <div class="form-group">
                                        {{ Form::button('<i class="fas fa-trash-alt fa-2x text-danger"></i>', ['type' => 'submit', 'class' => 'border border-0', 'data-toggle'=>'tooltip', 'title'=>'Delete this reply?'] )  }}
                                    </div>

                                    {!! Form::close() !!}
                                </td>    
                            </div>                            
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                        <h1 class="text-center">No Replies Yet</h1>
                        @endif
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
