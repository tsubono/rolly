@extends('front/layouts.default')

@section('title', '特定商取引法・古物営業法に基づく表記 | 時計レンタル ROLLY')

@section('content')
    <div class="guide notation">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/guide/tit_notation.png') }}" alt="特定商取引法・古物営業法に基づく表記"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; 特定商取引法・古物営業法に基づく表記</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <div class="ec">
                    <table>
                        <tbody>
                        <tr>
                            <th>会社名</th>
                            <td>大進ホンダ株式会社</td>
                        </tr>
                        <tr>
                            <th>代表者</th>
                            <td>代表取締役 本田宗一郎</td>
                        </tr>
                        <tr>
                            <th>本社</th>
                            <td>大阪市中央区南久宝寺町2丁目2番5号YOLO-BLD 3階</td>
                        </tr>
                        <tr>
                            <th>営業許可免許</th>
                            <td>大阪府公安委員会 古物商許可番号 第621060141013号</td>
                        </tr>
                        <tr>
                            <th>事業所</th>
                            <td>
                                大阪市中央区南久宝寺町2丁目2番5号YOLO-BLD 3階<br>
                                電話番号：06-6265-8878<br>
                                FAX番号：06-6265-8879<br>
                                受付時間：10：00～20：00 <br>
                                お問い合わせメールアドレス：<a
                                        href="mailto:rolly-rental@daishin.jp.net">rolly-rental@daishin.jp.net</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <h2>商品代金以外の必要料金</h2>
                    <p class="txt">
                        ・消費税<br>
                        ・送料<br>
                        ・振込手数料
                    </p>

                    <h2>申し込み有効期限</h2>
                    <p class="txt">
                        原則、受注確認（受注確認の為の自動送信メール発信）後、７日以内とします。<br>
                        受注確認後から7日を超えて決済（入金）もしくは本人確認ができない場合は、一旦キャンセルとさせて頂きます。
                    </p>

                    <h2>不良品</h2>
                    <p class="txt">
                        商品不良による場合は、新しい商品と交換させて頂きます。商品不良における返品の場合は商品到着後７日以内に、当店まで必ずご連絡の上、ご返送下さい。<br>
                        配送途中の破損や汚損の場合は、運送会社により保証をお受けください。
                    </p>
                    <h2>お支払い方法</h2>
                    <p class="txt">
                        ・クレジットカード<br>
                    </p>

                    <h2>返品送料</h2>
                    <p class="txt">
                        初期不良、発送商品間違いの場合は、弊社が送料を負担いたします。当店まで必ずご連絡の上、着払いにて送付ください。<br>
                        お客様のご都合による返品の場合は、お客様に送料のご負担をお願いしております。
                    </p>
                </div>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
