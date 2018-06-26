@extends('front/layouts.default')

@section('content')
    <div class="">
        <section class="mainimg">
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; ERROR</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <h2 class="h-english">PAGE NOT FOUND</h2>
                <div class="copy">
                    <p>ページが見つかりません。</p>
                </div>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
