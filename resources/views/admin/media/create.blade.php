@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
@stop

@section('content')
    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST','action'=>('AdminMediaController@upload'),'files'=>true,'class'=>'dropzone']) !!}

    {!! Form::close() !!}

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>


@stop