@extends('admin.layouts.default')

@section('title', '受注登録 | 受注管理 | ローリー管理画面')

@section('content-header')
    <h1>
        受注管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/orders') }}">受注管理</a></li>
        <li class="active">受注登録</li>
    </ol>
@endsection

@section('content')
    <form class="form-horizontal" id="form1" action="{{ url('/admin/orders') }}"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- 会員情報 -->
            <section class="box box-default user_section">
                <!-- 会員情報ヘッダー -->
                <div class="box-header">
                    <h3 class="box-title">注文者情報</h3>
                    <button type="button" class="btn btn-md btn-default ml-30" data-toggle="modal"
                            data-target="#user-search-modal">
                        会員検索
                    </button>
                    {{--<button type="button" class="btn btn-md btn-default ml-30" id="user_reset">--}}
                    {{--リセット--}}
                    {{--</button>--}}
                </div>
                <!-- /会員情報ヘッダー -->
                <!-- 会員情報ボディ -->
                <div class="box-body" id="userArea" @if (empty(old('user.id')))style="display: none;"@endif>
                    <fieldset>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                会員ID
                            </label>
                            <input type="hidden" name="user[id]" value="{{ old('user.id') }}" class="user_form">
                            <input type="hidden" name="order[user_id]" value="{{ old('order.user_id') }}">
                            <div class="col-md-8" id="user_id_disp">{{ old('user.id') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="user-identification_status" class="control-label col-md-3">
                                本人確認状況
                            </label>
                            <div class="col-md-6">
                                <select name="user[identification_status]" class="form-control user_form">
                                    <option value="">未確認</option>
                                    <option value="1" {{  old('user.identification_status')==1?"selected":"" }}>確認済み</option>
                                    <option value="2" {{  old('user.identification_status')==2?"selected":"" }}>確認済み（未）</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-first_name" class="control-label col-md-3">
                                名前
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="text" id="user-last_name" name="user[last_name]" class="form-control user_form"
                                       value="{{ old('user.last_name') }}" required>
                                <input type="text" id="user-first_name" name="user[first_name]" class="form-control user_form"
                                       value="{{ old('user.first_name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-name_kana" class="control-label col-md-3">
                                名前（ふりがな）
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="text" id="user-last_name_kana" name="user[last_name_kana]" class="form-control user_form"
                                       value="{{ old('user.last_name_kana') }}" required>
                                <input type="text" id="user-first_name_kana" name="user[first_name_kana]" class="form-control user_form"
                                       value="{{ old('user.first_name_kana') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-mobile_tel01" class="control-label col-md-3">
                                携帯電話番号
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="number" id="user-mobile_tel01" name="user[mobile_tel01]" class="form-control user_form"
                                       value="{{ old('user.mobile_tel01') }}" required>
                                -
                                <input type="number" id="user-mobile_tel02" name="user[mobile_tel02]" class="form-control user_form"
                                       value="{{ old('user.mobile_tel02') }}" required>
                                -
                                <input type="number" id="user-mobile_tel03" name="user[mobile_tel03]" class="form-control user_form"
                                       value="{{ old('user.mobile_tel03') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-tel01" class="control-label col-md-3">
                                電話番号
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="number" id="user-tel01" name="user[tel01]" class="form-control user_form"
                                       value="{{ old('user.tel01') }}">
                                -
                                <input type="number" id="user-tel02" name="user[tel02]" class="form-control user_form"
                                       value="{{ old('user.tel02') }}">
                                -
                                <input type="number" id="user-tel03" name="user[tel03]" class="form-control user_form"
                                       value="{{ old('user.tel03') }}">
                            </div>
                        </div>
                        <div class="form-group {{ ($errors->has('zip01')||$errors->has('zip02')) ? 'has-error' : '' }}">
                            <label for="user-zip01" class="control-label col-md-3">
                                郵便番号
                            </label>
                            <div class="col-md-8 input_zip form-inline">
                                〒
                                <input type="number" id="user-zip01" name="user[zip01]" class="form-control user_form"
                                       value="{{ old('user.zip01') }}" required>
                                -
                                <input type="number" id="user-zip02" name="user[zip02]" class="form-control user_form"
                                       value="{{ old('user.zip02') }}" required>
                                <span>
                                <button type="button" id="user-zip-btn"
                                        class="btn btn-default btn-sm">郵便番号から自動入力</button>
                            </span>
                                @if ($errors->has('zip01'))
                                    @foreach ($errors->get('zip01') as $error)
                                        <div class="text-danger float-left col-md-4">{{ $error }}</div>
                                    @endforeach
                                @endif
                                @if ($errors->has('zip02'))
                                    @foreach ($errors->get('zip02') as $error)
                                        <div class="text-danger col-md-4">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-pref_id" class="control-label col-md-3">
                                都道府県
                            </label>
                            <div class="col-md-8">
                                <select id="user-pref_id" name="user[pref_id]" class="form-control user_form" required>
                                    @foreach(config('pref') as $key => $name)
                                        <option value="{{ $key }}" {{ old('user.pref_id') == $key ? "selected" : "" }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-address1" class="control-label col-md-3">
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="user-address1" name="user[address1]"
                                       value="{{ old('user.address1') }}" class="form-control user_form" required placeholder="市区町村"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-address2" class="control-label col-md-3">
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="user-address2" name="user[address2]"
                                       value="{{ old('user.address2') }}" class="form-control user_form"
                                       placeholder="番地・ビル名"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-identification_doc" class="control-label col-md-3">
                                身分証明書類
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="hidden" name="user[identification_doc]" value="{{ old('user.identification_doc') }}">
                                @if (!empty(old('user.identification_doc')))
                                    <a class="btn" id="identification_doc_btn"
                                       href="{{ url('/admin/getDocument?url='. old('user.identification_doc')) }}"
                                       target="_blank">表示する</a>
                                    <p id="identification_doc_none" style="display: none;">未登録</p>
                                @else
                                    <a class="btn" id="identification_doc_btn"
                                       href="{{ url('/admin/getDocument?url='. old('user.identification_doc')) }}"
                                       target="_blank" style="display: none;">表示する</a>
                                    <p id="identification_doc_none">未登録</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-doc_other" class="control-label col-md-3">
                                その他の証明書類
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="hidden" name="user[doc_other]" value="{{ old('user.doc_other') }}">
                            @if (!empty(old('user.doc_other')))
                                    <a class="btn" id="doc_other_btn"
                                       href="{{ url('/admin/getDocument?url='. old('user.doc_other')) }}"
                                       target="_blank">表示する</a>
                                    <p id="doc_other_none" style="display: none;">未登録</p>
                                @else
                                    <a class="btn" id="doc_other_btn"
                                       href="{{ url('/admin/getDocument?url='. old('user.doc_other')) }}"
                                       target="_blank" style="display: none;">表示する</a>
                                    <p id="doc_other_none">未登録</p>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- /会員情報ボディ -->
            </section>
            <!-- /会員情報 -->

            <!-- クレジットカード名義者情報 -->
            <section class="box box-default user_section">
                <!-- クレジットカード名義者情報ヘッダー -->
                <div class="box-header">
                    <h3 class="box-title">クレジットカード名義者情報</h3>
                </div>
                <!-- /クレジットカード名義者情報ヘッダー -->
                <!-- クレジットカード名義者情報ボディ -->
                <div class="box-body" id="userArea">
                    <fieldset>
                        <div class="form-group">
                            <label for="order_credit-name" class="control-label col-md-3">
                                名前
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="order_credit-name" name="order_credit[name]" class="form-control"
                                       value="{{ old('order_credit.name') }}">
                            </div>
                        </div>
                        <div class="form-group {{ ($errors->has('order_credit_zip01')||$errors->has('order_credit_zip02')) ? 'has-error' : '' }}">
                            <label for="order_credit-zip01" class="control-label col-md-3">
                                郵便番号
                            </label>
                            <div class="col-md-8 input_zip form-inline">
                                〒
                                <input type="number" id="order_credit-zip01" name="order_credit[zip01]" class="form-control"
                                       value="{{ old('order_credit.zip01') }}"
                                >
                                -
                                <input type="number" id="order_credit-zip02" name="order_credit[zip02]" class="form-control"
                                       value="{{ old('order_credit.zip02') }}"
                                >
                                <span>
                                <button type="button" id="order_credit-zip-btn"
                                        class="btn btn-default btn-sm">郵便番号から自動入力</button>
                            </span>
                                @if ($errors->has('order_credit_zip01'))
                                    @foreach ($errors->get('order_credit_zip01') as $error)
                                        <div class="text-danger float-left col-md-4">{{ $error }}</div>
                                    @endforeach
                                @endif
                                @if ($errors->has('order_credit_zip02'))
                                    @foreach ($errors->get('order_credit_zip02') as $error)
                                        <div class="text-danger col-md-4">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-pref_id" class="control-label col-md-3">
                                都道府県
                            </label>
                            <div class="col-md-8">
                                <select id="order_credit-pref_id" name="order_credit[pref_id]" class="form-control">
                                    <option value=""></option>
                                    @foreach(config('pref') as $key => $name)
                                        <option value="{{ $key }}" {{ old('order_credit.pref_id') == $key ? "selected" : "" }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-address1" class="control-label col-md-3">
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="order_credit-address1" name="order_credit[address1]"
                                       value="{{ old('order_credit.address1') }}"
                                       class="form-control" placeholder="市区町村"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-address2" class="control-label col-md-3">
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="order_credit-address2" name="order_credit[address2]"
                                       value="{{ old('order_credit.address2') }}"
                                       class="form-control"
                                       placeholder="番地・ビル名"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-tel01" class="control-label col-md-3">
                                電話番号
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="number" id="order_credit-tel01" name="order_credit[tel01]" class="form-control"
                                       value="{{ old('order_credit.tel01') }}">
                                -
                                <input type="number" id="order_credit-tel02" name="order_credit[tel02]" class="form-control"
                                       value="{{ old('order_credit.tel02') }}">
                                -
                                <input type="number" id="order_credit-tel03" name="order_credit[tel03]" class="form-control"
                                       value="{{ old('order_credit.tel03') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-relationship" class="control-label col-md-3">
                                申込者のと関係
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="order_credit-relationship" name="order_credit[relationship]"
                                       class="form-control"
                                       value="{{ old('order_credit.relationship') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-doc_1" class="control-label col-md-3">
                                名義者本人確認書類1
                            </label>
                            <div class="col-md-8 form-inline">
                                <input class="upload_file" name="order_credit[doc_1]" type="file"
                                       multiple="" accept="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_credit-doc_2" class="control-label col-md-3">
                                名義者本人確認書類2
                            </label>
                            <div class="col-md-8 form-inline">
                                <input class="upload_file" name="order_credit[doc_2]" type="file"
                                       multiple="" accept="">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- /クレジットカード名義者情報ボディ -->
            </section>
            <!-- /クレジットカード名義者情報 -->

            <!-- レンタル商品情報 -->
            <section class="box box-default">
                <!-- レンタル商品情報ヘッダー -->
                <div class="box-header">
                    <h3 class="box-title">レンタル商品情報</h3>
                    <button type="button" class="btn btn-md btn-default ml-30" data-toggle="modal"
                            data-target="#product-search-modal">
                        レンタル商品の検索
                    </button>
                </div>
                <!-- /レンタル商品情報ヘッダー -->
                <!-- レンタル商品情報ボディ -->
                <div class="box-body" id="productArea" @if (empty(old('order.product_id')))style="display: none;"@endif>
                    <fieldset>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                商品ID
                            </label>
                            <input type="hidden" name="product_id_disp" value="{{ old('product_id_disp') }}">
                            <div class="col-md-8" id="product_id_disp">{{ old('product_id_disp') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                管理コード
                            </label>
                            <input type="hidden" name="management_code_disp" value="{{ old('management_code_disp') }}">
                            <div class="col-md-8" id="management_code_disp">{{ old('management_code_disp') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                レンタル時計
                            </label>
                            <input type="hidden" name="order[product_id]" value="{{ old('order.product_id') }}">
                            <input type="hidden" name="product[id]" value="{{ old('product.id') }}">
                            <input type="hidden" name="product_name_disp" value="{{ old('product_name_disp') }}">
                            <div class="col-md-8" id="product_name_disp">{{ old('product_name_disp') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                お申し込みプラン
                            </label>
                            <input type="hidden" name="plan_name_disp" value="{{ old('plan_name_disp') }}">
                            <div class="col-md-8" id="plan_name_disp">{{ old('plan_name_disp') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                ご利用料金
                            </label>
                            <input type="hidden" name="plan_price_disp" value="{{ old('plan_price_disp') }}">
                            <div class="col-md-8" id="plan_price_disp">{{ old('plan_price_disp') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                ステータス
                            </label>
                            <div class="col-md-8">
                                <select name="product[status]" class="form-control">
                                    @foreach (config('const.product.status') as $key => $status)
                                        <option value="{{ $key }}" {{ old('product.status')==$key?"selected":"" }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order-id" class="control-label col-md-3">
                                ベルトの長さ
                            </label>
                            <div class="col-md-8">
                                <select name="order[belt_length]" class="form-control" required>
                                    <option value=""></option>
                                    @for ($i=8; $i<=24; $i+=0.5)
                                        <option value="{{ $i }}" {{ old('order.belt_length')==$i?"selected":"" }}>{{ number_format($i, 1) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- レンタル商品情報ボディ -->
            </section>
            <!-- /レンタル商品情報 -->

            <!-- ステータス -->
            <section class="box box-default">
                <!-- ステータスヘッダー -->
                <div class="box-header">
                    <h3 class="box-title">ステータス</h3>
                </div>
                <!-- /ステータスヘッダー -->
                <!-- ステータスボディ -->
                <div class="box-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="order-payment" class="control-label col-md-3">
                                本人確認状況
                            </label>
                            <div class="col-md-8" id="identification_status_disp"></div>
                        </div>
                        <div class="form-group">
                            <label for="order-order_date" class="control-label col-md-3">
                                お申込み日
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="order-order_date" name="order[order_date]" value="{{ old('order.order_date') }}" class="form-control datepicker" placeholder="" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order-settlement_date" class="control-label col-md-3">
                                決済日
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="order-settlement_date" name="order[settlement_date]" value="{{ old('order.settlement_date') }}" class="form-control datepicker" placeholder=""/>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--<label for="order-settlement_date" class="control-label col-md-3">--}}
                        {{--返却予定日--}}
                        {{--</label>--}}
                        {{--<div class="col-md-8" id="return_date">{{ old('order.return_date', !empty($order->settlement_date)?$order->settlement_date->addMonth(1)->format('Y-m-d'):'') }}</div>--}}
                        {{--<input type="hidden" name="order[return_date]" value="{{ old('order.return_date', !empty($order->settlement_date)?$order->settlement_date->addMonth(1)->format('Y-m-d'):'') }}">--}}
                        {{--</div>--}}
                    </fieldset>
                </div>
                <!-- /ステータスボディ -->
            </section>
            <!-- /ステータス -->

            <div class="col-md-12 text-center">
                <button type="button" id="submitBeforeBtn" class="btn btn-lg btn-primary">
                    この内容で登録する
                </button>
                <input type="submit" id="submitBtn" style="display: none;">
            </div>
    </form>

    <div class="clearfix"></div>

    <!-- 会員検索モーダル -->
    <div class="modal fade" id="user-search-modal" tabindex="-1" role="dialog"
         aria-labelledby="user-search-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="fa fa-search"></i>
                        会員検索
                    </h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control col-md-12" id="user_search_input"
                           placeholder="会員ID・メールアドレス・お名前">
                    <div class="user_result_area">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="user_search_btn">
                        <i class="fa fa-search"></i>
                        検索
                    </button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        キャンセル
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /会員検索モーダル -->

    <!-- 商品検索モーダル -->
    <div class="modal fade" id="product-search-modal" tabindex="-1" role="dialog"
         aria-labelledby="product-search-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="fa fa-search"></i>
                        商品検索
                    </h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control col-md-12" id="product_search_input" placeholder="ID・型番号・モデル名">
                    <div class="clearfix"></div>
                    <br>
                    <select class="form-control" id="product_search_brand_id">
                        <option value="">選択してください</option>
                        @foreach(\App\Models\Brand::all() as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <div class="product_result_area">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="product_search_btn">
                        <i class="fa fa-search"></i>
                        検索
                    </button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        キャンセル
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /商品検索モーダル -->

    <script>
        window.onload = function () {
            $("input.upload_file").fileinput({
                maxFilePreviewSize: 10240,
                showUpload: false,
                maxFileCount: 1,
                browseClass: 'btn btn-info fileinput-browse-button',
                browseLabel: '',
                showRemove: false,
                showZoom: false
            });
        };
    </script>

    <!-- JS -->
    @include('admin.orders.js')
    <!-- /JS -->


@endsection
