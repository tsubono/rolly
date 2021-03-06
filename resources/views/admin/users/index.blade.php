@extends('admin.layouts.default')

@section('title', '会員一覧 | 会員管理 | ローリー管理画面')

@section('content-header')
    <h1>
        会員管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/users') }}">会員管理</a></li>
        <li class="active">会員一覧</li>
    </ol>
@endsection

@section('content')

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">検索</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('/admin/users') }}" method="get">
                <div class="form-group col-sm-6">
                    <label>会員番号</label>
                    <input type="text" class="form-control" name="search[id]"
                           value="{{ isset($search['id'])?$search['id']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>お名前</label>
                    <input type="text" class="form-control" name="search[name]"
                           value="{{ isset($search['name'])?$search['name']:'' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>メールアドレス</label>
                    <input type="text" class="form-control" name="search[email]"
                           value="{{ isset($search['email'])?$search['email']:'' }}">
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

                <button type="submit" class="btn btn-success pull-right">検索する</button>
            </form>
        </div>
    </section>

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">会員一覧</h3>
            <div class="box-tools">
                <a href="{{ url('/admin/users/create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    会員登録
                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>会員番号</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>本人確認</th>
                    <th>更新日</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->last_name. $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->identification_status==1)
                                確認済み
                            @elseif ($user->identification_status==2)
                                <span>確認済み（未）</span>
                            @else
                                <span style="color: red;">未確認</span>
                            @endif
                        </td>
                        <td>{{ $user->updated_at->format('Y年m月d日 h:i:s') }}</td>
                        <td>
                            <a href="{{ url('/admin/users/'. $user->id. '/edit') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                                編集
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#user-{{ $user->id }}-delete-modal">
                                <i class="fa fa-trash"></i>
                                削除
                            </button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->appends(request()->all())->render() }}
        </div>
    </section>
    @foreach($users as $user)
        <div class="modal fade" id="user-{{ $user->id }}-delete-modal" tabindex="-1" role="dialog"
             aria-labelledby="user-{{ $user->id }}-delete-modal-label">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/admin/users/'. $user->id) }}" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="user-{{ $user->id }}-delete-modal-label">
                                <i class="fa fa-trash"></i>
                                {{ $user->last_name. $user->first_name }}削除確認
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
@endsection
