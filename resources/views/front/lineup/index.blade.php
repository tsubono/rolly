@extends('front/layouts.default')

@section('title', 'LINE UP | 時計レンタル ROLLY')

@section('content')
    <div class="lineup">

        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/lineup/tit_lineup.png') }}" alt="Line Up"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; LINE UP</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
            @include('front.components.side')
            <!--/ サイドバーPC -->
            <div class="contents">
                <ul class="item_list cf">
                    @foreach($products as $product)
                        <li>
                            <div class="inner">
                                <p class="plan cf {{ $product->plan->class }}"><span>{{ $product->plan->name }}</span></p>
                                <div class="link">
                                    <a href="{{ url('/lineup/'. $product->id) }}">
                                        <img src="{{ asset(env('PUBLIC', ''). $product->image1) }}" alt="">
                                        <p class="name">{{ $product->brand->name }} {{ $product->model_name }}</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- サイドバー sp -->
            @include('front.components.side_sp')
            <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
