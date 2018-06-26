@extends('admin.layouts.default')

@section('title', '会員登録 | 会員管理 | ローリー管理画面')

@section('content-header')
    <h1>
        会員管理
        <small>ローリー管理画面</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}">ホーム</a></li>
        <li><a href="{{ url('/admin/users') }}">会員管理</a></li>
        <li class="active">会員登録</li>
    </ol>
@endsection

@section('content')

    <section class="box box-default">
        <div class="box-header">
            <h3 class="box-title">会員登録</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ url('/admin/users') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                        <label for="user-last_name" class="control-label col-md-3">
                            お名前姓
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-last_name" name="user[last_name]" value="{{ old('user.last_name') }}" class="form-control" required placeholder=""/>
                            @if ($errors->has('last_name'))
                                @foreach ($errors->get('last_name') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        <label for="user-first_name" class="control-label col-md-3">
                            お名前名
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-first_name" name="user[first_name]" value="{{ old('user.first_name') }}" class="form-control" required placeholder=""/>
                            @if ($errors->has('first_name'))
                                @foreach ($errors->get('first_name') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name_kana') ? 'has-error' : '' }}">
                        <label for="user-last_name_kana" class="control-label col-md-3">
                            ふりがな姓
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-last_name_kana" name="user[last_name_kana]" value="{{ old('user.last_name_kana') }}" class="form-control" required placeholder=""/>
                            @if ($errors->has('last_name_kana'))
                                @foreach ($errors->get('last_name_kana') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('first_name_kana') ? 'has-error' : '' }}">
                        <label for="user-first_name_kana" class="control-label col-md-3">
                            ふりがな名
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-first_name_kana" name="user[first_name_kana]" value="{{ old('user.first_name_kana') }}" class="form-control" required placeholder=""/>
                            @if ($errors->has('first_name_kana'))
                                @foreach ($errors->get('first_name_kana') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->has('mobile_tel01')||$errors->has('mobile_tel02')||$errors->has('mobile_tel03')) ? 'has-error' : '' }}">
                        <label for="user-mobile_tel01" class="control-label col-md-3">
                            携帯電話番号
                        </label>
                        <div class="col-md-6 form-inline">
                            <input type="number" id="user-mobile_tel01" name="user[mobile_tel01]" class="form-control" value="{{ old('user.mobile_tel01') }}" required>
                            -
                            <input type="number" id="user-mobile_tel02" name="user[mobile_tel02]" class="form-control" value="{{ old('user.mobile_tel02') }}" required>
                            -
                            <input type="number" id="user-mobile_tel03" name="user[mobile_tel03]" class="form-control" value="{{ old('user.mobile_tel03') }}" required>
                            @if ($errors->has('mobile_tel01'))
                                @foreach ($errors->get('mobile_tel01') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if ($errors->has('mobile_tel02'))
                                @foreach ($errors->get('mobile_tel02') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if ($errors->has('mobile_tel03'))
                                @foreach ($errors->get('mobile_tel03') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->has('tel01')||$errors->has('tel02')||$errors->has('tel03')) ? 'has-error' : '' }}">
                        <label for="user-tel01" class="control-label col-md-3">
                            お電話番号
                        </label>
                        <div class="col-md-6 form-inline">
                            <input type="number" id="user-tel01" name="user[tel01]" class="form-control" value="{{ old('user.tel01') }}">
                            -
                            <input type="number" id="user-tel02" name="user[tel02]" class="form-control" value="{{ old('user.tel02') }}">
                            -
                            <input type="number" id="user-tel03" name="user[tel03]" class="form-control" value="{{ old('user.tel03') }}">
                            @if ($errors->has('tel01'))
                                @foreach ($errors->get('tel01') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if ($errors->has('tel02'))
                                @foreach ($errors->get('tel02') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if ($errors->has('tel03'))
                                @foreach ($errors->get('tel03') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->has('zip01')||$errors->has('zip02')) ? 'has-error' : '' }}">
                        <label for="user-zip01" class="control-label col-md-3">
                            郵便番号
                        </label>
                        <div class="col-md-6 input_zip form-inline">
                            〒
                            <input type="number" id="user-zip01" name="user[zip01]" class="form-control" value="{{ old('user.zip01') }}" required>
                            -
                            <input type="number" id="user-zip02" name="user[zip02]" class="form-control" value="{{ old('user.zip02') }}" required>
                            <span>
                                <button type="button" id="zip-btn" class="btn btn-default btn-sm">郵便番号から自動入力</button>
                            </span>
                            @if ($errors->has('zip01'))
                                @foreach ($errors->get('zip01') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if ($errors->has('zip02'))
                                @foreach ($errors->get('zip02') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('pref_id') ? 'has-error' : '' }}">
                        <label for="user-pref_id" class="control-label col-md-3">
                            都道府県
                        </label>
                        <div class="col-md-6">
                            <select id="user-pref_id" name="user[pref_id]" class="form-control" required>
                                @foreach(config('pref') as $key => $name)
                                    <option value="{{ $key }}" {{ old('user.pref_id') == $key ? "selected" : "" }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('pref_id'))
                                @foreach ($errors->get('pref_id') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address1') ? 'has-error' : '' }}">
                        <label for="user-address1" class="control-label col-md-3">
                            市区町村・番地
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-address1" name="user[address1]" value="{{ old('user.address1') }}" class="form-control" required placeholder="市区町村"/>
                            @if ($errors->has('address1'))
                                @foreach ($errors->get('address1') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : '' }}">
                        <label for="user-address2" class="control-label col-md-3">
                            ビル・マンション等
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-address2" name="user[address2]" value="{{ old('user.address2') }}" class="form-control" placeholder="番地・ビル名"/>
                            @if ($errors->has('address2'))
                                @foreach ($errors->get('address2') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="user-email" class="control-label col-md-3">
                            メールアドレス
                        </label>
                        <div class="col-md-6">
                            <input type="email" id="user-email" name="user[email]" value="{{ old('user.email') }}" class="form-control" required placeholder=""/>
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="user-password" class="control-label col-md-3">
                            パスワード
                        </label>
                        <div class="col-md-6">
                            <input type="password" id="user-password" name="user[password]" class="form-control" required placeholder="※6文字以上で入力してください。"/>
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3">希望</label>
                        <div class="col-md-6">
                            <select name="user[brand_id]" class="form-control">
                                <option value=""></option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('user.brand_id')==$brand->id?"selected":"" }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('brand_id'))
                                @foreach ($errors->get('brand_id') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('birthday') ? 'has-error' : '' }}">
                        <label for="user-birthday" class="control-label col-md-3">
                            生年月日
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-birthday" name="user[birthday]" value="{{ old('user.birthday') }}" class="form-control" placeholder=""/>
                            @if ($errors->has('birthday'))
                                @foreach ($errors->get('birthday') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('identification_doc') ? 'has-error' : '' }}">
                        <label for="user-identification_doc" class="control-label col-md-3">
                            身分証明書類
                        </label>
                        <div class="col-md-6">
                            <input class="upload_file" name="user[identification_doc]" type="file"
                                   multiple="" accept="">
                            @if ($errors->has('identification_doc'))
                                @foreach ($errors->get('identification_doc') as $error)
                                    <div class="text-identification_doc">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('identification_doc') ? 'has-error' : '' }}">
                        <label for="user-identification_doc" class="control-label col-md-3">
                            その他の証明書類
                        </label>
                        <div class="col-md-6">
                            <input class="upload_file" name="user[doc_other]" type="file"
                                   multiple="" accept="">
                            @if ($errors->has('doc_other'))
                                @foreach ($errors->get('doc_other') as $error)
                                    <div class="text-doc_other">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('identification_no') ? 'has-error' : '' }}">
                        <label for="user-identification_no" class="control-label col-md-3">
                            身分証No
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="user-identification_no" name="user[identification_no]" value="{{ old('user.identification_no') }}" class="form-control" placeholder=""/>
                            @if ($errors->has('identification_no'))
                                @foreach ($errors->get('identification_no') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('identification_status') ? 'has-error' : '' }}">
                        <label for="user-identification_status" class="control-label col-md-3">
                            本人確認状況
                        </label>
                        <div class="col-md-6">
                            <select name="user[identification_status]" class="form-control">
                                <option value="">未確認</option>
                                <option value="1" {{  old('user.identification_status')==1?"selected":"" }}>確認済み</option>
                            </select>
                            @if ($errors->has('identification_status'))
                                @foreach ($errors->get('identification_status') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                        <label for="user-note" class="control-label col-md-3">
                            備考
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="user[note]">{{ old('user.note') }}</textarea>
                            @if ($errors->has('note'))
                                @foreach ($errors->get('note') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                この内容で登録する
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="box-footer">
            <a href="{{ url('/admin/users') }}" class="btn btn-sm btn-default">
                <i class="fa fa-chevron-left"></i>
                会員一覧へ戻る
            </a>
        </div>
    </section>

    <script>
        window.onload = function () {
            $('#user-birthday').datepicker({
                format: 'yyyy-mm-dd'
            });

            $('#zip-btn').click(function(){
                AjaxZip3.zip2addr('user[zip01]', 'user[zip02]', 'user[pref_id]', 'user[address1]');
            });

            $("input.upload_file").fileinput({
                maxFilePreviewSize: 10240,
                showUpload: false,
                maxFileCount: 1,
                browseClass: 'btn btn-info fileinput-browse-button',
                browseLabel: '',
                showRemove: false,
                showZoom: false
            });
        }
    </script>

@endsection
