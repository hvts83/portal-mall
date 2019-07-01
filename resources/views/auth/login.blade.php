<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Mall</title>
    <link href="css/bootstrap.min.css"" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css"" rel="stylesheet">
    <link href="css/animate.css"" rel="stylesheet">
    <link href="css/template.css"" rel="stylesheet">
    <link rel="stylesheet" href="css/template.css">
</head>

<body class="bg-gray">
    <div class="loginBox2 text-center animated fadeInDown">
        <div>
            <h3>Portal mall</h3>
            <p>Inicie sesión con sus credenciales.</p>
            <form  method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" placeholder="usuario" name="usuario" value="{{ old('usuario') }}" required autofocus>
                    @if ($errors->has('usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usuario') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-flat btn-primary">
                            Iniciar sesión
                        </button>
                    </div>
                </div>
            </form>
            <div class="m-b">-</div>
        </div>
    </div>
</body>
</html>