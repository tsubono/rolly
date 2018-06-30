@extends('front.layouts.top')

@section('content')
    <section class="registform mt90">
        <h1 class="txt_c mb50"><img src="{{ asset('img/hd_service.png') }}" alt="To use the service"><em>サービスご利用登録</em></h1>

        <ul class="flow cf">
            <li class="fl">STEP.1<br><em>登録フォーム入力</em></li>
            <li class="fl">STEP.2<br><em>登録確認画面</em></li>
            <li class="selected fl">STEP.3<br><em>完了</em></li>
        </ul>

        <p class="txt_c">この度はご登録をいただきありがとうござます。</p>
        <p class="txt_c mb30">後ほど担当者より改めてご連絡させていただきます。<br>今しばらくお待ちください。</p>
        <ul class="sendarea_c"><li><a href="{{ url('/') }}"><input name="back" value="TOPへ戻る" class="btn_css_reset" type="button"></a></li></ul></p>
    </section>
@endsection
