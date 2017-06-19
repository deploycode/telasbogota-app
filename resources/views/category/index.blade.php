@extends('layouts.main')
@section('section')
  <table class="table table-striped bg-info">
    <thead>
      <th>Name</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
          <td>{{$category->name}}</td>
          <td>
            {!!Form::open(['route'=>['category.destroy',$category->id], 'method'=>'DELETE'])!!}
            <div class="form-group">
              <a href="{{ route('category.edit', $category->id) }}"><i class="btn btn-primary glyphicon glyphicon-pencil"></i></a>
              {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}
            </div>
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
    </tbody>
  </table>
@endsection
