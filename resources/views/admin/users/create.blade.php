@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>
    {!! Form::open(['method'=>'POST','action'=>'PostController@store']) !!}
        {{csrf_field()}}
     <div class="form-group">
             {!! Form::label('body',"Body") !!}
             {!! Form::text('body',null,['class'=>'form-control']) !!}
      </div>

    <div class="form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}


        @if(count($errors)>0)
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
        @endif

@stop