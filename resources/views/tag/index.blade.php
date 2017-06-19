@extends('layouts.main')
@section('section')
  <table class="table table-striped bg-info">
    <thead>
      <th>Name</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    @foreach ($tags as $tag)
        <tr>
          <td>{{$tag->name}}</td>
          <td>
            {!!Form::open(['route'=>['tag.destroy',$tag->id], 'method'=>'DELETE'])!!}
            <div class="form-group">
              <a href="{{ route('tag.edit', $tag->id) }}"><i class="btn btn-primary glyphicon glyphicon-pencil"></i></a>
              {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}
            </div>
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
    </tbody>
  </table>
@endsection
