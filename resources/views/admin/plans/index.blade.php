@extends('admin.layouts.default')

@section('title', 'プラン一覧 | プラン管理 | ローリー管理画面')

@section('content-header')
    <h1>
        プラン管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/plans') }}">プラン管理</a></li>
        <li class="active">プラン一覧</li>
    </ol>
@endsection

@section('content')

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">プラン一覧</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#plan-create-modal">
                    <i class="fa fa-plus"></i>
                    プラン登録
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>プラン名</th>
                    <th>クラス</th>
                    <th>備考</th>
                    <th>更新日</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->class }}</td>
                        <td>{!! nl2br(e( $plan->note )) !!}</td>
                        <td>{{ \Carbon\Carbon::parse($plan->updated_at)->format('Y年m月d日 h:i') }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#plan-{{ $plan->id }}-update-modal">
                                <i class="fa fa-edit"></i>
                                編集
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#plan-{{ $plan->id }}-delete-modal">
                                <i class="fa fa-trash"></i>
                                削除
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $plans->appends(request()->all())->render() }}
        </div>
    </section>

    <!-- 新規追加モーダル -->
    <div class="modal fade" id="plan-create-modal" tabindex="-1"
         role="dialog" aria-labelledby="plan-create-modal-label">
        <div class="modal-dialog" role="document">
            <form action="{{ url('/admin/setting/plans') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"
                            id="plan-create-modal-label">
                            <i class="fa fa-plus"></i>
                            プラン追加
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">名前</label>
                            <div class="col-md-6">
                                <input type="text" name="plan[name]" value=""
                                       class="form-control" required/>
                            </div>
                        </div>
                        <br><br>
                        <div class="clearfix"></div>
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">クラス</label>
                            <div class="col-md-6">
                                <input type="text" name="plan[class]" value=""
                                       class="form-control" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group input_row">
                            <label class="control-label col-md-3">備考</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="plan[note]">{{ old('plan.note') }}</textarea>
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

    @foreach($plans as $plan)
        <!-- 編集モーダル -->
        <div class="modal fade" id="plan-{{ $plan->id }}-update-modal" tabindex="-1"
             role="dialog" aria-labelledby="plan-{{ $plan->id }}-update-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/setting/plans/'. $plan->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="plan[id]" value="{{ $plan->id }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="plan-{{ $plan->id }}-update-modal-label">
                                <i class="fa fa-edit"></i>
                                {{ $plan->name }}編集
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">名前</label>
                                <div class="col-md-6">
                                    <input type="text" name="plan[name]" value="{{ old('plan.name', $plan->name) }}"
                                           class="form-control" required/>
                                </div>
                            </div>
                            <br><br>
                            <div class="clearfix"></div>
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">クラス</label>
                                <div class="col-md-6">
                                    <input type="text" name="plan[class]" value="{{ old('plan.class', $plan->class) }}"
                                           class="form-control" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="form-group input_row">
                                <label class="control-label col-md-3">備考</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="plan[note]">{{ old('plan.note', $plan->note) }}</textarea>
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
        <div class="modal fade" id="plan-{{ $plan->id }}-delete-modal" tabindex="-1"
             role="dialog" aria-labelledby="plan-{{ $plan->id }}-delete-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/setting/plans/'. $plan->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="plan-{{ $plan->id }}-delete-modal-label">
                                <i class="fa fa-trash"></i>
                                {{ $plan->name }}削除確認
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
