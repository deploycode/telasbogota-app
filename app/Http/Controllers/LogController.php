<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
      return view('log');
    }
    public function store(Request $request)
    {
      {
        if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
          return Redirect('/post/create');
        }
        flash('Favor verifique sus datos de ingreso','danger');
        return Redirect('/log');
      }
    }
    public function logout()
    {
      Auth::logout();
      return Redirect('/');
    }
}
