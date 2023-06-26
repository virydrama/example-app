<!DOCTYPE html>
<html>
<head>
    <title>Dropzone @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cuadro.css') }} ">
    
    
</head>
<body>
    
    @show
    
    <div class="container">
        @yield('content')
    </div>

</body>
</html>

<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript">
    
    @yield('js')
    
</script>