@extends('layouts.admin')

@section('content')
    <h1>Edit Categories</h1>
    <div class="col-sm-6">

        {!! Form::model($category,['method'=>'PUT','action'=>['AdminCategoriesController@update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name',"Name") !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::submit('Update Category',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
        <div class="col-sm-3" style="padding-left: 32px">
            {!! Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>



@stop