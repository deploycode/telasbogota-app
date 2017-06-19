@extends('layouts.main')
@section('section')
  {{-- Extracto --}}
  @if (isset(Auth::user()->name))
    <div class="row"><h3 id="title" class="text-center teme-profile">Datos Personales</h3></div>
    <div class="row">
      <div class="panel my-panel">
        <div class="panel-body">
          <table class="table">
            <tr>
               <div class="text-center">
                 <img id="profile_img" src="{!!asset('imgs/users/pic.png')!!}" alt="">
               </div>
              <td>Nombre:</td>
              <td style="text-align:right">Gabriel Ernesto García Rodríguez</td>
            </tr>
            <tr>
              <td>Documento de identidad:</td>
              <td style="text-align:right">1.077.455.940</td>
            </tr>
            <tr>
              <td>Fecha de Nacimiento:</td>
              <td style="text-align:right"> 31 de Octubre de 1992</td>
            </tr>
            <tr>
              <td>Lugar de Nacimiento:</td>
              <td style="text-align:right">Bogotá DC</td>
            </tr>
            <tr>
              <td>Dirección:</td>
              <td style="text-align:right">Calle 63a - 22 Bogotá</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td style="text-align:right">320 531 7510</td>
            </tr>
            <tr>
              <td>Email 1:</td>
              <td style="text-align:right">gabriel@deploycode.co</td>
            </tr>
            <tr>
              <td>Email 2:</td>
              <td style="text-align:right">a-gabrielrodríguez@hotmail.com</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="row"><h3 id="title" class="text-center teme-profile">Estudios</h3></div>
    <div class="row">
      <div class="panel my-panel">
        <div class="panel-body">
          <table class="table">
            <thead>
              <th>Título Obtenido</th>
              <th class="text-right">Institución</th>
            </thead>
            <tbody>
              <tr>
                <div class="text-center">
                </div>
                <td>Ingeniero Teleinformático</td>
                <td style="text-align:right">Universidad Tecnológica del Chocó "Diego Luis Córdoba" (2009 - 2016)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif

  <div class="row"><h3 id="title" class="text-center teme-profile">Extracto</h3></div>
  <div class="row">
    <div class="panel my-panel">
      <div class="panel-body">
        <p>
          Desarrollador web desde 2013, Blogger, escribo sobre software en deploycode.co
          he laborado en 3 empresas y desarrollado más de 30 aplicaciones,en todas me he desempeñado como Full Stack,
          llevando a cabo todo el proceso de ingeniería de las aplicaciones , desde el análisis, el diseño, pasando por la
          codificación hasta el despliegue de la aplicación. Mi mayor anhelo es participar en un proyecto increíble
          que llegue a millones de usuarios.
        </p>
      </div>
    </div>
  </div>
  {{-- Technical Skills --}}
  <div class="row"><h3 id="title" class="text-center teme-profile">Technical Skills</h3></div>
  <div class="row">
    @foreach ($stacks as $stack)
      <div class="panel my-panel">
      <div class="panel-heading">{{$stack->name}}</div>
        <div class="panel-body">
          @foreach ($skills as $skill)
            @if ($skill->stack_id == $stack->id)
              <div class="progress" id="stacks">
                <div class="progress-bar progress-bar-deafult" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->value}}%;">
                  {{$skill->name}}
                </div>
              </div>
              <div style="display:none" id="stacks_print">
                <label for="">{{$skill->name}}</label>: {{$skill->value}}%
              </div>
            @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
  {{-- Experiencia --}}
  <div class="row"><h3 id="title" class="text-center teme-profile">Experiencia</h3></div>
  <div class="row">
    @foreach ($jobs as $job)
      <div class="panel my-panel">
        <div class="panel-heading">{{$job->position}}</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-6"><label>{{$job->company}}</label></div>
            <div class="col-xs-6 text-right">
              @if ($job->start->diffInHours($job->finish, false) > 0)
                {{$job->start->format('F Y')}} -
                {{$job->finish->format('F Y')}}
                ({{$job->start->diffForHumans( $job->finish , true)}})
              @else
                {{$job->start->format('F Y')}} - a la actualidad
                ({{$job->start->diffForHumans( \Carbon\Carbon::now() , true)}})
              @endif
            </div>
          </div>
          <hr>
          <p>{{$job->description}}</p>
        </div>
        @foreach ($projects as $project)
          @if ($project->job_id == $job->id)
            <div class="panel-footer"><a href="//{{$project->url}}" target="blanc">{{$project->name}}</a></div>
            <div class="panel-body">
              <p>{!! $project->description !!}</p>
            </div>
          @endif
        @endforeach
      </div>
    @endforeach
  </div>
@endsection
