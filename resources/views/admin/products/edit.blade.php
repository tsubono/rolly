@extends('admin.layouts.default')

@section('title', '商品編集 | 商品管理 | ローリー管理画面')

@section('content-header')
    <h1>
        商品管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/products') }}">商品管理</a></li>
        <li class="active">商品編集</li>
    </ol>
@endsection

@section('content')
    <!-- form -->
    <form action="{{ url('/admin/products/'. $product->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="product[id]" value="{{ $product->id }}">
    <!-- #detail_wrap -->
        <div id="detail_wrap" class="col-md-9">
            <div class="box form-horizontal">
                <div class="box-body">
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">商品ID</label>
                        <div class="col-md-6">
                            {{ $product->id }}
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">管理コード</label>
                        <div class="col-md-6">
                            <input type="text" name="product[management_code]" value="{{ old('product.management_code', $product->management_code) }}"
                                   class="form-control" />
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">ブランド名</label>
                        <div class="col-md-6">
                            <select name="product[brand_id]" class="form-control" required>
                                <option value=""></option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('product.brand_id', $product->brand_id)==$brand->id?"selected":"" }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">型番号</label>
                        <div class="col-md-6">
                            <input type="text" name="product[model_number]" value="{{ old('product.model_number', $product->model_number) }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">モデル名</label>
                        <div class="col-md-6">
                            <input type="text" name="product[model_name]" value="{{ old('product.model_name', $product->model_name) }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">シリアルNo</label>
                        <div class="col-md-6">
                            <input type="text" name="product[serial_no]" value="{{ old('product.serial_no', $product->serial_no) }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">カラー</label>
                        <div class="col-md-6">
                            <input type="text" name="product[color]" value="{{ old('product.color', $product->color) }}"
                                   class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">ベルトの最大の長さ</label>
                        <div class="col-md-6">
                            <input type="text" name="product[max_belt_length]" value="{{ old('product.max_belt_length', $product->max_belt_length) }}"
                                   class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">写真01</label>
                        <div class="col-md-6">
                            <input type="hidden" name="product[image1_edit]" value="-1">
                            <input class="upload_file" name="product[image1]" type="file"
                                   multiple="" accept="">
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">写真02</label>
                        <div class="col-md-6">
                            <input type="hidden" name="product[image2_edit]" value="-1">
                            <input class="upload_file" name="product[image2]" type="file"
                                   multiple="" accept="">
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">写真03</label>
                        <div class="col-md-6">
                            <input type="hidden" name="product[image3_edit]" value="-1">
                            <input class="upload_file" name="product[image3]" type="file"
                                   multiple="" accept="">
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">写真04</label>
                        <div class="col-md-6">
                            <input type="hidden" name="product[image4_edit]" value="-1">
                            <input class="upload_file" name="product[image4]" type="file"
                                   multiple="" accept="">
                        </div>
                    </div>
                    <div class="form-group input_row">
                        <label class="control-label col-md-3">プラン</label>
                        <div class="col-md-6">
                            <select name="product[plan_id]" class="form-control" required>
                                <option value=""></option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->id }}" {{ old('product.plan_id', $product->plan_id)== $plan->id?"selected":""}}>{{ $plan->name }}</option>
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
                                                       {{ old('product.status', $product->status)==$key?"checked":"" }} required>
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
                                    商品を編集
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
                        <p><i class="far fa-clock"></i>編集日：</p>
                        <p><i class="far fa-clock"></i>更新日：</p>
                    </div>
                </div>

                <div id="common_shop_note_box" class="box">
                    <div id="common_shop_note_box__header" class="box-header">
                        <h3 class="box-title">備考・メモ</h3>
                    </div>
                    <div class="box-body">
                        <textarea name="product[note]" class="form-control">{{ old('product.note', $product->note) }}</textarea>
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
            $("[name='product[image1]']").fileinput({
                maxFilePreviewSize: 10240,
                showUpload: false,
                maxFileCount: 1,
                browseClass: 'btn btn-info fileinput-browse-button',
                browseLabel: '',
                showRemove: true,
                removeLabel: '',
                removeClass: 'btn btn-danger',
                @if (!empty(old('product.image1', $product->image1)))
                initialPreview: "{{ asset(env('PUBLIC', ''). old('product.image1', $product->image1)) }}",
                initialPreviewAsData: true,
                overwriteInitial : true,
                initialPreviewDownloadUrl: "{{ asset(env('PUBLIC', ''). old('product.image1', $product->image1)) }}"
                @endif
            });
            $("[name='product[image1]']").on('filecleared', function(event) {
                $("[name='product[image1_edit]']").val(1);
            });

            $("[name='product[image2]']").fileinput({
                maxFilePreviewSize: 10240,
                showUpload: false,
                maxFileCount: 1,
                browseClass: 'btn btn-info fileinput-browse-button',
                browseLabel: '',
                showRemove: true,
                removeLabel: '',
                removeClass: 'btn btn-danger',
                @if (!empty(old('product.image2', $product->image2)))
                initialPreview: "{{ asset(env('PUBLIC', ''). old('product.image2', $product->image2)) }}",
                initialPreviewAsData: true,
                overwriteInitial : true,
                initialPreviewDownloadUrl: "{{ asset(env('PUBLIC', ''). old('product.image2', $product->image2)) }}"
                @endif
            });
            $("[name='product[image2]']").on('filecleared', function(event) {
                $("[name='product[image2_edit]']").val(1);
            });

            $("[name='product[image3]']").fileinput({
                maxFilePreviewSize: 10240,
                showUpload: false,
                maxFileCount: 1,
                browseClass: 'btn btn-info fileinput-browse-button',
                browseLabel: '',
                showRemove: true,
                removeLabel: '',
                removeClass: 'btn btn-danger',
                @if (!empty(old('product.image3', $product->image3)))
                initialPreview: "{{ asset(env('PUBLIC', ''). old('product.image3', $product->image3)) }}",
                initialPreviewAsData: true,
                overwriteInitial : true,
                initialPreviewDownloadUrl: "{{ asset(env('PUBLIC', ''). old('product.image3', $product->image3)) }}"
                @endif
            });
            $("[name='product[image3]']").on('filecleared', function(event) {
                $("[name='product[image3_edit]']").val(1);
            });

            $("[name='product[image4]']").fileinput({
                maxFilePreviewSize: 10240,
                showUpload: false,
                maxFileCount: 1,
                browseClass: 'btn btn-info fileinput-browse-button',
                browseLabel: '',
                showRemove: true,
                removeLabel: '',
                removeClass: 'btn btn-danger',
                @if (!empty(old('product.image4', $product->image4)))
                initialPreview: "{{ asset(env('PUBLIC', ''). old('product.image4', $product->image4)) }}",
                initialPreviewAsData: true,
                overwriteInitial : true,
                initialPreviewDownloadUrl: "{{ asset(env('PUBLIC', ''). old('product.image4', $product->image4)) }}"
                @endif
            });
            $("[name='product[image4]']").on('filecleared', function(event) {
                $("[name='product[image4_edit]']").val(1);
            });
        };
    </script>

@endsection
