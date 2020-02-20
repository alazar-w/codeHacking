@extends('layouts.admin')

@section('content')


    @include('includes.form-error')

    <h1>Create Users</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
        {{csrf_field()}}
     <div class="form-group">
             {!! Form::label('name',"Name:") !!}
             {!! Form::text('name',null,['class'=>'form-control']) !!}

            {!! Form::label('email',"Email:") !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}

            {!! Form::label('is_active',"Status") !!}
            {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}

            {!! Form::label('role_id',"Role") !!}
            {!! Form::select('role_id',array(''=>'choose options' )+ $roles,null,['class'=>'form-control']) !!}

            <div class="form-group">
                 {!! Form::label('password',"Password:") !!}
                 {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('file',"Photo") !!}
                {!! Form::file('file',null,['class'=>'form-control']) !!}
            </div>


      </div>

    <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}





@stop