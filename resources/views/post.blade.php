@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo?$post->photo->path:'http://via.placeholder.com/640x360'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>


@if(Session::has('comment_flash'))
    {{session('comment_flash')}}
@endif
    <!-- Blog Comments -->
@if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST','action'=>'PostCommentController@store']) !!}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                     <div class="form-group">
{{--                         {!! Form::label('body',"Body") !!}--}}
                         {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6]) !!}
                     </div>

                    <div class="form-group">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
        {!! Form::close() !!}

    </div>
@endif
    <hr>

    <!-- Posted Comments -->
@if(count($comments)>0)
    @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="30" class="media-object" src="{{$comment->photo?$comment->photo:'http://via.placeholder.com/640x360'}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}

            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReplay']) !!}
            <div class="form-group">
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @if(count($comment->replies)>0)
            @foreach($comment->replies as $reply)



                <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img height="30" class="media-object" src="{{$reply->photo?$reply->photo:'http://via.placeholder.com/640x360'}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            <p>{{$reply->body}}</p>

                            <div class="comment-reply-container">
                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                <div class="comment-reply">
                        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReplay']) !!}
                        <div class="form-group">
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                                </div>
                        </div>
                    </div>
            <!-- End Nested Comment -->
                </div>
            @endforeach
            @endif

        </div>
    </div>
    @endforeach
@endif

    <!-- Comment -->

@stop


@section('categories')
    <div class="row">
        <div class="col-lg-6">
            @if($categories)
                @foreach($categories as $category)
            <ul class="list-unstyled">
                <li><a href="#">{{$category->name}}</a>
                </li>

            </ul>
                @endforeach
                @endif
        </div>

    </div>
@stop
@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        })
    </script>
@stop