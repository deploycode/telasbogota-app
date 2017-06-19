@extends('layouts.main')
@section('section')
  @foreach ($post->images as $myImage)
    {!!Form::open(['route'=>['image.destroy',$myImage->id ], 'method'=>'DELETE' , 'id'=>'form_inline'])!!}
    <div class="thumbnail">
      <img src="{!!asset('imgs/'.$myImage->image)!!}" alt="" style="width:200px;">
    </div>
    <div class="form-group">
      {!! Form::button('<span class="glyphicon glyphicon-trash"></span>Eliminar', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}
    </div>
    {!!Form::close()!!}
  @endforeach
  {!!Form::model($post,['route'=>['post.update', $post->id], 'method'=>'PUT', 'class'=>'formulario', 'files'=>true])!!}
    @include('post.form.field')
    <div class="form-group">
      {!!Form::submit('Update', ['class'=>'btn btn-success pull-right'])!!}
    </div>
  {!!Form::close()!!}
@endsection
