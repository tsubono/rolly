@extends('front.layouts.default')

@section('title', 'お申込み | 時計レンタル ROLLY')

@section('content')
    <div class="order">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title">お申込み</h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; お申込み</div>

        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <p class="payment__text">テキストが入ります。テキストが入ります。テキストが入ります。</p>
                <form action="https://credit.j-payment.co.jp/gateway/payform.aspx" method="POST">
                    <input type="hidden" name="aid" value="113720">
                    <input type="hidden" name="pt" value="1">

                    <!-- 商品金額 -->
                    <input type="hidden" name="am" value="{{ $price }}">
                    <!-- /商品金額 -->

                    <!-- 税金額 -->
                    <input type="hidden" name="tx" value="{{ $price * 0.08 }}">
                    <!-- /税金額 -->

                    <!-- 送料 -->
                    <input type="hidden" name="sf" value="0">
                    <!-- /送料 -->

                    <!-- ジョブタイプ -->
                    <!-- AUTH:仮売上 CAPTURE:仮実同時売上 -->
                    <input type="hidden" name="jb" value="AUTH">
                {{--<input type="hidden" name="jb" value="CAPTURE">--}}
                    <!-- /ジョブタイプ -->

                    <!-- 商品コード -->
                    <input type="hidden" name="iid" value="">
                    <!-- /商品コード -->

                    {{--<!-- 自動課金周期 -->--}}
                    {{--<input type="hidden" name="actp" value="4">--}}
                    {{--<!-- /自動課金周期 -->--}}

                    {{--<!-- 自動課金金額 -->--}}
                    {{--<input type="hidden" name="acam" value="{{ $price }}">--}}
                    {{--<!-- /自動課金金額 -->--}}

                    {{--<!-- 自動課金税額 -->--}}
                    {{--<input type="hidden" name="actx" value="{{ $price * 0.08 }}">--}}
                    {{--<!-- /自動課金税額 -->--}}

                    <button class="payment__btn" type="submit" name="submit">決済はこちらから<br>↓↓↓↓↓</button>
                </form>
                <p class="payment__attention">クレジットカード決済には、株式会社ROBOT PAYMENTの決済代行サービスを使用しています。決済情報はSSLで暗号化され、安全性を確保しております。</p>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
