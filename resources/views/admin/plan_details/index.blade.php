@extends('admin.layouts.default')

@section('title', 'プラン詳細一覧 | プラン詳細管理 | ローリー管理画面')

@section('content-header')
    <h1>
        プラン詳細管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/plan_details') }}">プラン詳細管理</a></li>
        <li class="active">プラン詳細一覧</li>
    </ol>
@endsection

@section('content')

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">プラン詳細一覧</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#plan_detail-create-modal">
                    <i class="fa fa-plus"></i>
                    プラン詳細登録
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>プラン名</th>
                    <th>期間</th>
                    <th>備考</th>
                    <th>更新日</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($plan_details as $plan_detail)
                    <tr>
                        <td>{{ $plan_detail->plan->name }}</td>
                        <td>{{ $plan_detail->period }}ヶ月</td>
                        <td>{!! nl2br(e( $plan_detail->note )) !!}</td>
                        <td>{{ \Carbon\Carbon::parse($plan_detail->updated_at)->format('Y年m月d日 h:i') }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#plan_detail-{{ $plan_detail->id }}-update-modal">
                                <i class="fa fa-edit"></i>
                                編集
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#plan_detail-{{ $plan_detail->id }}-delete-modal">
                                <i class="fa fa-trash"></i>
                                削除
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $plan_details->appends(request()->all())->render() }}
        </div>
    </section>

    <!-- 新規追加モーダル -->
    <div class="modal fade" id="plan_detail-create-modal" tabindex="-1"
         role="dialog" aria-labelledby="plan_detail-create-modal-label">
        <div class="modal-dialog" role="document">
            <form action="{{ url('/admin/setting/plan_details') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"
                            id="plan_detail-create-modal-label">
                            <i class="fa fa-plus"></i>
                            プラン詳細追加
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">プラン名</label>
                            <div class="col-md-6">
                                <select name="plan_detail[plan_id]" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}" {{ old('plan_detail.plan_id')==$plan->id?"selected":""}}>{{ $plan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">期間</label>
                            <div class="col-md-6">
                                <input type="number" name="plan_detail[period]" value="{{ old('plan_detail.period') }}" required>ヶ月
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">金額</label>
                            <div class="col-md-6">
                                <input type="number" name="plan_detail[price]" value="{{ old('plan_detail.price') }}">円
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">備考</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="plan_detail[note]">{{ old('plan_detail.note') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            キャンセル
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            追加する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach($plan_details as $plan_detail)
        <!-- 編集モーダル -->
        <div class="modal fade" id="plan_detail-{{ $plan_detail->id }}-update-modal" tabindex="-1"
             role="dialog" aria-labelledby="plan_detail-{{ $plan_detail->id }}-update-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/setting/plan_details/'. $plan_detail->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="plan_detail[id]" value="{{ $plan_detail->id }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="plan_detail-{{ $plan_detail->id }}-update-modal-label">
                                <i class="fa fa-edit"></i>
                                プラン詳細編集
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">プラン名</label>
                                <div class="col-md-6">
                                    <select name="plan_detail[plan_id]" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->id }}" {{ old('plan_detail.plan_id', $plan_detail->plan->id)==$plan->id?"selected":"" }}>{{ $plan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">期間</label>
                                <div class="col-md-6">
                                    <input type="number" name="plan_detail[period]" value="{{ old('plan_detail.period', $plan_detail->period) }}" required>ヶ月
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">金額</label>
                                <div class="col-md-6">
                                    <input type="number" name="plan_detail[price]" value="{{ old('plan_detail.price', $plan_detail->price) }}">円
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">備考</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="plan_detail[note]">{{ old('plan_detail.note', $plan_detail->note) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                キャンセル
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                                更新する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /編集モーダル -->

        <!-- 削除モーダル -->
        <div class="modal fade" id="plan_detail-{{ $plan_detail->id }}-delete-modal" tabindex="-1"
             role="dialog" aria-labelledby="plan_detail-{{ $plan_detail->id }}-delete-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/setting/plan_details/'. $plan_detail->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="plan_detail-{{ $plan_detail->id }}-delete-modal-label">
                                <i class="fa fa-trash"></i>
                                {{ $plan_detail->name }}削除確認
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
        <!-- /削除モーダル -->
    @endforeach

    <script>
        window.onload = function () {
        };
    </script>

@endsection
