<!DOCTYPE html>
<html>
<head>
    <title>Dropzone @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cuadro.css') }} ">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    
    @show
    
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<!--<script src="https://cdn.tailwindcss.com"></script>-->
<script type="text/javascript">
    
    @yield('js')
    
</script>