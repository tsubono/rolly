@extends('front/layouts.default')

@section('title', '登録情報 | MY PAGE | 時計レンタル ROLLY')

@section('content')
    <style>
        .alert-success {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .text-danger {
            color: red;
        }
    </style>
    <div class="mypage">
        <section class="mainimg">
            <div class="wrap">
                <h1 class="title"><img src="{{ asset('img/scene/tit_scene.png') }}" alt="MY PAGE"></h1>
            </div>
        </section>
        <div class="breadcrumb"><a href="/">TOP</a> &gt; <a href="{{ url('mypage') }}">MY PAGE</a> &gt; 登録情報</div>
        <div class="wrap cf">
            <!-- サイドバーPC -->
        @include('front.components.side')
        <!--/ サイドバーPC -->
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="contents">
                <form action="{{ url('mypage/edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user[id]" value="{{ $user->id }}">
                    <dl class="confirm1__list">
                        <dt>お客様姓</dt>
                        <dd class="confirm1__name">
                            <input type="text" value="{{ old('user.last_name', $user->last_name) }}" name="user[last_name]" required>
                        </dd>
                        <dt>お客様名</dt>
                        <dd class="confirm1__name">
                            <input type="text" value="{{ old('user.first_name', $user->first_name) }}" name="user[first_name]" required>
                        </dd>
                        <dt>ふりがな姓</dt>
                        <dd class="confirm1__name">
                            <input type="text" value="{{ old('user.last_name_kana', $user->last_name_kana) }}" name="user[last_name_kana]" required>
                        </dd>
                        <dt>ふりがな名</dt>
                        <dd class="confirm1__name">
                            <input type="text" value="{{ old('user.first_name_kana', $user->first_name_kana) }}" name="user[first_name_kana]" required>
                        </dd>
                        <dt>携帯電話番号</dt>
                        <dd class="confirm1__tel">
                            <input type="text" value="{{ old('user.mobile_tel01', !empty($user->mobile_tel) ? explode("-", $user->mobile_tel)[0] : "") }}" name="user[mobile_tel01]" required>&nbsp;-&nbsp;
                            <input type="text" value="{{ old('user.mobile_tel02', !empty($user->mobile_tel) ? explode("-", $user->mobile_tel)[1] : "") }}" name="user[mobile_tel02]" required>&nbsp;-&nbsp;
                            <input type="text" value="{{ old('user.mobile_tel03', !empty($user->mobile_tel) ? explode("-", $user->mobile_tel)[2] : "") }}" name="user[mobile_tel03]" required>
                        </dd>
                        <dt>お電話番号</dt>
                        <dd class="confirm1__tel">
                            <input type="text" value="{{ old('user.tel01', !empty($user->tel) ? explode("-", $user->tel)[0] : "") }}" name="user[tel01]" >&nbsp;-&nbsp;
                            <input type="text" value="{{ old('user.tel02', !empty($user->tel) ? explode("-", $user->tel)[1] : "") }}" name="user[tel02]" >&nbsp;-&nbsp;
                            <input type="text" value="{{ old('user.tel03', !empty($user->tel) ? explode("-", $user->tel)[2] : "") }}" name="user[tel03]" >
                        </dd>
                        <dt>郵便番号</dt>
                        <dd class="confirm1__address1">
                            <input type="text" value="{{ old('user.zip01', !empty($user->zip_code) ? explode("-", $user->zip_code)[0] : "") }}" maxlength="3" name="user[zip01]" required>&nbsp;-&nbsp;
                            <input type="text" value="{{ old('user.zip02', !empty($user->zip_code) ? explode("-", $user->zip_code)[1] : "") }}" maxlength="4" name="user[zip02]" required>
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
                        </dd>
                        <dt>都道府県</dt>
                        <dd class="confirm1__address2">
                            <select name="user[pref_id]" id="address1" required>
                                @foreach(config('pref') as $key => $name)
                                    <option value="{{ $key }}" {{ old('user.pref_id', $user->pref_id) == $key ? "selected" : "" }} required>{{ $name }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="zip-btn">郵便番号から自動入力</button>
                        </dd>
                        <dt>市区町村・番地</dt>
                        <dd class="confirm1__address3">
                            <input type="text" value="{{ old('user.address1', $user->address1) }}" name="user[address1]" required>
                        </dd>
                        <dt>ビル・マンション等</dt>
                        <dd class="confirm1__address4">
                            <input type="text" value="{{ old('user.address2', $user->address2) }}" name="user[address2]" >
                        </dd>
                        <dt>メールアドレス</dt>
                        <dd class="confirm1__mail">
                            <input type="email" value="{{ old('user.email', $user->email) }}" name="user[email]" required>
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </dd>
                        <dt>希望</dt>
                        <dd class="confirm1__clock">
                            <select name="user[brand_id]" >
                                <option value="">希望なし</option>
                                @foreach(\App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}" {{ old('user.brand_id', $user->brand_id)==$brand->id?"selected":"" }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </dd>
                        <dt>生年月日</dt>
                        <dd class="confirm1__birthday">
                            <input type="date" value="{{ old('user.birthday', !empty($user->birthday)?$user->birthday->format('Y-m-d'):'') }}" name="user[birthday]" >
                        </dd>
                        <dt>身分証明書</dt>
                        <dd class="confirm1__file">
                            @if (!empty($user->identification_doc))
                                <div id="identification_doc_old">
                                    登録済み
                                    <button id="identification_doc_update" type="button">更新する</button>
                                </div>
                                <input type="file" name="user[identification_doc]" style="display: none;">
                            @else
                                <input type="file" name="user[identification_doc]">
                            @endif
                                <input type="hidden" name="user[identification_doc_flg]" value="false">
                                {{--<img src="https://placehold.jp/24/cccccc/999999/300x200.jpg?text=%E8%BA%AB%E5%88%86%E8%A8%BC%E6%98%8E%E6%9B%B8" alt="">--}}
                        </dd>
                        <dt>その他の証明書類</dt>
                        <dd class="confirm1__file">
                            @if (!empty($user->doc_other))
                                <div id="doc_other_old">
                                    登録済み
                                    <button id="doc_other_update" type="button">更新する</button>
                                </div>
                                <input type="file" name="user[doc_other]" style="display: none;">
                            @else
                                <input type="file" name="user[doc_other]">
                            @endif
                                <input type="hidden" name="user[doc_other_flg]" value="false">
                            {{--<img src="https://placehold.jp/24/cccccc/999999/300x200.jpg?text=%E3%81%9D%E3%81%AE%E4%BB%96%E3%81%AE%E8%A8%BC%E6%98%8E%E6%9B%B8%E9%A1%9E" alt="">--}}
                        </dd>
                        <dt>備考</dt>
                        <dd>
                            <textarea name="user[note]" >{{ old('user.note', $user->note) }}</textarea>
                        </dd>
                    </dl>
                    <button class="confirm1__btn" type="submit">この内容で登録する</button>
                </form>
            </div>
            <!-- サイドバー sp -->
        @include('front.components.side_sp')
        <!--/ サイドバー sp -->
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#identification_doc_update').click (function() {
            $('#identification_doc_old').css('display', 'none');
            $('[name="user[identification_doc]"]').fadeIn();
            $('[name="user[identification_doc_flg]"]').val(1);
        });
        $('#doc_other_update').click (function() {
            $('#doc_other_old').css('display', 'none');
            $('[name="user[doc_other]"]').fadeIn();
            $('[name="user[doc_other_flg]"]').val(1);
        });
    </script>
@endpush
