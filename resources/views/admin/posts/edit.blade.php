@extends('layouts.admin')

@section('content')

    @include('includes.form-error')

    <h1>Edit</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo?$post->photo->path:'http://via.placeholder.com/640x360'}}" alt="" class="img-responsive">

        </div>

        <div class="col-sm-9">
     {!! Form::model($post,['method'=>'PUT','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title',"Title") !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id',"Category") !!}
        {!! Form::select('category_id',[''=>'options']+$categories,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id',"Photo") !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body',"Description") !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Post',['class'=>'btn btn-primary col-sm-3']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-3']) !!}
    </div>
    {!! Form::close() !!}

        </div>
    </div>
@stop