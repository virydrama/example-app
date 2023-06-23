<!DOCTYPE html>
<html>
<head>
    <title>Dropzone @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
    <link href="{{ asset('css/cuadro.css') }}" rel="stylesheet">
    
</head>
<body>
    
    @show
    
    <div class="container">
        @yield('content')
    </div>

</body>
</html>


<script type="text/javascript">
    @yield('script')
</script>