<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use deploycodeApp\Post;
use deploycodeApp\Category;
use deploycodeApp\Tag;
use deploycodeApp\Image;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct(){
      $this->middleware('auth', ['only' => ['index', 'create' , 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
      $categories=Category::all();
      $posts=Post::all();
      return view('post.index',['posts'=>$posts,'categories'=>$categories]);
    }
    public function create()
    {
      $categories=Category::all();
      $categorias=Category::lists('name','id');
      $tags=Tag::orderBy('name','ASC')->lists('name','id');
      return view('post.create',['categories'=>$categories, 'tags'=>$tags, 'categorias'=>$categorias]);
    }
    public function store(Request $request)
    {
      $post=Post::create([
        'name'=>$request->name,
        'price'=>$request->price,
        'state'=>'published',
        'content'=>$request->content,
        'category_id'=>$request->category_id,
      ]);
      foreach ($request->image as $image) {
        Image::create([
          'image'=>$image,
          'alt'=>$post->content,
          'post_id'=>$post->id,
        ]);
      }
      $post->tags()->sync($request->tags);
      Flash('Post created','success');
      return redirect('post');
    }
    public function show($slug)
    {
      $post=Post::where('slug','=', $slug)->firstOrFail();
      return view('post',['post'=>$post]);
    }
    public function edit($id)
    {
      $categories=Category::all();
      $categorias=Category::lists('name','id');
      $tags=Tag::orderBy('name','ASC')->lists('name','id');
      $post=Post::find($id);
      $myTags=$post->tags->lists('id')->ToArray();
      return view('post.edit' , ['post'=> $post,'categories'=>$categories,'categorias'=>$categorias  , 'tags'=>$tags , 'myTags'=>$myTags]);
    }
    public function update(Request $request, $id)
    {
      $post= Post::find($id);
      $post->slug = null;
      $post->fill($request->all());
        foreach ($request->image as $image) {
          if ($image!='') {
          Image::create([
            'image'=>$image,
            'alt'=>'hola',
            'post_id'=>$post->id,
          ]);
        }
      }
      $post->save();
      $post->tags()->sync($request->tags);
      flash('post actualizado satisfactoriamente', 'success');
      return redirect('post');
    }
    public function destroy($id)
    {
      $post= Post::find($id);
      $post->tags()->detach();
      foreach ($post->images as $myImage) {
        \Storage::delete($myImage->image);
      }
      Post::destroy($id);
      flash('post eliminado satisfactoriamente', 'success');
      return redirect('post');
    }
    public function publish($id)
    {
      $post=Post::find($id);
      $post->state='published';
      $post->save();
      flash('post publicado satisfactoriamente', 'success');
      return redirect('post');
    }
    public function unpublish($id)
    {
      $post=Post::find($id);
      $post->state='draft';
      $post->save();
      flash('post publicado satisfactoriamente', 'success');
      return redirect('post');
    }
    public function preview($slug)
    {
      $post=Post::where('slug','=', $slug)->firstOrFail();
      return view('post',['post'=>$post]);
    }
    public function categories($slug)
    {
      $tags=Tag::orderBy('name','ASC')->get();
      $categories=Category::all();
      $category=Category::where('slug', '=', $slug)->firstOrFail();
      $posts=Post::where('category_id', '=',$category->id)->get();
      $title=$category->name;
      $description=$category->description;
      return view('blog',['posts'=>$posts , 'categories'=>$categories , 'tags'=>$tags, 'title'=>$title, 'description'=>$description ]);
    }
    public function filtros($slug)
    {
      $tag=Tag::where('slug', '=', $slug)->firstOrFail();
      $posts=$tag->posts;
      $categories=Category::all();
      $tags=Tag::orderBy('name','ASC')->get();
      $title=$tag->name;
      return view('blog',['posts'=>$posts , 'categories'=>$categories , 'tags'=>$tags , 'title'=>$title ]);
    }
}
