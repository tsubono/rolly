@extends('front/layouts.default')

@section('content')
    <div class="lineup">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/lineup/tit_lineup.png') }}" alt="Line Up"></h1>
            </div>
        </section>

        <div class="breadcrumb">
            <a href="/">TOP</a> &gt; <a href="{{ url('/lineup') }}">LINE UP</a>
            &gt; {{ $product->brand->name }} {{ $product->model_name }}
        </div>
        <div class="wrap cf">

            <!-- サイドバーPC -->
            @include('front.lineup.side')
            <!--/ サイドバーPC -->

            <div class="contents">
                <div class="cf">
                    <div class="left">
                        <ul class="itemimg cf">
                            @if (!empty($product->image1))
                                <li class="item1">
                                    <img src="{{ asset(env('PUBLIC', ''). $product->image1) }}" alt=""/>
                                </li>
                            @endif
                            @if (!empty($product->image2))
                                <li class="item2">
                                    <img src="{{ asset(env('PUBLIC', ''). $product->image2) }}" alt=""/>
                                </li>
                            @endif
                        </ul>
                        <ul class="thumbimg cf">
                            @if (!empty($product->image1))
                                <li class="thumb1">
                                    <img src="{{ asset(env('PUBLIC', ''). $product->image1) }}" alt=""/>
                                </li>
                            @endif
                            @if (!empty($product->image2))
                                <li class="thumb2">
                                    <img src="{{ asset(env('PUBLIC', ''). $product->image2) }}" alt=""/>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="right">
                        <h2>ROLEX<br>サブマリーナデイト</h2>

                        <section class="detailbox">
                            <h1>商品詳細</h1>
                            <dl>
                                <dt>ブランド名</dt>
                                <dd>{{ $product->brand->name }}</dd>
                            </dl>
                            <dl>
                                <dt>モデル名</dt>
                                <dd>{{ $product->model_name }}</dd>
                            </dl>
                            <dl>
                                <dt>シリアルナンバー</dt>
                                <dd>{{ $product->serial_no }}</dd>
                            </dl>
                            <dl>
                                <dt>カラー</dt>
                                <dd>{{ $product->color }}</dd>
                            </dl>
                            <dl>
                                <dt>型番号</dt>
                                <dd>{{ $product->model_number }}</dd>
                            </dl>
                        </section>

                        <section class="detailbox">
                            <h1>対応プラン・レンタル状況</h1>
                            <dl>
                                <dt>プラン</dt>
                                <dd>{{ $product->plan->name }}</dd>
                            </dl>
                            <dl>
                                <dt>レンタル状況</dt>
                                <dd>{{ config('const.product.status')[$product->status] }}</dd>
                            </dl>
                        </section>
                    </div>
                </div>
            </div>
            <!-- サイドバー sp -->
            @include('front.lineup.side_sp')
            <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
