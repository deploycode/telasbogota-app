<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use deploycodeApp\User;
use deploycodeApp\Category;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index()
    {
      $categories=Category::all();
      $users=User::all();
      return view('user.index',['users'=>$users,'categories'=>$categories]);
    }
    public function create()
    {
      $categories=Category::all();
      return view('user.create',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
      User::create($request->all());
      flash('Usuario creado satisfactoriamente', 'success');
      return redirect('user/create');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
      $user=User::find($id);
      $categories=Category::all();
      return view('user.edit' , ['user'=> $user,'categories'=>$categories]);
    }
    public function update(Request $request, $id)
    {
      $user= User::find($id);
      $user->fill($request->all());      
      $user->save();
      flash('user actualizado satisfactoriamente', 'success');
      return redirect('user');
    }
    public function destroy($id)
    {
      User::destroy($id);
      flash('user eliminado satisfactoriamente', 'success');
      return redirect('user');
    }
}
