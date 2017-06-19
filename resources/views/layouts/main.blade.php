<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Textiles para el Hogar y la Confección @if (isset($title))| {!!$title!!} @endif</title>
  <meta name="description" @if(isset($description)) content = "{!!$description!!}, ubicado en Bogotá" @else content = "Textiles para el hogar y la confección, ubicado en Bogotá" @endif >
  <link rel="alternate" hreflang="es" href="http://www.telasbogota.com/" />
  <link rel="icon" href="{!!asset('logo.ico')!!}">
  {!!Html::style('css/bootstrap/bootstrap.min.css')!!}
  {!!Html::style('css/dashboard/metisMenu.min.css')!!}
  {!!Html::style('css/dashboard/sb-admin-2.css')!!}
  {!!Html::style('css/font-awesome.min.css')!!}
  {!!Html::style('css/main.css')!!}
  {!!Html::style('plugins/chosen/chosen.css')!!}
  <link rel="stylesheet" type="text/css" href=" {{asset('css/print.css')}}" media="print" />
</head>
<body>
  @include('analytics')
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{!!URL::to('/')!!}">telasbogota.com</a>
      </div>
      {{-- social icons --}}
      <ul class="nav navbar-top-links navbar-right hidden-xs">
        <li>
          <a>Contacto:</a>
        </li>
        <li>
          <a> <i class="fa fa-whatsapp" aria-hidden="true"></i>312 483 5527</a>
        </li>
        <li>
          <a> <i class="fa fa-envelope-o" aria-hidden="true"></i>ventas@telasbogota.com</a>
        </li>
      </ul>
      {{-- main menu --}}
      <div class="sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            @if (!isset(Auth::user()->name))
              <li class="hidden-xs" id="personal_card">
                <img src="{!!asset('imgs/profile.png')!!}" class="img img-circle img-responsive" alt="">
                <div>
                  <label>Le atenderá:</label>
                  <h2>Carlos García</h2>
                </div>
              </li>
            @endif
            <li><a href="{!!URL::to('/')!!}"><i class="glyphicon glyphicon-home teme-profile"></i> Inicio</a></li>
            @foreach($categories as $category)
              <li><a href="{!!URL::to('categoria/'.$category->slug)!!}"><i class="glyphicon glyphicon-plus teme-profile"></i> {{$category->name}}</a></li>
            @endforeach
            <li><a href="{!!URL::to('contact')!!}"><i class="glyphicon glyphicon-envelope teme-profile"></i> Contacto</a></li>
            @if (!isset(Auth::user()->name))
              <li><a href="{!!URL::to('log')!!}"><i class="glyphicon glyphicon-user teme-profile"></i> Ingresar</a></li>
            @endif
            @if (isset(Auth::user()->name))
              <li><a href="#"><i class="glyphicon glyphicon-cog teme-home"></i> Categories <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="{!!URL::to('category')!!}"> Listar</a></li>
                  <li><a href="{!!URL::to('category/create')!!}"> Agregar</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="glyphicon glyphicon-cog teme-home"></i> Etiquetas <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="{!!URL::to('tag')!!}"> Listar</a></li>
                  <li><a href="{!!URL::to('tag/create')!!}"> Agregar</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="glyphicon glyphicon-cog teme-home"></i> Productos <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="{!!URL::to('post')!!}"> Listar</a></li>
                  <li><a href="{!!URL::to('post/create')!!}"> Agregar</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="glyphicon glyphicon-cog teme-home"></i> Users <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="{!!URL::to('/user')!!}"> Listar</a></li>
                  <li><a href="{!!URL::to('/user/create')!!}"> Agregar</a></li>
                </ul>
              </li>
              <li><a href="{!!URL::to('/logout')!!}"><i class="glyphicon glyphicon-cog teme-home"></i> Logout</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    {{-- content --}}
    <div id="page-wrapper">
      <div class="container-fluid">
        @include('flash::message')
        @yield('section')
      </div>
    </div>
  </div>
  {!!Html::script('js/bootstrap/jquery.min.js')!!}
  {!!Html::script('js/bootstrap/bootstrap.min.js')!!}
  {!!Html::script('js/dashboard/metisMenu.min.js')!!}
  {!!Html::script('js/dashboard/sb-admin-2.js')!!}
  {!!Html::script('plugins/chosen/chosen.jquery.js')!!}
  {!!Html::script('js/main.js')!!}
  @yield('scripts')

</body>
</html>
