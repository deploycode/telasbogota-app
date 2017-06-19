@extends('layouts.main')
@section('section')
  {!!Form::model($tag,['route'=>['tag.update', $tag->id], 'method'=>'PUT', 'class'=>'formulario'])!!}
    @include('tag.form.field')
    <div class="form-group">
      {!!Form::submit('Update', ['class'=>'btn btn-success pull-right'])!!}
    </div>
  {!!Form::close()!!}
@endsection
