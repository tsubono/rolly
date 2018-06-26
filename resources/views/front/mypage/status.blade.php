@extends('front/layouts.default')

@section('title', 'MY PAGE | 時計レンタル ROLLY')

@section('content')
    <div class="mypage">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/scene/tit_scene.png') }}" alt="MY PAGE"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; <a href="{{ url('mypage') }}">MY PAGE</a> &gt; ご利用状況</div>

        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <dl class="confirm2__list">
                    <dt>お申込みプラン</dt>
                    <dd>
                        @if (!empty($currentOrder->product))
                            {{ $currentOrder->product->plan->name }}
                        @endif
                    </dd>
                    <dt>レンタル商品</dt>
                    <dd>
                        @if (!empty($currentOrder->product))
                            {{ $currentOrder->product->brand->name }} {{ $currentOrder->product->model_name }}
                        @endif
                    </dd>
                    <dt>レンタル開始日</dt>
                    <dd>
                        @if (!empty($currentOrder->settlement_date))
                            {{ $currentOrder->settlement_date->format('Y年m月d日') }}
                        @endif
                    </dd>
                    <dt>返却予定日</dt>
                    <dd>
                        @if (!empty($currentOrder->return_date))
                            {{ $currentOrder->return_date->format('Y年m月d日') }}
                        @endif
                    </dd>
                </dl>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
