@extends('front/layouts.default')

@section('title', 'PLAN | 時計レンタル ROLLY')

@section('content')
    <div class="planint">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/plan/tit_plan.png') }}" alt="PLAN"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; PLAN</div>

        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <section>
                    <div class="acbox bro">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_br.png') }}" alt="BRONZE PLAN"></div>
                        </div>
                        <div class="hidden">
                            <div class="cf">
                                <dl>
                                    <dt>価格</dt>
                                    <dd class="price">￥3,500</dd>
                                    <dt>お取扱商品</dt>
                                    <dd class="brand">GAGA MIRANO</dd>
                                </dl>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=1">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox sil">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_si.png') }}" alt="SILVER PLAN"></div>
                        </div>
                        <div class="hidden">
                            <div class="cf">
                                <dl>
                                    <dt>価格</dt>
                                    <dd class="price">￥5,800</dd>
                                    <dt>お取扱商品</dt>
                                    <dd class="brand">OMEGA, CARTIER, IWC</dd>
                                </dl>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="#{{ url('lineup') }}?p=2">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox gol">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_go.png') }}" alt="GOLD PLAN"></div>
                        </div>
                        <div class="hidden">
                            <div class="cf">
                                <dl>
                                    <dt>価格</dt>
                                    <dd class="price">￥8,800</dd>
                                    <dt>お取扱商品</dt>
                                    <dd class="brand">FRANCK MULLER, TAGHEUER, PANERAI, IWC, OMEGA</dd>
                                </dl>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=3">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox pla">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_pl.png') }}" alt="PLATINUM PLAN"></div>
                        </div>
                        <div class="hidden">
                            <div class="cf">
                                <dl>
                                    <dt>価格</dt>
                                    <dd class="price">￥18,800</dd>
                                    <dt>お取扱商品</dt>
                                    <dd class="brand">ROLEX, PANERAI</dd>
                                </dl>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=4">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox lim">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_li.png') }}" alt="LIMITED PLAN"></div>
                        </div>
                        <div class="hidden">
                            <div class="cf">
                                <dl>
                                    <dt>価格</dt>
                                    <dd class="price">￥23,800</dd>
                                    <dt>お取扱商品</dt>
                                    <dd class="brand">HUBLOT, ROLEX, FRANCK MULLER</dd>
                                </dl>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=5">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
