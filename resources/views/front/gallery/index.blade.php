@extends('front/layouts.default')

@section('title', 'GALLERY | 時計レンタル ROLLY')

@section('content')
    <div class="gallery">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/gallery/title.png') }}" alt="gallery"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; GALLERY</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <div class="navi-btn feed-prev-btn" id="feed-prev-btn"></div>
                <ul id="gallery">
                    <li><img src="{{ asset('img/gallery/gallery01.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery02.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery03.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery04.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery05.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery06.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery07.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery08.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery09.png') }}" alt=""/></li>
                    <li><img src="{{ asset('img/gallery/gallery10.png') }}" alt=""/></li>
                </ul>
                <div class="navi-btn feed-next-btn" id="feed-next-btn"></div>
                <div class="custom-thumb cf"></div>
                <div class="cf">
                    <div class="btn"><a href="{{ url('scene') }}">ご利用シーン</a></div>
                    <div class="btn"><a href="{{ url('lineup') }}">ラインナップ</a></div>
                </div>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
