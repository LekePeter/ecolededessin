<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">    
    <title>{{config('app.name')}}</title>
</head>
<body>
    @include('inc.navbar')
    @yield('content')
    @include('inc.footer')
    <section>
        <a class="scroll-top scroll-top-visible" href="#top"><i class="ti-angle-up"></i></a>
    </section>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
