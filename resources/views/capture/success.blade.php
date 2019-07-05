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
        background: url({{ $config->successBg }}) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover; 
        -o-background-size: cover; background-size: cover;"
>
    <div class="loginBox text-center animated fadeInDown">
        <div>
            <div><img class="img-logo" src="{{ $config->logo }}" /></div>
            <div class="form-wrap">
            <h2>Bienvenido</h2>
            <p>{{ $config->success_text }}</p>
            </div>
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
