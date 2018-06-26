@extends('front/layouts.default')

@section('title', 'CONCEPT | 時計レンタル ROLLY')

@section('content')
    <div class="guide concept">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/concept/tit_concept.png') }}" alt="CONCEPT"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; CONCEPT</div>

        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <div class="concept_img"> <img src="{{ asset('img/concept/img_concept.png') }}" alt="みんなの憧れ 高級時計。「一度は手にしてみたい...」そんな夢をROLLYはレンタルという形で、提供いたします"> </div>
                <h2>ROLLYとは</h2>
                <p class="txt"> ROLLYでは、腕時計を気軽に楽しんでいただきたいという想いで、サービスを提供しております。<br>
                    様々な時計をシーンに合わせてご利用いただく、<br>
                    市場に出回っていない珍しいモデルを実際に腕にまいていただく。<br>
                    実物を着用することで、少しでも腕時計の楽しさを感じていただければ幸いです。 </p>
                <h2>You&nbsp;Only&nbsp;Live&nbsp;Once</h2>
                <p class="txt"> 一度きりの人生、だから楽しむ。<br>
                    人生は一度きり、一度きりの人生だからこそ、存分に楽しむ。<br>
                    ROLLYの腕時計たちが、そんな想いの一部になります。 </p>
                <h2>時計を楽しむ</h2>
                <p class="txt"> 高級時計にはなかなか手が出せない、何本も所有できない、限定で手に入らない。<br>
                    または、気軽につけるにはもったいない。<br>
                    そんなハードルをレンタルサービスが解決します。<br>
                    高級腕時計でも気軽に、ラフに、普段使いとして楽しむ。<br>
                    オトナの遊び心をROLLYが実現いたします。 </p>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
