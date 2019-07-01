<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $config->name }}</title>
    <link href="css/bootstrap.min.css"" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css"" rel="stylesheet">
    <link href="css/animate.css"" rel="stylesheet">
    <link href="css/template.css"" rel="stylesheet">
    <link rel="stylesheet" href="css/template.css">
</head>

<body style="
        background: url({{ $config->landingBg }}) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover; 
        -o-background-size: cover; background-size: cover;"
>
    <div class="loginBox animated fadeInDown">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div>
            <div class="text-center"><img class="img-logo img-circle" src="{{ $config->logo }}" /></div>
            <form class="m-t" role="form" action="send" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Fecha nacimiento</label>
                    <input type="date" class="form-control" name="birthday" required=>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo" required>
                        <option selected disabled>Seleccione sexo</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>
                </div>
                <div>
                    <label> Deseo recibir notificaciones de eventos y promociones <input type="checkbox" class="i-checks" name="promocion"></label>
                </div>
                <div class="form-group"> 
                    
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Registrarme</button>
            </form>
            <div><img src="{{ $config->publicity }}" class="img-publicity" /></div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
