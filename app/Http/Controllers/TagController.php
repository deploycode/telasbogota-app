<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use deploycodeApp\Tag;
use deploycodeApp\Category;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class TagController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    public function index()
    {
      $categories=Category::all();
      $tags=Tag::all();
      return view('tag.index',['tags'=>$tags,'categories'=>$categories]);
    }
    public function create()
    {
      $categories=Category::all();
      return view('tag.create',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
      Tag::create($request->all());
      flash('Tag created', 'success');
      return redirect('tag/create');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
      $tag=Tag::find($id);
      $categories=Category::all();
      return view('tag.edit' , ['tag'=> $tag, 'categories'=>$categories]);
    }
    public function update(Request $request, $id)
    {
      $tag= Tag::find($id);
      $tag->fill($request->all());
      $tag->slug = null;
      $tag->save();
      flash('tag actualizado satisfactoriamente', 'success');
      return redirect('tag');
    }
    public function destroy($id)
    {
      Tag::destroy($id);
      flash('tag eliminado satisfactoriamente', 'success');
      return redirect('tag');
    }
}
