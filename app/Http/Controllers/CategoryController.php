<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use deploycodeApp\Category;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index()
    {
      $categories=Category::all();
      return view('category.index',['categories'=>$categories]);
    }
    public function create()
    {
      $categories=Category::all();
      return view('category.create',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
      Category::create($request->all());
      flash('Category created', 'success');
      return redirect('category/create');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
      $categories=Category::all();
      $category=Category::find($id);
      return view('category.edit' , ['category'=> $category,'categories'=>$categories]);
    }
    public function update(Request $request, $id)
    {
      $category= Category::find($id);
      $category->fill($request->all());
      $category->slug = null;
      $category->save();
      flash('category actualizado satisfactoriamente', 'success');
      return redirect('category');
    }
    public function destroy($id)
    {
      Category::destroy($id);
      flash('Categoria eliminado satisfactoriamente', 'success');
      return redirect('category');
    }
}
