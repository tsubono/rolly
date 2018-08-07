@extends('front.layouts.default')

@section('title', 'お申込み | 時計レンタル ROLLY')

@section('content')
    <style>
        .red {
            color: red;
        }
        .w45 {
            width: 45% !important;
        }
        .w25 {
            width: 25% !important;
        }
        .line35 {
            line-height: 35px;
        }
        @media screen and (min-width:0px) and (max-width:767px) {
            dt {
                width: 40% !important;
            }
            dd {
                width: 60% !important;
            }
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
                        <dt><b>申し込み者情報</b></dt>
                        <dd></dd>
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
                            <p class="red">※ベルトの最大の長さは商品詳細ページでご確認ください。</p>
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
                        </dd>
                        <dt>その他の証明書類2</dt>
                        <dd>
                            @if (!empty($user->doc_other_2))
                                登録済み
                            @else
                                <input type="hidden" name="user[doc_other_2_edit]" value="1">
                                <input type="file" name="user[doc_other_2]">
                            @endif
                        </dd>
                        <dt>その他の証明書類3</dt>
                        <dd>
                            @if (!empty($user->doc_other_3))
                                登録済み
                            @else
                                <input type="hidden" name="user[doc_other_3_edit]" value="1">
                                <input type="file" name="user[doc_other_3]">
                            @endif
                                <br>
                                <p class="red">★時計のレンタルには本人確認が必要です★</p>
                                <p class="red">※運転免許証、パスポート、健康保険証のいずれかを添付してください。</p>
                                <p class="red">※パスポート、健康保険証の場合は、合わせて、住民票もしくはクレジットカード・携帯料金・公共料金の請求書の添付もお願い致します。</p>
                        </dd>
                        <dt>
                            <hr>
                            <b>クレジットカード名義者情報</b>
                        </dt>
                        <dd>
                            <hr>
                            <p class="red">※ご家族などのクレジットカードをご利用になる場合は、クレジットカードの名義人様の各種情報の入力をお願い致します。</p>
                            <p class="red">※名義人ご本人様にご確認のご連絡を差し上げる場合がございますのでご了承ください。</p>
                        </dd>
                        <dt>名前</dt>
                        <dd>
                            <input type="text" name="order_credit[name]" class="w45">
                        </dd>
                        <dt>住所</dt>
                        <dd class="line35">
                            郵便番号: <input type="text" name="order_credit[zip01]" class="w25" id="zip0"> -
                                        <input type="text" name="order_credit[zip02]" class="w25" id="zip1"><br>
                            都道府県:
                            <select name="order_credit[pref_id]" id="address1">
                                <option value=""></option>
                                @foreach (config('pref') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select><br>
                            市区町村番地: <input type="text" name="order_credit[address1]" class="w45" id="address2"><br>
                            その他（建物など）: <input type="text" name="order_credit[address2]" class="w45"><br>
                        </dd>
                        <dt>電話番号<br>（申込者と同じは不可）</dt>
                        <dd>
                            <input type="text" name="order_credit[tel01]" class="w25"> -
                            <input type="text" name="order_credit[tel02]" class="w25"> -
                            <input type="text" name="order_credit[tel03]" class="w25">
                        </dd>
                        <dt>申込者のと関係</dt>
                        <dd>
                            <input type="text" name="order_credit[relationship]" class="w45">
                        </dd>
                        <dt>名義者本人確認書類1</dt>
                        <dd>
                            <input type="file" name="order_credit[doc_1]">
                        </dd>
                        <dt>名義者本人確認書類2</dt>
                        <dd>
                            <input type="file" name="order_credit[doc_2]">
                        </dd>
                    </dl>
                    <br>
                    <input type="hidden" name="user[id]" value="{{ $user->id }}">
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
