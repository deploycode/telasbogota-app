@extends('layouts.main')
@section('section')
  {!!Form::model($category,['route'=>['category.update', $category->id], 'method'=>'PUT', 'class'=>'formulario'])!!}
    @include('category.form.field')
    <div class="form-group">
      {!!Form::submit('Update', ['class'=>'btn btn-success pull-right'])!!}
    </div>
  {!!Form::close()!!}
@endsection
