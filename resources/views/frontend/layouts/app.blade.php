@include('frontend.partials.header')
@include('frontend.auth.login')
<main>
    @yield('content')
</main>

@include('frontend.partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

