<!DOCTYPE html>
<html lang="en">

<head>
    @include('landing.include.head')
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        @include('landing.include.menu')
    </nav>
    @yield("contenido")
    
    <!-- Footer-->
    <footer class="footer py-4">
        @include('landing.include.footer')
    </footer>

    @include("landing.include.script")
</body>

</html>
