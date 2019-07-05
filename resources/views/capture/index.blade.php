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
        
        <div >
            <div class="text-center"><img class="img-logo" src="{{ $config->logo }}" /></div>
            <form class="m-t form-wrap" role="form" action="send" method="POST">
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
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @php $i = 0 @endphp
                        @foreach ($banners as $banner)
                            <li data-target="#myCarousel" @if($i == 0) class="active" @endif></li>  
                            @php $i++ @endphp      
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @php $i = 0 @endphp
                        @foreach ($banners as $banner)
                            <div class="item {{ $i == 0 ? 'active': null  }}">
                                <img src="{{ $banner->url }}"  class="img-publicity"/>
                            </div>
                            @php $i++ @endphp
                        @endforeach
                    </div>
            </div><!-- /.carousel -->
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
