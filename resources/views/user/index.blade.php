@extends('layouts.main')
@section('section')
  <table class="table table-striped bg-info">
    <thead>
      <th>Name</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>
            {!!Form::open(['route'=>['user.destroy',$user->id], 'method'=>'DELETE'])!!}
            <div class="form-group">
              <a href="{{ route('user.edit', $user->id) }}"><i class="btn btn-primary glyphicon glyphicon-pencil"></i></a>
              {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}
            </div>
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
    </tbody>
  </table>
@endsection
