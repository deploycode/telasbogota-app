<div class="form-group">
  {!!Form::label('Categoría')!!}
  {!!Form::text('name', null , ['class'=>'form-control' , 'placeholder'=>'Nombre de la Categoría', 'required'])!!}
  {!!Form::label('Descripción')!!}
  {!!Form::textarea('description', null , ['class'=>'form-control' , 'placeholder'=>'Descripción' , 'rows'=>3, 'required'])!!}
</div>
