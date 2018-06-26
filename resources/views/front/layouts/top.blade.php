<!doctype html>
<html>

<head>
    @include('front.components.head_top')
    @include('front.components.css')
</head>

<body>

<header>
    @include('front.components.header_top')
</header>

@yield('content')

<div class="sidefix">
    <a href="{{ url('lineup') }}">
        <img src="{{ asset('img/lineup/tit_lineup_t.png') }}" >
    </a>
</div>

<footer>
    @include('front.components.footer')
</footer>


@include('front.components.js_top')

</body>
</html>