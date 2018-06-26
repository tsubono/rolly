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
              <p>決済登録が完了しました。</p>
              <p>確認作業に移りますので、恐れ入りますが今しばらくお待ちくださいませ。</p>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
