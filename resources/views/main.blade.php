<!DOCTYPE html>
<html lang="en">
<head>
	@include('assets.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @yield('konten')
    </div>
    @include('assets.scroll')
    @include('assets.modal')
    
    @include('assets.js')

</body>

</html>