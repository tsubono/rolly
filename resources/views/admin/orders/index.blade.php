@extends('admin.layouts.default')

@section('title', '受注一覧 | 受注管理 | ローリー管理画面')

@section('content-header')
    <h1>
        受注管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/orders') }}">受注管理</a></li>
        <li class="active">受注一覧</li>
    </ol>
@endsection

@section('content')

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">検索</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('/admin/orders') }}" method="get">
                <div class="form-group col-sm-6">
                    <label>注文番号</label>
                    <input type="text" class="form-control" name="search[id]"
                           value="{{ isset($search['id'])?$search['id']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>ご希望のレンタル時計</label><br>
                    <div class="col-sm-6">
                        <span>ブランド名</span></label>
                        <select name="search[brand_id]" class="form-control">
                            <option value=""></option>
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{ $brand->id }}" {{ (isset($search['brand_id'])?$search['brand_id']:'') == $brand->id?"selected":"" }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <span>モデル名</span>
                        <input type="text" class="form-control" name="search[model_name]"
                               value="{{ isset($search['model_name'])?$search['model_name']:'' }}">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label>お名前</label>
                    <input type="text" class="form-control" name="search[name]"
                           value="{{ isset($search['name'])?$search['name']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>本人確認状況</label>
                    <select name="search[identification_status]" class="form-control">
                        <option value="-1"></option>
                        <option value="0" {{ (isset($search['identification_status'])?$search['identification_status']:'-1') == "0"?"selected":"" }}>
                            未確認
                        </option>
                        <option value="1" {{ (isset($search['identification_status'])?$search['identification_status']:'') == "1"?"selected":"" }}>
                            確認済み
                        </option>
                        <option value="2" {{ (isset($search['identification_status'])?$search['identification_status']:'') == "2"?"selected":"" }}>
                            確認済み（未）
                        </option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label>受注日</label>
                    <input type="text" class="form-control datepicker" name="search[order_date]"
                           value="{{ isset($search['order_date'])?$search['order_date']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>返却予定日</label>
                    <input type="text" class="form-control datepicker" name="search[return_date]"
                           value="{{ isset($search['return_date'])?$search['return_date']:'' }}">
                </div>

                <button type="submit" class="btn btn-success pull-right">検索する</button>
            </form>
        </div>
    </section>

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">受注一覧</h3>
            <div class="box-tools">
                <a href="{{ url('/admin/orders/create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    受注登録
                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>注文番号</th>
                    <th>受注日</th>
                    <th>お名前</th>
                    <th>ご希望のレンタル時計</th>
                    <th>申し込みプラン</th>
                    <th>本人確認状況</th>
                    <th>返却予定日</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date->format('Y年m月d日') }}</td>
                        <td>{{ $order->user->last_name }} {{ $order->user->first_name }}</td>
                        <td>{{ $order->product->brand->name }} {{ $order->product->model_name }}</td>
                        <td>{{ $order->product->plan->name }}</td>
                        <td>
                            @if ($order->user->identification_status==1)
                                確認済み
                            @elseif ($order->user->identification_status==2)
                                <span>確認済み（未）</span>
                            @else
                                <span style="color: red;">未確認</span>
                            @endif
                        </td>
                        <td>
                            @if (!empty($order->return_date))
                                {{ $order->return_date->format('Y年m月d日') }}</td>
                        @endif
                        <td>
                            <a href="{{ url('/admin/orders/'. $order->id. '/edit') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                                編集
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#order-{{ $order->id }}-delete-modal">
                                <i class="fa fa-trash"></i>
                                削除
                            </button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->appends(request()->all())->render() }}
        </div>
    </section>
    @foreach($orders as $order)
        <div class="modal fade" id="order-{{ $order->id }}-delete-modal" tabindex="-1" role="dialog"
             aria-labelledby="order-{{ $order->id }}-delete-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/orders/'. $order->id) }}" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="order-{{ $order->id }}-delete-modal-label">
                                <i class="fa fa-trash"></i>
                                削除確認
                            </h4>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
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
    <script>
        window.onload = function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        }
    </script>
@endsection
