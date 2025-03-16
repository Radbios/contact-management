<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset("assets/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("mdb/css/mdb.min.css")}}">
    <script src="https://unpkg.com/imask"></script>

    @yield("css")

    <title>@yield("title") | {{config("app.name")}}</title>
</head>

<body>
    @auth
        @include("layouts.nav")
    @endauth
    
    @include("includes.flash-message")
    @yield("container")
</body>

<script src="{{asset("mdb/js/mdb.es.min.js")}}"></script>
<script src="{{asset("mdb/js/mdb.umd.min.js")}}"></script>

@yield("js")
</html>