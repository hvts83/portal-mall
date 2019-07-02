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
            <div><img src="{{ $config->publicity }}" class="img-publicity" /></div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
