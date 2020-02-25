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
    <img class="img-responsive" src="{{$post->photo->path}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>


@if(Session::has('comment_flash'))
    {{session('comment_flash')}}
@endif
    <!-- Blog Comments -->

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

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>

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