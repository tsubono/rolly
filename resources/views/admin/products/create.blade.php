@extends('admin.layouts.default')

@section('title', '商品登録 | 商品管理 | ローリー管理画面')

@section('content-header')
    <h1>
        商品管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/products') }}">商品管理</a></li>
        <li class="active">商品登録</li>
    </ol>
@endsection

@section('content')
    <!-- form -->
    <form action="{{ url('/admin/products') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!-- #detail_wrap -->
        <div id="detail_wrap" class="col-md-9">
            <div class="box form-horizontal">
                <div class="box-body">
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">ブランド名</label>
                        <div class="col-md-6">
                            <select name="product[brand_id]" class="form-control" required>
                                <option value=""></option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('product.brand_id')==$brand->id?"selected":"" }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">型番号</label>
                        <div class="col-md-6">
                            <input type="text" name="product[model_number]" value="{{ old('product.model_number') }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">モデル名</label>
                        <div class="col-md-6">
                            <input type="text" name="product[model_name]" value="{{ old('product.model_name') }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">シリアルNo</label>
                        <div class="col-md-6">
                            <input type="text" name="product[serial_no]" value="{{ old('product.serial_no') }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">カラー</label>
                        <div class="col-md-6">
                            <input type="text" name="product[color]" value="{{ old('product.color') }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">写真01</label>
                        <div class="col-md-6">
                            <input class="upload_file" name="product[image1]" type="file"
                                   multiple="" accept="">
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">写真02</label>
                        <div class="col-md-6">
                            <input class="upload_file" name="product[image2]" type="file"
                                   multiple="" accept="">
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">プラン</label>
                        <div class="col-md-6">
                            <select name="product[plan_id]" class="form-control" required>
                                <option value=""></option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->id }}" {{ old('product.plan_id')== $plan->id?"selected":""}}>{{ $plan->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ url('/admin/products') }}" class="btn btn-sm btn-default">
                        <i class="fa fa-chevron-left"></i>
                        商品一覧へ戻る
                    </a>
                </div>
            </div>
        </div>
        <!-- /#detail_wrap -->

        <!-- #aside_column -->
        <div class="col-md-3" id="aside_column">
            <div class="col_inner">
                <div class="box no-header text-center submit_box">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                @foreach(config('const.product.status') as $key => $value)
                                    <div class="radio-inline">
                                        <div class="radio">
                                            <label class="">
                                                <input type="radio" name="product[status]" value="{{ $key }}"
                                                        {{ old('product.status')==$key?"checked":"" }} required>
                                                {{ $value }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm-12 col-md-12">
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-md prevention-btn prevention-mask">
                                    商品を登録
                                </button>
                            </div>
                        </div>
                        <div class="row text-center with-border">
                            <ul class="col-sm-12 col-md-12">
                                <li class="col-sm-12 col-lg-6">
                                    <button class="btn btn-default btn-block btn-sm" disabled="">
                                        表示確認
                                    </button>
                                </li>
                                <li class="col-sm-12 col-lg-6">
                                    <button class="btn btn-danger btn-block btn-sm" disabled="">
                                        削除
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="box no-header">
                    <div class="box-body update-area">
                        <p><i class="far fa-clock"></i>登録日：</p>
                        <p><i class="far fa-clock"></i>更新日：</p>
                    </div>
                </div>

                <div id="common_shop_note_box" class="box">
                    <div id="common_shop_note_box__header" class="box-header">
                        <h3 class="box-title">備考・メモ</h3>
                    </div>
                    <div class="box-body">
                        <textarea name="product[note]" class="form-control">{{ old('product.note') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#aside_column -->
    </form>
    <!-- /form -->
    <div class="clearfix"></div>

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

@endsection
