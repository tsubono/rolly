@extends('front/layouts.default')

@section('title', 'よくあるご質問 Q&A | 時計レンタル ROLLY')

@section('content')
    <div class="guide qa">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/qa/tit_qa.png') }}" alt="qa"></h1>

            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; よくあるご質問</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            <div class="contents">
                <section>
                    <div class="pri">
                        <h2>よくあるご質問&nbsp;Q&A</h2>
                        <div class="accordion">
                            <div class="question cf"> <img src="../img/qa/question_01.png">
                                <p>"ROLLY"の利用方法は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_01.png">
                                <p>初めてのご利用の場合は、無料会員登録が必要です。その後、レンタルしたい腕時計を選択し有料会員登録していただくと、サービスをご利用いただけます。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_02.png">
                                <p>返却期限は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_02.png">
                                <p>返却期限はございませんので、心行くまでご利用ください。<br>
                                    ※毎月のご利用料金は発生します。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_03.png">
                                <p>一度に借りられる本数は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_03.png">
                                <p>多くのお客様にご利用いただきたいので、1回のレンタルにつき1本のレンタルとなります。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_04.png">
                                <p>会員になるためには何が必要？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_04.png">
                                <p>無料会員登録はメールアドレスのみ、本会員登録はメールアドレス、クレジットカード情報、お届け先ご住所、電話番号、お客様の本人確認書類などが必要です。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_05.png">
                                <p>本会員登録の流れは？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_05.png">
                                <p>本会員登録の流れは以下のとおりです。<br>
                                    ①レンタルしたい腕時計を選択する。<br>
                                    （選択した腕時計に対応した月額料金が自動的に適用されます）<br>
                                    ↓<br>
                                    ②本会員登録画面で必要事項（氏名、住所、連絡先電話番号、クレジットカード情報等）を入力し、所定の本人確認書類のアップロード及び手首周りの登録を行う。<br>
                                    ↓<br>
                                    ③当社にて本人確認書類をチェックする。<br>
                                    ↓<br>
                                    ④当社から、ご登録された連絡先電話番号にお電話し、ご本人様確認をさせていただく。<br>
                                    ↓<br>
                                    ⑤本会員登録完了</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_06.png">
                                <p>本人確認書類は何が必要？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_06.png">
                                <p>以下のいずれかの書類が必要です。<br>
                                    ①ご本人様と本人確認書類が一緒に写っている写真<br>
                                    ②有効期限内の運転免許証(表裏コピー)<br>
                                    ③有効期限内のパスポート<br>
                                    ④健康保険証のいずれかとし、③④の場合には申込人宛のクレジットカード請求書、携帯料金請求書または住民票の提出もお願いたします。<br>
                                 </p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_07.png">
                                <p>利用するのに年齢制限はある？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_07.png">
                                <p>18歳未満の方はご利用いただけません。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_08.png">
                                <p>自宅以外の住所で会員登録できる？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_08.png">
                                <p>本人確認書類に記載されているご住所のみでのご利用が可能です。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_09.png">
                                <p>メールが届かないのですが？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_09.png">
                                <p>会員登録時に入力されたメールアドレスにメールを送信しております。メールが届かない場合は以下の可能性が考えられますのでご確認ください。<br>
                                    ・お使いのメールソフトやフリーメールによって迷惑メールに振り分けられる。<br>
                                    ・受信設定にて「@daishin.jp.net」からのメールを受信できる設定になっていない。<br>
                                    ・登録したメールアドレスが間違っている。<br>
                                    それでもなおメールを受信できない場合は、恐れ入りますがお問い合わせからご連絡ください。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_10.png">
                                <p>パスワードを忘れたら？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_10.png">
                                <p>ログイン画面より「パスワードをお忘れの方」をクリックし、ご登録されたメールアドレスを送信してください。再設定方法をメールでご案内いたします。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_11.png">
                                <p>全ての地域に配送してもらえるか？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_11.png">
                                <p>申し訳ありませんが、一部の地域及び、海外への発送につきましては対応しておりません。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_12.png">
                                <p>送料は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_12.png">
                                <p>発送料はROLLYが負担致します。<br>
                                    返送につきましては、お客様負担となります。また、配達は指定業者のヤマト運輸のみのご利用となります。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_13.png">
                                <p>返却方法は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_13.png">
                                <p>お届け時の段ボールと、お届け時に同封している元払い伝票をご利用下さい。<br>
                                    腕時計は、お届けした時計箱の中に入れ、段ボールに梱包してください。また、輸送時の紛失・破損を防止するため、ガムテープなどで段ボールの補強をお願いします。<br>
                                    なお、返送方法は以下の３つがあります。<br>
                                    ・ヤマト運輸での集荷依頼<br>
                                    ・ヤマト運輸の営業所持ち込み<br>
                                    ・ヤマト運輸対応のコンビニ持ち込み</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_14.png">
                                <p>支払方法は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_14.png">
                                <p>現在はクレジットカード決済のみとなります。以下のクレジットカード会社をご利用いただけます。<br>
                                    VISA、Master Card、JCB、AMERICAN EXPRESS</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_15.png">
                                <p>支払日は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_15.png">
                                <p>初回の商品発送手続き時に、クレジットカードの決済処理を行います。月額料金の発生は出荷時点からとなります。翌月以降は、初回決済日の当日が自動的に決済日となります。（初回の決済日が6/1の場合、翌月以降の決済日は毎月1日になります。）<br>
                                    なお、お客様の銀行口座から引き落とされるタイミングは、ご利用のクレジットカード会社にお問い合わせください。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_16.png">
                                <p>レンタル中の破損・故障などはどうすればよいか？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_16.png">
                                <p>まずは当社までご連絡ください。お客様に商品状況をお伺いし、すぐに返却をしていただく場合があります。<br>
                                    通常使用でのキズや汚れについては当社にて修理・クリーニング致します。通常使用のキズや汚れを超える破損や故障の場合、修理可能であれば修理費用を、修理が不可能な場合は同等物の購入費用をご負担いただくことになります。取扱には十分にご注意ください。また、ご返却時に当社の検品で破損や故障状態を確認した場合は、商品の利用状況をお伺いする場合がございます。</p>
                            </div>
                            <div class="question cf"> <img src="../img/qa/question_17.png">
                                <p>腕時計を紛失・盗難にあった場合は？</p>
                            </div>
                            <div class="answer cf"> <img src="../img/qa/answer_17.png">
                                <p>速やかに当社へご連絡いただき、同時に最寄の警察へ「被害届」または「遺失届」を提出してください。<br>
                                    なお、「紛失」「盗難」などの場合、同等物の購入をお客様にご負担して頂く事となります。
                                </p>
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
