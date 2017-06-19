@extends('layouts.main')
@section('section')
  <table class="table table-striped bg-info">
    <thead>
      <th>State</th>
      <th>Name</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
          <td>
            @if ($post->state == 'draft')
              <i class="btn btn-danger glyphicon glyphicon-eye-close"></i>
            @else
              <i class="btn btn-success glyphicon glyphicon-eye-open"></i>
            @endif
          </td>
          <td>{{$post->name}}</td>
          <td>
            {!!Form::open(['route'=>['post.destroy',$post->id], 'method'=>'DELETE'])!!}
            <div class="form-group">
              <a href="{{ route('post.edit', $post->id) }}"><i class="btn btn-info glyphicon glyphicon-pencil"></i></a>
              <a href="{{ url('post/publish', $post->id) }}"><i class="btn btn-primary glyphicon glyphicon-globe"></i></a>
              <a href="{{ url('post/unpublish', $post->id) }}"><i class="btn btn-warning glyphicon glyphicon-cloud-download"></i></a>
              {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['type' => 'submit', 'class'=>'btn btn-danger']) !!}
            </div>
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
    </tbody>
  </table>
@endsection
