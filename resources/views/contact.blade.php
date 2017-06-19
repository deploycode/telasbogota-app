@extends('layouts.main')
@section('section')
  <div class="row"><h1 id="title" class="text-center teme-contact">Contacto</h1></div>
  <article id="post">
      <div class="form-group">
        <hr>
        <p>
          Bogotá - Colombia <br>
          ventas@telasbogota.com
        </p>
        <hr>
      </div>
    {!!Form::open(['route'=>'mail.store', 'method'=>'POST' , 'role'=>'form'])!!}
      <div class="form-group">
        {!!Form::text('email', null,['placeholder'=>'Número de contacto', 'class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!!Form::textarea('message',null, array('placeholder'=>'Mensaje','class'=>'form-control'));!!}
      </div>
      <div class="form-group">
        {!!Form::button('<span class="glyphicon glyphicon-send"></span> Enviar' ,['type'=>'submit','class'=>'btn btn-success']);!!}
      </div>
    {!!Form::close()!!}
  </article>
@endsection
