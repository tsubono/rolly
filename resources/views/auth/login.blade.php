@extends('front.layouts.default')

@section('title', 'LOGIN | 時計レンタル ROLLY')

@section('content')
    <div class="login">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/scene/tit_scene.png') }}" alt="LOGIN"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; LOGIN</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <section>
                    <h2 class="login__title">Login</h2><br>
                    <form action="" method="post" id="login_form">
                        @csrf
                        <dl class="login__list">
                            <dt>ID（メールアドレス）</dt>
                            <dd><input type="email" name="email" style="width: 50%;" required></dd>
                            <dt>パスワード</dt>
                            <dd><input type="password" name="password" style="width: 50%;" required></dd>
                        </dl>
                    </form><br>
                    <button class="login__btn">ログイン</button>
                </section>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection

