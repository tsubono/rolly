@extends('front.layouts.top')

@section('content')
    <style>
        .text-danger {
            color: red;
        }
    </style>

    <section class="concept_top">
        <h1 class="mb50"><img src="{{ asset('img/logo.png') }}" alt="時計レンタル ROLLY"></h1>
        <p class="txt_c"> みんなの憧れである、ROLEX。<br> 一度は手にしたい高級時計を
            <br> レンタルという形でご提供致します。 </p>
    </section>

    <section class="plan cf mt90">
        <h1 class="txt_c mb50">
            <img src="{{ asset('img/hd_plan.png') }}" alt="PLAN" width="86px"><em>ご利用プラン</em>
        </h1>
        <ul class="recommend cf">
            <li>
                <img src="{{ asset('img/plan_bro.png') }}" alt="ブロンズプラン" class="sp_none">
                <img src="{{ asset('img/plan_bro_sp.png') }}" alt="ブロンズプラン" class="pc_none">
                <dl>
                    <dt>価格</dt>
                    <dd class="price">￥3,500</dd>
                    <dt>お取扱商品</dt>
                    <dd class="name">GAGA MIRANO</dd>
                    <div class="btn_morebox">
                        <div class="btn_moretext">
                            <a href="{{ url('lineup') }}?p=1">＞&nbsp;詳細はこちら</a>
                        </div>
                    </div>
                </dl>
            </li>
            <li>
                <img src="{{ asset('img/plan_sil.png') }}" alt="シルバープラン" class="sp_none">
                <img src="{{ asset('img/plan_sil_sp.png') }}" alt="シルバープラン" class="pc_none">
                <dl>
                    <dt>価格</dt>
                    <dd class="price">￥5,800</dd>
                    <dt>お取扱商品</dt>
                    <dd class="name">OMEGA, CARTIER, IWC</dd>
                    <div class="btn_morebox">
                        <div class="btn_moretext">
                            <a href="{{ url('lineup') }}?p=2">＞&nbsp;詳細はこちら</a>
                        </div>
                    </div>
                </dl>
            </li>
        </ul>
        <ul class="cf">
            <li>
                <img src="{{ asset('img/plan_gol.png') }}" alt="ゴールドプラン">
                <dl>
                    <dt>価格</dt>
                    <dd class="price">￥8,800</dd>
                    <dt>お取扱商品</dt>
                    <dd class="name">FRANCK MULLER, TAGHEUER, PANERAI, IWC, OMEGA</dd>
                    <div class="btn_morebox">
                        <div class="btn_moretext">
                            <a href="{{ url('lineup') }}?p=3">＞&nbsp;詳細はこちら</a>
                        </div>
                    </div>
                </dl>
            </li>
            <li>
                <img src="{{ asset('img/plan_pla.png') }}" alt="プラチナプラン">
                <dl>
                    <dt>価格</dt>
                    <dd class="price">￥18,800</dd>
                    <dt>お取扱商品</dt>
                    <dd class="name">ROLEX</dd>
                    <div class="btn_morebox">
                        <div class="btn_moretext">
                            <a href="{{ url('lineup') }}?p=4">＞&nbsp;詳細はこちら</a>
                        </div>
                    </div>
                </dl>
            </li>
            <li>
                <img src="{{ asset('img/plan_lim.png') }}" alt="リミテッドプラン">
                <dl>
                    <dt>価格</dt>
                    <dd class="price">￥23,800</dd>
                    <dt>お取扱商品</dt>
                    <dd class="name">HUBLOT, ROLEX, FRANCK MULLER</dd>
                    <div class="btn_morebox">
                        <div class="btn_moretext">
                            <a href="{{ url('lineup') }}?p=5">＞&nbsp;詳細はこちら</a> </div>
                    </div>
                </dl>
            </li>
        </ul>
    </section>

    <section class="registform mt90" id="registerArea">
        <h1 class="txt_c mb50"><img src="{{ asset('img/hd_service.png') }}" alt="To use the service" width="233"><em>サービスご利用登録</em></h1>
        <div class="serviceimg">
            <div>
                <img src="{{ asset('img/onbnr700.png') }}" alt="サービス開始予定 新規仮会員登録募集中">
            </div>
        </div>
        <ul class="flow cf">
            <li class="selected fl">STEP.1<br><em>登録フォーム入力</em></li>
            <li class="fl">STEP.2<br><em>登録確認画面</em></li>
            <li class="fl">STEP.3<br><em>完了</em></li>
        </ul>


        <form class="cf" method="post" action="{{ url('register/confirm') }}">
            {{ csrf_field() }}

            <div id="formwrap">
                <!-- ▼お名前▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">お名前</dt>
                    <dd class="item_content">
                        <ul class="innerlist_name">
                            <li><input type="text" name="user[last_name]" value="{{ old('user.last_name') }}" required /></li>
                            <li><input type="text" name="user[first_name]" value="{{ old('user.first_name') }}" required /></li>
                        </ul>
                    </dd>
                </dl>
                <!-- ▲お名前▲ -->

                <!-- ▼ふりがな▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">ふりがな</dt>
                    <dd class="item_content">
                        <ul class="innerlist_kana">
                            <li><input type="text" name="user[last_name_kana]" value="{{ old('user.last_name_kana') }}" required /></li>
                            <li><input type="text" name="user[first_name_kana]" value="{{ old('user.first_name_kana') }}" required /></li>
                        </ul>
                        @if ($errors->has('last_name_kana')||$errors->has('first_name_kana'))
                            @if ($errors->has('last_name_kana'))
                                @foreach ($errors->get('last_name_kana') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @else
                                @foreach ($errors->get('first_name_kana') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        @endif
                    </dd>
                </dl>
                <!-- ▲ふりがな▲ -->

                <!-- ▼携帯電話番号▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">携帯電話番号</dt>
                    <dd class="item_content">
                        <ul class="innerlist_tel">
                            <li><input type="number" name="user[mobile_tel01]" value="{{ old('user.mobile_tel01') }}" /></li>
                            <li><input type="number" name="user[mobile_tel02]" value="{{ old('user.mobile_tel02') }}" /></li>
                            <li><input type="number" name="user[mobile_tel03]" value="{{ old('user.mobile_tel03') }}" /></li>
                        </ul>
                    </dd>
                </dl>
                <!-- ▲携帯電話番号▲ -->

                <!-- ▼お電話番号▼ -->
                <dl class="formitem">
                    <dt class="item_name">お電話番号</dt>
                    <dd class="item_content">
                        <ul class="innerlist_tel">
                            <li><input type="number" name="user[tel01]" value="{{ old('user.tel01') }}" /></li>
                            <li><input type="number" name="user[tel02]" value="{{ old('user.tel02') }}" /></li>
                            <li><input type="number" name="user[tel03]" value="{{ old('user.tel03') }}" /></li>
                        </ul>
                    </dd>
                </dl>
                <!-- ▲お電話番号▲ -->

                <!-- ▼住所▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">ご住所</dt>
                    <dd class="item_content">
                        <dl class="innerlist_address add01">
                            <dt>郵便番号</dt>
                            <dd>
                                <input type="number" name="user[zip01]" value="{{ old('user.zip01') }}" id="zip0" required />&nbsp;-&nbsp;<input type="number" name="user[zip02]" value="{{ old('user.zip02') }}" id="zip1" required />
                                @if ($errors->has('zip01')||$errors->has('zip02')||$errors->has('zip03'))
                                    @if ($errors->has('zip01'))
                                        @foreach ($errors->get('zip01') as $error)
                                            <div class="text-danger">{{ $error }}</div>
                                        @endforeach
                                    @elseif ($errors->has('zip02'))
                                        @foreach ($errors->get('zip02') as $error)
                                            <div class="text-danger">{{ $error }}</div>
                                        @endforeach
                                    @else
                                        @foreach ($errors->get('zip03') as $error)
                                            <div class="text-danger">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                @endif
                            </dd>
                        </dl>
                        <dl class="innerlist_address add02">
                            <dt>都道府県</dt>
                            <dd>
                                <select name="user[pref_id]" id="address1" required>
                                    <option value="" selected="selected">選択して下さい</option>
                                    @foreach(config('pref') as $key => $name)
                                        <option value="{{ $key }}" {{ old('user.pref_id') == $key ? "selected" : "" }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </dd>
                        </dl>
                        <dl class="innerlist_address add03" required>
                            <dt>市区町村・番地</dt>
                            <dd><input type="text" name="user[address1]" value="{{ old('user.address1') }}" id="address2" /></dd>
                        </dl>
                        <dl class="innerlist_address add04">
                            <dt>ビル・マンション等</dt>
                            <dd><input type="text" name="user[address2]" value="{{ old('user.address2') }}" /></dd>
                        </dl>
                    </dd>
                </dl>
                <!-- ▲住所▲ -->

                <!-- ▼メールアドレス[予約項目]▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">メールアドレス</dt>
                    <dd class="item_content">
                        <p class="innerlist_mail">
                            <input type="email" name="user[email]" value="{{ old('user.email') }}" required />
                        </p>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                    </dd>
                </dl>
                <!-- ▲メールアドレス[予約項目]▲ -->
                <!-- ▼メールアドレス確認[メール連携の予約項目]▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">メールアドレス（確認用）</dt>
                    <dd class="item_content">
                        <p class="innerlist_mailc">
                            <input type="email" name="user[email_confirmation]" value="{{ old('user.email_confirmation') }}" required />
                        </p>
                    </dd>
                </dl>
                <!-- ▲メールアドレス確認[メール連携の予約項目]▲ -->

                <!-- ▼パスワード▼ -->
                <dl class="formitem hissu">
                    <dt class="item_name">パスワード</dt>
                    <dd class="item_content">
                        <p class="innerlist_mailc">
                            <input type="password" name="user[password]" required placeholder="※6文字以上で入力してください。" value="{{ old('user.password') }}"/>
                        </p>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                    </dd>
                </dl>
                <!-- ▲パスワード]▲ -->

                <!-- ▼ご希望のレンタル時計▼ -->
                <dl class="formitem top">
                    <dt class="item_name">ご希望のレンタル時計</dt>
                    <dd class="item_content">
                        <select name="user[brand_id]" class="form-control">
                            <option value="">選択して下さい</option>
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{ $brand->id }}" {{ old('user.brand_id')==$brand->id?"selected":"" }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </dd>
                </dl>
                <!-- ▲ご希望のレンタル時計▲ -->

                <!-- ▼個人情報保護方針▼ -->
                <dl class="formitem privacy hissu">
                    <dt class="item_name">個人情報保護方針</dt>
                    <dd class="item_content">
                        <div class="innerlist_privacymsg">
                            <div>
                                <h4>はじめに</h4>
                                <p>
                                    大進ホンダ株式会社（以下、「当社」といいます）は、個人情報保護の重要性に鑑み、当社各種サービスのお客様への提供に際して、全てのお客様の個人情報を、当社事業の内容及び規模を考慮し、適正に利用、提供及び管理するとともに 正確性・安全性の保持に努めます。当社はこの個人情報保護方針を全役職員に周知徹底するとともに確実に履行し、 個人情報保護に係る社会的ニーズの変化等に応じて当社の個人情報保護の 管理の仕組を適宜見直し、継続的に改善して参ります。
                                </p>

                                <h4>個人情報の管理、取得、利用及び提供に関して</h4>
                                <h5>1)個人情報の管理</h5>
                                <p>当社は、個人情報を適切に保護、管理する体制を確立し、個人情報の適正な取得、利用および提供に関する社内規程を定め、これを遵守します。</p>
                                <h5>2)個人情報の取得および利用</h5>
                                <p>当社は、個人情報を取得および利用する場合には、各種サービス毎に利用目的を明確にしてお客様に明示し、特定された利用目的の達成に必要な範囲内で、適正に個人情報を取扱います。 3)個人情報の提供
                                    当社は、個人情報について、利用規約等であらかじめご本人から同意をいただいた提供先以外の第三者に提供はいたしません。</p>
                                <h4>法令等の遵守</h4>
                                <p>個人情報の取扱いに関する法令、国が定める指針、その他規範を遵守します。
                                    個人情報の管理、安全対策について
                                    個人情報への不正アクセス、個人情報の紛失、き損、改ざんおよび漏えい等のリスクに対して適切な予防措置を講ずることにより、個人情報の安全性、正確性の確保を図ります。 また、万が一、問題が発生した場合には、被害の最小限化に努めるとともに、速やかに是正措置を実施します。
                                    個人情報の苦情・相談への対応
                                    個人情報の取扱いに関するご本人からの苦情及び相談について対応窓口を設置し、適切に対応します。</p>

                                <p>苦情に関するお問い合わせはコチラからお願い致します。</p>
                                <p>制定日：2018年1月9日</p>
                            </div>
                        </div>
                        <!-- ▼同意について▼ -->
                        <div class="consent_area">
                            <p>上記をお読み頂きご確認の上、「同意する」にチェックを入れて下さい。</p>
                            <label for="yes"><input type="radio" name="consent" id="yes" value="同意する" style="vertical-align: middle;">同意する</label>
                            <label for="no"><input type="radio" name="consent" id="no" value="同意しない" style="vertical-align: middle;" checked="checked">同意しない</label>
                        </div>
                        <!-- ▲同意について▲ -->
                    </dd>
                </dl>
                <!-- ▲個人情報保護方針▲ -->
            </div>

            <!-- ▼▼送信ボタン -->
            <ul class="sendarea">
                <li><input type="submit" name="submit" value="入力内容を確認する" class="btn_css_check" /></li>
                <li><input type="reset" name="reset" value="リセット" class="btn_css_reset" /></li>
            </ul>
            <!-- ▲▲送信ボタン -->
        </form>
    </section>
@endsection
