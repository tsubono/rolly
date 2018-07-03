@extends('front.layouts.default')

@section('content')
    <style>
        .alert-success {
            text-align: center;
            font-size: large;
            color: red;
        }
    </style>
    <div class="container">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/scene/tit_scene.png') }}" alt="PASSWORD RESET"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; PASSWORD RESET</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <section>
                    <h2 class="login__title">Password Reset</h2><br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <dl class="login__list">
                            <dt>メールアドレス</dt>
                            <dd>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <br>
                                    <br>
                                    <span class="invalid-feedback">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </dd>
                        </dl>
                        <br>
                        <input type="submit" value="パスワードをリセットする" class="btn">
                    </form>
                </section>
            </div>
        </div>
        <!-- サイドバー sp -->
    @include('front.components.side_sp')
    <!--/ サイドバー sp -->
    </div>
@endsection
