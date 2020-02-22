@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    <table class="table">
        <h1>Posts</h1>
        <thead>
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Category</th>
              <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category?$post->category->name:'uncategorized'}}</td>
              <td><img src="{{$post->photo?$post->photo->path:'http://via.placeholder.com/640x360'}}" height="40" alt="No Photo"></td>
              <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
              <td>{{Str::limit($post->body,10)}}</td>
              <td>{{$post->created_at->diffForhumans()}}</td>
              <td>{{$post->updated_at->diffForhumans()}}</td>
          </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop