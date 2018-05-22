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

<address>
    <p>copyright &copy; 2017 daishin Co.,Ltd. All Right Reserved.</p>
</address>
<div class="sidefix">
    <a href="/lineup/">
        <img src="{{ asset('img/lineup/tit_lineup_t.png') }}" ></a>
</div>

<footer>
    @include('front.components.footer')
</footer>


@include('front.components.js_top')

</body>
</html>