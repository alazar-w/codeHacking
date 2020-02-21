@extends('layouts.admin')

@section('content')


    @include('includes.form-error')

    <h1>Edit Users</h1>

    <div class="col-sm-9">

        <div class="col-sm-3">
            <img src="{{$user->photo?$user->photo->path:'http://via.placeholder.com/640x360'}}" alt="No Photo" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
        {!! Form::model($user,['method'=>'PUT','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
        {{csrf_field()}}
            <div class="form-group">
            {!! Form::label('name',"Name:") !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
            {!! Form::label('email',"Email:") !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('is_active',"Status") !!}

    {{--        if we give another defult other than null our status will not be displayed correctly--}}
            {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('role_id',"Role") !!}
            {!! Form::select('role_id',array(''=>'choose options' )+ $roles,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password',"Password:") !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id',"Photo") !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit User',['class'=>'btn btn-primary']) !!}
            </div>

        </div>


    </div>

    {!! Form::close() !!}





@stop