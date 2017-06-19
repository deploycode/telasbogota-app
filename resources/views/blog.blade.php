@extends('layouts.main')
@section('section')
  <div class="row">
    @if (isset($title))
      <h1 id="title" class="text-center teme-profile">{{$title}}</h1>
    @endif
    <hr id="separador" class="teme-profile">
    @if (isset($description))
      <p class="teme-profile" id="description">{{$description}}</p>
    @endif
    <p id="filtros" class="teme-home">
      Filtros:
      @foreach ($tags as $tag)
        <a href="{!!URL::to('filtro/'.$tag->slug)!!}" class="btn btn-primary Calibri" id="myTags">{!!$tag->name!!}</a>
      @endforeach
    </p>
  </div>
  <div class="row blog-row">
    @foreach ($posts as $miPost)
      <div class="thumbnail col-xs-12 col-sm-4 col-md-3 col-lg-2">
        <label class="label label-info">Referencia: {!!$miPost->name!!}</label>
        <button id="miBoton" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#{{$miPost->id}}">
            <img src="{{asset('imgs/'.$miPost->images[0]->image)}}" alt="" class="img img-responsive">
        </button>
        <p id="price" class="label label-success pull-right">{!!$miPost->price!!}</p>
          <div class="caption">
            <hr>
            <span class="label label-warning"> Etiquetas:</span>
            @foreach ($miPost->tags as $myTag)
            <span class="label label-default">  {!!$myTag->name!!}</span>
            @endforeach
          </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="{{$miPost->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel"><label class="label label-info">Referencia: {!!$miPost->name!!}</label> <label class="label label-success"> Precio: {!!$miPost->price!!}</label></h4>
            </div>
            <div class="modal-body">
              {{-- carrusel --}}
              <div id="carousel-{{$miPost->id}}" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="{{asset('imgs/'.$miPost->images[0]->image)}}" alt="" class="img img-responsive">
                  </div>
                  @for ($i=1; $i < count($miPost->images) ; $i++)
                    <div class="item">
                      <img src="{{asset('imgs/'.$miPost->images[$i]->image)}}" alt="" class="img img-responsive">
                    </div>
                  @endfor
                </div>

                <!-- Controls -->
                @if (count($miPost->images)>1)
                  <a class="left carousel-control" href="#carousel-{{$miPost->id}}" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-{{$miPost->id}}" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                @endif
              </div>
              {{-- fin carrusel --}}
              <br><p>{!!$miPost->content!!}</p>
            </div>
            <div class="modal-footer">
              @foreach ($miPost->tags as $myTag)
              <span class="label label-default">  {!!$myTag->name!!}</span>
              @endforeach
              <hr>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <a href="{!!URL::to('contact')!!}" type="button" class="btn btn-primary">Contactar</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
