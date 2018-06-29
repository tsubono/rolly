@extends('front.layouts.top')

@section('content')
    <section class="registform mt90">
        <h1 class="txt_c mb50"><img src="{{ asset('img/hd_service.png') }}" alt="To use the service"><em>サービスご利用登録</em></h1>

        <ul class="flow cf">
            <li class="fl">STEP.1<br><em>登録フォーム入力</em></li>
            <li class="selected fl">STEP.2<br><em>登録確認画面</em></li>
            <li class="fl">STEP.3<br><em>完了</em></li>
        </ul>

        <form class="cf" method="post" action="{{ url('register/complete') }}" id="confirmForm">
            {{ csrf_field() }}
            <div id="formwrap">
                <!-- ▼お名前▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">お名前</dt>
                    <dd class="item_content"><dl>姓:&nbsp;{{ $user['last_name'] }}</dl>　<dl>名:&nbsp;{{ $user['first_name'] }}</dl></dd>
                    <input type="hidden" name="user[last_name]" value="{{ $user['last_name'] }}">
                    <input type="hidden" name="user[first_name]" value="{{ $user['first_name'] }}">
                </dl>
                <!-- ▲お名前▲ -->

                <!-- ▼ふりがな▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">ふりがな</dt>
                    <dd class="item_content"><dl>せい:&nbsp;{{ $user['last_name_kana'] }}</dl>　<dl>めい:&nbsp;{{ $user['first_name_kana'] }}</dl></dd>
                    <input type="hidden" name="user[last_name_kana]" value="{{ $user['last_name_kana'] }}">
                    <input type="hidden" name="user[first_name_kana]" value="{{ $user['first_name_kana'] }}">
                </dl>
                <!-- ▲ふりがな▲ -->

                <!-- ▼お電話番号▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">お電話番号</dt>
                    <dd class="item_content">{{ $user['mobile_tel01'] }} - {{ $user['mobile_tel02'] }} - {{$user['mobile_tel03'] }}</dd>
                    <input type="hidden" name="user[mobile_tel01]" value="{{ $user['mobile_tel01'] }}">
                    <input type="hidden" name="user[mobile_tel02]" value="{{ $user['mobile_tel02'] }}">
                    <input type="hidden" name="user[mobile_tel03]" value="{{ $user['mobile_tel03'] }}">
                </dl>
                <!-- ▲お電話番号▲ -->

                <!-- ▼FAX番号▼ -->
                <dl class="formitem">
                    <dt class="item_name">FAX番号</dt>
                    <dd class="item_content">
                        @if (!empty($user['tel01']) && !empty($user['tel02']) && !empty($user['tel03']))
                            {{ $user['tel01'] }} - {{ $user['tel02'] }} - {{$user['tel03'] }}
                        @endif
                    </dd>
                    <input type="hidden" name="user[tel01]" value="{{ $user['tel01'] }}">
                    <input type="hidden" name="user[tel02]" value="{{ $user['tel02'] }}">
                    <input type="hidden" name="user[tel03]" value="{{ $user['tel03'] }}">
                </dl>
                <!-- ▲FAX番号▲ -->

                <!-- ▼住所▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">ご住所</dt>
                    <dd class="item_content">
                        <dl class="innerlist_address add01">
                            <dt>郵便番号</dt>
                            <dd>{{ $user['zip01'] }} - {{ $user['zip02'] }}</dd>
                            <input type="hidden" name="user[zip01]" value="{{ $user['zip01'] }}">
                            <input type="hidden" name="user[zip02]" value="{{ $user['zip02'] }}">
                        </dl>
                        <dl class="innerlist_address add02">
                            <dt>都道府県</dt>
                            <dd>{{ config('pref')[1] }}</dd>
                            <input type="hidden" name="user[pref_id]" value="{{ $user['pref_id'] }}">
                        </dl>
                        <dl class="innerlist_address add03">
                            <dt>市区町村・番地</dt>
                            <dd>{{ $user['address1'] }}</dd>
                            <input type="hidden" name="user[address1]" value="{{ $user['address1'] }}">
                        </dl>
                        <dl class="innerlist_address add04">
                            <dt>ビル・マンション等</dt>
                            <dd>{{ $user['address2'] }}</dd>
                            <input type="hidden" name="user[address2]" value="{{ $user['address2'] }}">
                        </dl>
                    </dd>
                </dl>
                <!-- ▲住所▲ -->

                <!-- ▼メールアドレス[予約項目]▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">メールアドレス</dt>
                    <dd class="item_content">{{ $user['email'] }}</dd>
                    <input type="hidden" name="user[email]" value="{{ $user['email'] }}">
                    <input type="hidden" name="user[email_confirmation]" value="{{ $user['email_confirmation'] }}">
                </dl>
                <!-- ▲メールアドレス[予約項目]▲ -->

                <!-- ▼パスワード▼ -->
                <input type="hidden" name="user[password]" value="{{ $user['password'] }}">
                <!-- ▲パスワード▲ -->

                <!-- ▼ご希望のレンタル時計▼ -->
                <dl class="formitem privacy">
                    <dt class="item_name">ご希望のレンタル時計</dt>
                    <dd class="item_content">
                        @if (!empty($user['brand_id']))
                            {{ \App\Models\Brand::findOrFail($user['brand_id'])->name }}
                        @endif
                    </dd>
                    <input type="hidden" name="user[brand_id]" value="{{ $user['brand_id'] }}">
                </dl>
                <!-- ▲ご希望のレンタル時計▲ -->
            </div><!-- /#formwrap-->

            <!-- ▼▼送信ボタン -->
            <ul class="sendarea">
                <li><input type="button" id="back" value="入力画面へ戻る" class="btn_css_reset"></li>
                <li><input type="submit" name="submit" id="submit" class="btn_css_check true" value="送信"></li>
            </ul>
            <input type="hidden" name="back" value="">
        <!-- ▲▲送信ボタン -->
        </form>

    </section>
@endsection
