@extends('front/layouts.default')

@section('title', '会社概要 | 時計レンタル ROLLY')

@section('content')
    <div class="guide company">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/guide/tit_outline.png') }}" alt="会社概要"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; プライバシーポリシー</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <div class="make store">

                    <div class="txt">

                        <table>
                            <tbody>
                            <tr>
                                <th>会社名</th>
                                <td>大進ホンダ株式会社</td>
                            </tr>
                            <tr>
                                <th>設立</th>
                                <td>平成3年2月</td>
                            </tr>
                            <tr>
                                <th>資本金</th>
                                <td>1,000万円</td>
                            </tr>
                            <tr>
                                <th>従業員数</th>
                                <td>117名</td>
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
                                <th>事業所</th>
                                <td>
                                    大阪市中央区南久宝寺町2丁目2番5号YOLO-BLD 3階<br>
                                    電話番号：06-6265-8878<br>
                                    FAX番号：06-6265-8879<br>
                                    お問い合わせメールアドレス：<a href="mailto:rolly-rental@daishin.jp.net">rolly-rental@daishin.jp.net</a><br>
                                    お電話には対応しかねる場合がございます。お返事まで数日かかる場合がございます。
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection
