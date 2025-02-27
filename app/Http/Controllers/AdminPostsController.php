<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
       $user = Auth::user();
       $input = $request->all();

       //  $post = new Post(['title'=>'first post','body'=>'i love laravel']);
        //    $user->posts()->save($post);

       if ($file = $request->file('photo_id')){
           $name = time().$file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['path'=>$name]);

           $input['photo_id'] = $photo->id;
       }

       $user->posts()->create($input);
       return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get()->pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->where('id',$id)->first()->update($input);

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path().$post->photo->path);
        $post->delete();
        Session::flash('deleted_user','The post is Deleted');

        return redirect('admin/posts');
    }

    public function post($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post',compact('post','categories','comments'));
    }
}
