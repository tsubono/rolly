<!doctype html>
<html>

<head>
    @include('front.components.head')
    @include('front.components.css')
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQV376B"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header>
    @include('front.components.header')
</header>

@yield('content')

<div class="sidefix">
    <a href="/lineup/">
        <img src="{{ asset('img/lineup/tit_lineup_t.png') }}">
    </a>
</div>


<footer>
    @include('front.components.footer')
</footer>

@include('front.components.js')

</body>
</html>