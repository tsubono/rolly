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
                            <div class="price">
                                <p>￥3,500-/月</p>
                            </div>
                        </div>
                        <div class="hidden">
                            <p>対象ブランド：GAGA MIRANO</p>
                            <div class="cf">
                                <div class="left"><img src="{{ asset('img/plan/br.png') }}" alt=""></div>
                                <div class="right">
                                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                </div>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=1">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox sil">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_si.png') }}" alt="SILVER PLAN"></div>
                            <div class="price">
                                <p>￥5,800-/月</p>
                            </div>
                        </div>
                        <div class="hidden">
                            <p>対象ブランド：OMEGA, CARTIER, IWC</p>
                            <div class="cf">
                                <div class="left"><img src="{{ asset('img/plan/si.png') }}" alt=""></div>
                                <div class="right">
                                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                </div>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="#{{ url('lineup') }}?p=2">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox gol">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_go.png') }}" alt="GOLD PLAN"></div>
                            <div class="price">
                                <p>￥8,800-/月</p>
                            </div>
                        </div>
                        <div class="hidden">
                            <p>対象ブランド：FRANCK MULLER, TAGHEUER, PANERAI, IWC, OMEGA</p>
                            <div class="cf">
                                <div class="left"><img src="{{ asset('img/plan/go.png') }}" alt=""></div>
                                <div class="right">
                                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                </div>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=3">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox pla">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_pl.png') }}" alt="PLATINUM PLAN"></div>
                            <div class="price">
                                <p>￥18,800-/月</p>
                            </div>
                        </div>
                        <div class="hidden">
                            <p>対象ブランド：ROLEX</p>
                            <div class="cf">
                                <div class="left"><img src="{{ asset('img/plan/pl.png') }}" alt=""></div>
                                <div class="right">
                                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                </div>
                            </div>
                            <div class="cf">
                                <div class="btn"><a href="{{ url('lineup') }}?p=4">対象の腕時計を見る</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="acbox lim">
                        <div class="name cf">
                            <div class="plan"><img src="{{ asset('img/plan/plan_li.png') }}" alt="LIMITED PLAN"></div>
                            <div class="price">
                                <p>￥23,800-/月</p>
                            </div>
                        </div>
                        <div class="hidden">
                            <p>対象ブランド：HUBLOT, ROLEX, FRANCK MULLER</p>
                            <div class="cf">
                                <div class="left"><img src="{{ asset('img/plan/li.png') }}" alt=""></div>
                                <div class="right">
                                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                </div>
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

@push('script')
    <script>
        $(function(){
            $(".acbox .name").on("click", function() {
                $(this).next().slideToggle();
                $(this).toggleClass("active");
            });
        });
    </script>
@endpush
