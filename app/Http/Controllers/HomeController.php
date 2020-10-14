<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = User::find(Auth::user()->id)->posts;
        return view('home', ["posts" => $posts]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        if (!is_dir(public_path('images'))) mkdir(public_path('images'), 0777);

        $request->validate(['file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2028']);
        $imgName = time() . '.' . $request->file('file')->extension();
        $request->file('file')->move(public_path('images'), $imgName);
        Post::create(["img_name" => $imgName, "user_id" => Auth::user()->id]);
        return redirect('/home');
    }

    public function destroy(Post $post)
    {
        File::delete(public_path('images') . $post->img_name);
        $post->delete();
        return redirect('/home');
    }
}
