@extends('layouts.main')
@section('section')
  <div class="jumbotron">
    {!!Form::open(['route'=>'category.store','method'=>'POST'])!!}
    @include('category.form.field')
    <div class="form-group">
      {!!Form::submit('Create', ['class'=>'btn btn-success pull-right'])!!}
    </div>
    {!!Form::close()!!}
  </div>
@endsection
