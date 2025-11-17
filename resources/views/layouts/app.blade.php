<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <!-- Header -->
    
    @include('partials.header')
   
    @yield('content')

    @include('partials.footer')
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

     <script src="{{asset('main-page/js/login.js')}}" defer></script>
    <script src="{{asset('main-page/js/lang.js')}}" defer></script>
    <script src="{{asset('main-page/js/script.js')}}" defer></script>
    <script src="{{asset('main-page/js/form-validation.js')}}" defer></script>
    <script src="{{ asset('main-page/js/help-lang.js') }}" defer></script>
    <script src="{{ asset('main-page/js/privacy-lang.js') }}" defer></script>
    <script src="{{ asset('main-page/js/terms-lang.js') }}" defer></script>
    <script src="{{ asset('main-page/js/map.js') }}" defer></script>
    <script src="{{ asset('main-page/js/contact-form.js') }}" defer></script>
    <script src="{{ asset('main-page/js/privacy-lang.js') }}" defer></script>
    <script src="{{ asset('main-page/js/currency-lang.js') }}" defer></script>
    <script src="{{ asset('main-page/js/login-lang.js') }}" defer></script>
    <script src="{{ asset('main-page/js/news-lang.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('main-page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('main-page/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('main-page/css/global.css') }}">
     <link rel="stylesheet" href="{{ asset('main-page/css/login.css') }}">



    @yield('scripts')
</body>

</html>
