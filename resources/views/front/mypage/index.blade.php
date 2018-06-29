@extends('front/layouts.default')

@section('title', 'MY PAGE | 時計レンタル ROLLY')

@section('content')
    <div class="mypage">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/scene/tit_scene.png') }}" alt="MY PAGE"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; MY PAGE</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <ul class="top__list">
                    <li><a href="{{ url('mypage/edit') }}">登録者情報のご確認・編集</a></li>
                    <li><a href="{{ url('mypage/status') }}">ご利用状況のご確認</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            ログアウトする
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
