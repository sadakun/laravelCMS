@extends('layouts.blog-post')
@section('content-header')
<div class="container">
    <!-- /.row -->
    <div class="row mb-2">
        <!-- col -->
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b> {{$post->title}} </b></h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection

@section('content')
<!-- container-fluid -->
<div class="container">
    <!-- row -->
    <div class="row">
        <!--Left-->
        <!-- col-md-8 -->
        <div class="col-lg-8">
            <!-- Posted Content -->
            <!-- card-widget-post -->
            <div class="card card-widget">
                <!-- card-header-post -->
                <div class="card-header">
                    <!-- user-block -->
                    <div class="user-block">
                        <img class="img-circle" src="{{$post->user->photo->file}}" alt="User Image">
                        <span class="username"><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></span>
                        <span class="description">Shared publicly - {{$post->created_at->format('d, M Y g:i a')}}</span>
                    </div>
                    <!-- /.user-block -->

                    <!-- card-tools -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header-post -->
                
                <!-- card-body-post -->
                <div class="card-body border">
                    <!-- body-post-images -->
                    <div class="text-center">
                        <img class="img-fluid rounded-top pad" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="Photo">

                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </div>
                    <!-- /.body-images -->

                    <!-- body-post-paragraph -->
                    <span class="text-justify">
                        <p>{{$post->body}}</p>
                    </span>
                    <!-- /.body-post-paragraph -->

                    <!-- body-post-btn -->
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                    <span class="float-right text-muted">127 likes - 3 comments</span>
                    <!-- /.body-post-btn -->
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer-posted-comment -->
                @foreach ($comments as $comment)
                <div class="card-footer card-comments pb-1 border border-0">
                    <div class="card-comment border border-0">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="{{$comment->photo}}" alt="User Image">
    
                        <div class="comment-text">
                            <span class="username">
                                {{$comment->author}}
                            <span class="text-muted float-right">{{$comment->created_at->format('g:i a').", ".$comment->created_at->diffForHumans()}}</span>
                            </span><!-- /.username -->
                            <div class="">

                            
                            <span class="comment-tex-body">
                                {{$comment->body}} 
                            </span>
                            </div>
                        </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                    <div class="comment-reply-container">
                        <span class="toggle-reply text-muted btn btn-sm border">Reply</span>
                        <div class="comment-reply">
                            @foreach($comment->replies as $reply)
                            <div class="card-footer card-comments pb-0 ml-4 border border-0 bg-light">
                                {{-- <div class="card-comment"> --}}
                                <!-- User image -->
                                <img class="img-circle img-sm" src="{{$reply->photo}}" alt="User Image">
                
                                    <div class="comment-text">
                                        <span class="username">
                                            {{$reply->author}}
                                        <span class="text-muted float-right">{{$reply->created_at->format('g:i a').", ".$reply->created_at->diffForHumans()}}</span>
                                        </span><!-- /.username -->
                                        {{$reply->body}}                              
                                    </div>
                                <!-- /.comment-text -->
                                {{-- </div> --}}
                                <!-- /.card-comment -->
                            </div>
                            @endforeach
                            <!-- reply-form -->
                            <div class="form-group mt-2 ml-4">
                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply','files'=>true]) !!}
                            <!-- form-message -->
                            <img class="img-circle img-sm" src="{{Auth::user()->photo->file}}" alt="Alt Text">
                                <div class="img-push">
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    {!! Form::text('body',null , ['id'=>"replyBtn$comment->id",'autocomplete'=>'off','class'=>'form-control form-control-sm','placeholder'=>'Press enter to reply']) !!}
                                </div>
                                <!-- /.form-message -->
                            {!! Form::close() !!}
                            <!-- /.reply form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comment -->
                @endforeach
                
                <!-- card-footer-comment -->
                <div class="card-footer elevation-1">
                    <!-- comment-form -->
                    {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
                    <img class="img-circle img-sm" src="{{Auth::user()->photo->file}}" alt="Alt Text">
                    
                    <!-- comment-input-body -->
                    <div class="img-push">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        {!! Form::text('body',null , ['id'=>'commentBtn','autocomplete'=>'off','class'=>'form-control form-control-sm','placeholder'=>'Press enter to post comment..']) !!}
                    </div>
                    <!-- /.comment-input-body -->

                    {!! Form::close() !!}
                    <!-- /.comment-form -->

                    <!-- comment-validation -->
                    @if (Session::has('comment_message'))
                    {{session('comment_message')}}
                    @endif
                    <!-- /.comment-validation -->
                </div>
                <!-- /.card-footer-comment -->
            </div>
            <!-- /.card widget-->
        </div>
        <!-- /.col-md-8 -->

        <!--Right-->
        <!-- col-md-4 -->
        <div class="col-lg-4">
            <!-- Category -->
            <!-- card-widget-categories -->
            <div class="card card-widget widget-user-2">
                <!-- widget-categories-header -->
                <div class="widget-user-header">
                    <!-- header-title -->
                    <h4 class="widget-user">Categories
                        <!-- card-tools -->
                        <div class="card-tools float-right">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </h4>
                    <!-- /.header-title -->
                </div>
                <!-- /.widget-categories-header -->
                
                <!-- widget-categories-footer -->
                <div class="card-footer p-0">
                    <!-- categories-list -->
                    <ul class="nav flex-column">
                        <!-- categories-list-item -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <b>##</b> <span class="float-right badge bg-primary">31</span>
                            </a>
                        </li>
                        <!-- /.categories-list-item -->
                    </ul>
                    <!-- /.categories-list -->
                </div>
                <!-- /.widget-categories-footer -->
            </div>
            <!-- /.card-widget-categories -->
            
            <!-- Recent Post -->
            <!-- info-box-recent-post --> 
            <div class="info-box">
                <!-- recent-post-image -->
                <img class="img-circle elevation-2" style="width:70px" src="#" alt="User Image">

                <!-- recent-post-content -->
                <div class="info-box-content">
                    <!-- recent-post-title -->
                    <span class="info-box-text"><a href="#">##</a></span>

                    <!-- recent-post-category -->
                    <span class="info-box-number">##</span>
                </div>
                <!-- /.recent-post-content -->
            </div>
            <!-- /.info-box-recent-post --> 
            
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection

<!-- hit enter key to enter comment -->
@section('scripts')
<script>
    var input = document.getElementById("commentBtn");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("commentBtn").click();
        }
    });
</script>
<script>
    var input = document.getElementById("replyBtn");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("replyBtn").click();
        }
    });
</script>
<script>
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });
</script>
@endsection