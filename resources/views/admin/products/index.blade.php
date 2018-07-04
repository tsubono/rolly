@extends('admin.layouts.default')

@section('title', '商品一覧 | 商品管理 | ローリー管理画面')

@section('content-header')
    <h1>
        商品管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/products') }}">商品管理</a></li>
        <li class="active">商品一覧</li>
    </ol>
@endsection

@section('content')

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">検索</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('/admin/products') }}" method="get">
                <div class="form-group col-sm-6">
                    <label>管理コード</label>
                    <input type="text" class="form-control" name="search[management_code]"
                           value="{{ isset($search['management_code'])?$search['management_code']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>ブランド名</label>
                    <select name="search[brand_id]" class="form-control">
                        <option value=""></option>
                        @foreach(\App\Models\Brand::all() as $brand)
                            <option value="{{ $brand->id }}" {{ (isset($search['brand_id'])?$search['brand_id']:'') == $brand->id?"selected":"" }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label>型番号</label>
                    <input type="text" class="form-control" name="search[model_number]"
                           value="{{ isset($search['model_number'])?$search['model_number']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>モデル名</label>
                    <input type="text" class="form-control" name="search[model_name]"
                           value="{{ isset($search['model_name'])?$search['model_name']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>プラン</label>
                    <select name="search[plan_id]" class="form-control">
                        <option value=""></option>
                        @foreach(\App\Models\Plan::all() as $plan)
                            <option value="{{ $plan->id }}" {{ (isset($search['plan_id'])?$search['plan_id']:'') == $plan->id?"selected":"" }}>{{ $plan->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label>ステータス</label>
                    <select name="search[status]" class="form-control">
                        <option value=""></option>
                        @foreach(config('const.product.status') as $key => $status)
                            <option value="{{ $key }}" {{ (isset($search['status'])?$search['status']:'') == $key?"selected":"" }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success pull-right">検索する</button>
            </form>
        </div>
    </section>

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">商品一覧</h3>
            <div class="box-tools">
                <a href="{{ url('/admin/products/create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    商品登録
                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>管理コード</th>
                    <th>ブランド名</th>
                    <th>型番号</th>
                    <th>モデル名</th>
                    <th>カラー</th>
                    <th>プラン</th>
                    <th>ステータス</th>
                    <th>更新日</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->management_code }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->model_number }}</td>
                        <td>{{ $product->model_name }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->plan->name }}</td>
                        <td>{{ config('const.product.status')[$product->status] }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->updated_at)->format('Y年m月d日 h:i') }}</td>
                        <td>
                            <a href="{{ url('/admin/products/'. $product->id. '/edit') }}"
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                                編集
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#product-{{ $product->id }}-delete-modal">
                                <i class="fa fa-trash"></i>
                                削除
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->appends(request()->all())->render() }}
        </div>
    </section>
    @foreach($products as $product)
        <div class="modal fade" id="product-{{ $product->id }}-delete-modal" tabindex="-1" role="dialog"
             aria-labelledby="product-{{ $product->id }}-delete-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/products/'. $product->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="product-{{ $product->id }}-delete-modal-label">
                                <i class="fa fa-trash"></i>
                                {{ $product->model_name }}削除確認
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p>本当に削除してもよろしいですか？</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                キャンセル
                            </button>
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                                削除する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
