@extends('layouts.admin')

@section('content')

    <table class="table">
        @if(Session::has('media_delete'))
            <p class="bg-danger">{{session('media_delete')}}</p>
        @endif
        <h1>Media</h1>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img src="{{$photo->path}}" height="40"> </td>
            <td>{{$photo->created_id?$photo->created_id:'no date'}}</td>
              <td>
                  {!! Form::model($photo,['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!}

                  <div class="form-group">
                      {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                  </div>
                  {!! Form::close() !!}
              </td>
          </tr>

          @endforeach
        @endif
        </tbody>
     </table>
@stop