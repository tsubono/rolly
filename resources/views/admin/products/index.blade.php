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
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->model_number }}</td>
                        <td>{{ $product->model_name }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->plan->name }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->updated_at)->format('Y年m月d日 h:i') }}</td>
                        <td>
                            <a href="{{ url('/admin/products/'. $product->id. '/edit') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                                編集
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#product-{{ $product->id }}-delete-modal">
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
        <div class="modal fade" id="product-{{ $product->id }}-delete-modal" tabindex="-1" role="dialog" aria-labelledby="product-{{ $product->id }}-delete-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/products/'. $product->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
