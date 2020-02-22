<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function upload(Request $request)
    {
        //in drop zone we find the uploaded data from the 'file' key
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['path' => $name]);
    }

    public function destroy($id){
       $photo = Photo::findOrFail($id);
       unlink(public_path().$photo->path);
       Session::flash('media_delete','media deleted');
       $photo->delete();
       return redirect('/admin/media');

    }
}
