@extends('front.layouts.default')

@section('title', 'お申込み | 時計レンタル ROLLY')

@section('content')
    <style>
        .red {
            color: red;
        }
    </style>
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
                <form action="{{ url('order/payment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <dl class="order__list">
                        <dt>お名前</dt>
                        <dd><span>{{ $user->last_name }}</span>&nbsp;<span>{{ $user->first_name }}</span></dd>
                        <dt>ふりがな</dt>
                        <dd><span>{{ $user->last_name_kana }}</span>&nbsp;<span>{{ $user->first_name_kana }}</span></dd>
                        <dt>携帯電話番号</dt>
                        <dd><span>{{ $user->mobile_tel }}</span></dd>
                        <dt>送付先住所</dt>
                        <dd class="order__address">
                            <dl>
                                <dt>郵便番号</dt>
                                <dd><span>{{ $user->zip_code }}</span></dd>
                                <dt>都道府県</dt>
                                <dd><span>{{ config('pref')[$user->pref_id] }}</span></dd>
                                <dt>市区町村・番地</dt>
                                <dd><span>{{ $user->address1 }}</span></dd>
                                <dt>ビル・マンション等</dt>
                                <dd><span>{{ $user->address2 }}</span></dd>
                            </dl>
                        </dd>
                        <dt>ご希望のレンタル時計</dt>
                        <dd><span>{{ $product->brand->name }} {{ $product->model_name }}</span></dd>
                        <dt>お申込みプラン</dt>
                        <dd><span>{{ $product->plan->name }}</span>プラン</dd>
                        <dt>ご利用金額（月額）</dt>
                        <dd><span>{{ number_format($product->plan->getMonthlyPrice($product->plan->id)) }}</span>円</dd>
                        <dt>ベルトの長さ</dt>
                        <dd>
                            <select name="order[belt_length]">
                                @for ($i=8; $i<=24; $i+=0.5)
                                    <option value="{{ $i }}">{{ number_format($i, 1) }}</option>
                                @endfor
                            </select>
                        </dd>
                        <dt>身分証明書</dt>
                        <dd>
                            @if (!empty($user->identification_doc))
                                登録済み
                            @else
                                <input type="hidden" name="user[identification_doc_edit]" value="1">
                                <input type="file" name="user[identification_doc]">
                            @endif
                        </dd>
                        <dt>その他の証明書類</dt>
                        <dd>
                            @if (!empty($user->doc_other))
                                登録済み
                            @else
                                <input type="hidden" name="user[doc_other_edit]" value="1">
                                <input type="file" name="user[doc_other]">
                            @endif
                            <br><br>
                            <p class="red">★時計のレンタルには本人確認が必要です★</p>
                            <p class="red">※顔写真付きの身分証明書をお持ちになり、お顔がわかる状態で撮影した写真をアップロードしてください。</p>
                            <p class="red">※顔写真付きの身分証明書をお持ちでないお客様は、健康保険証、住民票の写しの2点をアップロードしてください。</p>
                        </dd>
                    </dl>
                    <br>
                    <input type="hidden" name="order[user_id]" value="{{ $user->id }}">
                    <input type="hidden" name="order[product_id]" value="{{ $product->id }}">
                    <button class="order__btn" type="submit">送信する</button>
                </form>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
