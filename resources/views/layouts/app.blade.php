<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- isi title yang kita kirimkan dari views lain-->
    <title>@yield('title')</title>
    <!-- memanggil Link bootstrap-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- isi content yang kita kirimkan dari views lain-->
    @yield('content') 
</div>

</body>
</html>