<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use deploycodeApp\Image;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
      $imagen=Image::find($id);
      \Storage::delete($imagen->image);
      Image::destroy($id);
      return redirect()->back();
    }
}
