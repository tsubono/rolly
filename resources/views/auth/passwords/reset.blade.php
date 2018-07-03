@extends('front.layouts.default')

@section('content')
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
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <dl class="login__list">
                        <dt>メールアドレス</dt>
                        <dd>
                            <input id="email" type="email"
                                   class="input_default form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ $email or old('email') }}" required readonly>
                        </dd>
                        <dt>パスワード</dt>
                        <dd>
                            <input id="password" type="password"
                                   class="input_default form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required autofocus>
                            @if ($errors->has('password'))
                                <br>
                                <span class="invalid-feedback">
                                       <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </dd>
                        <dt>パスワード（確認用）</dt>
                        <dd>
                            <input id="password-confirm" type="password"
                                   class="input_default form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                   name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <br>
                                <span class="invalid-feedback">
                                       <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </dd>
                    </dl>
                    <br>
                    <input type="submit" value="リセットする" class="btn">
                </form>
            </section>
        </div>
    </div>
    <!-- サイドバー sp -->
@include('front.components.side_sp')
<!--/ サイドバー sp -->
</div>
@endsection
