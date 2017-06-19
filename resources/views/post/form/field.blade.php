<div class="form-group">
  {!!Form::label('Categoría')!!}
  {!!Form::select('category_id', $categorias , null, ['class'=>'form-control' , 'placeholder'=>'Seleccione una categoría' , 'required'])!!}
</div>
<div class="form-group">
  {!!Form::label('Referencia')!!}
  {!!Form::text('name', null , ['class'=>'form-control' , 'placeholder'=>'Ingrese la referencia del producto', 'required'])!!}
</div>
<div class="form-group">
  {!!Form::label('Precio')!!}
  {!!Form::text('price', null , ['class'=>'form-control' , 'placeholder'=>'Ingrese el precio del producto', 'required'])!!}
</div>
<div class="form-group">
  {!!Form::label('Descripción')!!}
  {!!Form::textarea('content', null , ['id'=>'txa', 'class'=>'form-control', 'rows'=>'5', 'required'])!!}
</div>
<div class="form-group">
  {!!Form::label('Imagen')!!}
  {!!Form::file('image[]' , ['class'=>'form-control'])!!}
</div>
<div class="form-group" id="files"></div>
<div class="form-group">
  <a href="#" class="btn btn-lg btn-info glyphicon glyphicon-plus"onclick="agregar();"> <i class="glyphicon glyphicon-picture"></i></a>
</div>
<div class="form-group">
  {!!Form::label('Tags')!!}
  @if (isset($myTags))
    {!!Form::select('tags[]', $tags , $myTags, ['class'=>'form-control chosen-select' , 'id'=>'slc_tags',  'data-placeholder'=>'Seleccione los tags','multiple'])!!}
  @else
    {!!Form::select('tags[]', $tags , null, ['class'=>'form-control chosen-select' , 'id'=>'slc_tags',  'data-placeholder'=>'Seleccione los tags','multiple'])!!}
  @endif
</div>
@section('scripts')
  <script>
    $('#slc_tags').chosen({ });
  </script>
@endsection
</script>
