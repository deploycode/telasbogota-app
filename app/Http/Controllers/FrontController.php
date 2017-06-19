<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use deploycodeApp\Post;
use deploycodeApp\Tag;
use deploycodeApp\Category;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;
use Carbon\Carbon;
class FrontController extends Controller
{
  public function __construct(){
    Carbon::setLocale('es');
  }
    public function index()
    {
      $categories=Category::all();
      return view('index', ['categories'=>$categories]);
    }
    public function blog()
    {
      $tags= Tag::orderBy('name','ASC')->get();
      $posts=Post::where('state','=', 'published')->get();
      $categories=Category::all();
      return view('blog',['posts'=> $posts , 'categories'=>$categories , 'tags'=>$tags]);
    }

    public function show()
    {
      return view('blog');
    }

    public function contact()
    {
      $categories=Category::all();
      return view('contact', ['categories'=>$categories]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
