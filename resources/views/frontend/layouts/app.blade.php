<!DOCTYPE html>
<html lang="en">
@include('frontend.partials.head')
<body>
@include('frontend.partials.header')
@include('frontend.auth.login')
<main>
    @yield('content')
</main>

@include('frontend.partials.footer')
</body>
</html>
