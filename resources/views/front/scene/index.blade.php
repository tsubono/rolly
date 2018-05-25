@extends('front/layouts.default')

@section('title', 'SCENE | 時計レンタル ROLLY')

@section('content')
    <div class="scene">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/scene/tit_scene.png') }}" alt="scene"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; SCENE</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <ul class="list cf">
                    <li>
                        <div><img src="{{ asset('img/scene/scene01.png') }}" alt=""></div>
                        <p class="name">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
                    </li>
                    <li>
                        <div><img src="{{ asset('img/scene/scene02.png') }}" alt=""></div>
                        <p class="name">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
                    </li>
                    <li>
                        <div><img src="{{ asset('img/scene/scene03.png') }}" alt=""></div>
                        <p class="name">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
                    </li>
                    <li>
                        <div><img src="{{ asset('img/scene/scene04.png') }}" alt=""></div>
                        <p class="name">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
                    </li>
                    <li>
                        <div><img src="{{ asset('img/scene/scene05.png') }}" alt=""></div>
                        <p class="name">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
                    </li>
                    <li>
                        <div><img src="{{ asset('img/scene/scene06.png') }}" alt=""></div>
                        <p class="name">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
                    </li>
                </ul>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
