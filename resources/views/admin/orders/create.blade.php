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
    <form class="form-horizontal" id="form1" action="{{ url('/admin/orders') }}" method="post">
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
                            <input type="hidden" name="user[id]" value="{{ old('user.id') }}">
                            <input type="hidden" name="order[user_id]" value="{{ old('order.user_id') }}">
                            <div class="col-md-8" id="user_id_disp"></div>
                        </div>
                        <div class="form-group">
                            <label for="user-first_name" class="control-label col-md-3">
                                名前
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="text" id="user-last_name" name="user[last_name]" class="form-control"
                                       value="{{ old('user.last_name') }}" required>
                                <input type="text" id="user-first_name" name="user[first_name]" class="form-control"
                                       value="{{ old('user.first_name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-name_kana" class="control-label col-md-3">
                                名前（ふりがな）
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="text" id="user-last_name_kana" name="user[last_name_kana]" class="form-control"
                                       value="{{ old('user.last_name_kana') }}" required>
                                <input type="text" id="user-first_name_kana" name="user[first_name_kana]" class="form-control"
                                       value="{{ old('user.first_name_kana') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-mobile_tel01" class="control-label col-md-3">
                                携帯電話番号
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="number" id="user-mobile_tel01" name="user[mobile_tel01]" class="form-control"
                                       value="{{ old('user.mobile_tel01') }}" required>
                                -
                                <input type="number" id="user-mobile_tel02" name="user[mobile_tel02]" class="form-control"
                                       value="{{ old('user.mobile_tel02') }}" required>
                                -
                                <input type="number" id="user-mobile_tel03" name="user[mobile_tel03]" class="form-control"
                                       value="{{ old('user.mobile_tel03') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-tel01" class="control-label col-md-3">
                                電話番号
                            </label>
                            <div class="col-md-8 form-inline">
                                <input type="number" id="user-tel01" name="user[tel01]" class="form-control"
                                       value="{{ old('user.tel01') }}">
                                -
                                <input type="number" id="user-tel02" name="user[tel02]" class="form-control"
                                       value="{{ old('user.tel02') }}">
                                -
                                <input type="number" id="user-tel03" name="user[tel03]" class="form-control"
                                       value="{{ old('user.tel03') }}">
                            </div>
                        </div>
                        <div class="form-group {{ ($errors->has('zip01')||$errors->has('zip02')) ? 'has-error' : '' }}">
                            <label for="user-zip01" class="control-label col-md-3">
                                郵便番号
                            </label>
                            <div class="col-md-8 input_zip form-inline">
                                〒
                                <input type="number" id="user-zip01" name="user[zip01]" class="form-control"
                                       value="{{ old('user.zip01') }}" required>
                                -
                                <input type="number" id="user-zip02" name="user[zip02]" class="form-control"
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
                                <select id="user-pref_id" name="user[pref_id]" class="form-control" required>
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
                                       value="{{ old('user.address1') }}" class="form-control" required placeholder="市区町村"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-address2" class="control-label col-md-3">
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="user-address2" name="user[address2]"
                                       value="{{ old('user.address2') }}" class="form-control"
                                       placeholder="番地・ビル名"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- /会員情報ボディ -->
            </section>
            <!-- /会員情報 -->

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
                                レンタル時計
                            </label>
                            <input type="hidden" name="order[product_id]" value="{{ old('order.product_id') }}">
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

    <!-- JS -->
    @include('admin.orders.js')
    <!-- /JS -->


@endsection
