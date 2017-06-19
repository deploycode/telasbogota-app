<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard/sb-admin-2.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        {{-- @include('requests') --}}
        @include('flash::message')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingreso a Administrador</h3>
                    </div>
                    <div class="panel-body">
                      {!!Form::open(['route'=>'log.store','method'=>'POST'])!!}
                            <fieldset>
                                <div class="form-group">
                                  {!!Form::label('correo', 'Correo')!!}
                                  {!!Form::email('email', null,['class'=>'form-control','placeholder'=>'Ingrese su correo'])!!}
                                </div>
                                <div class="form-group">
                                  {!!Form::label('contrasena', 'Contraseña')!!}
                                  {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}
                                </div>
                                <div class="form-group">
                                  {!!link_to('password/email', $title ="¿Olvidó su contraseña?", $attributes= ['class'=>'btn btn-sm btn-info'] , $secure = null )!!}
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                {!!Form::submit('Iniciar', ['class'=>'btn btn-success btn-lg btn-block'])!!}
                            </fieldset>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/dashboard/metisMenu.min.js"></script>
    <script src="js/dashboard/sb-admin-2.js"></script>
</body>
</html>
