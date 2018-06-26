<table class="table">
    <thead>
    <tr id="search_customer_modal_box__body_inner_header">
        <th>会員ID</th>
        <th>お名前(カナ)</th>
        <th>メールアドレス</th>
        <th>決定</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->last_name }} {{ $user->first_name }}（{{ $user->last_name_kana }} {{ $user->first_name_kana }}）</td>
            <td>{{ $user->email }}</td>
            <td>
                <button type="button" class="btn btn-default btn-sm set-user" data-id="{{ $user->id }}">決定</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script>
    // 会員選択時
    $('.set-user').click (function() {
        var id = $(this).data('id');

        $.ajax({
            type: 'post',
            data: {
                'id': id,
                '_token': '{{csrf_token()}}'
            },
            url: '{{ url('/admin/users/ajaxSearch') }}'
        }).done(function (data) {

            $('#userArea').css('display', 'none');

            data = $.parseJSON(data);

            $('[name="user[id]"]').val(data["id"]);
            $('[name="order[user_id]"]').val(data["id"]);
            $('#user_id_disp').text(data["id"]);

            $('[name="user[last_name]"]').val(data["last_name"]);
            $('[name="user[first_name]"]').val(data["first_name"]);
            $('[name="user[last_name_kana]"]').val(data["last_name_kana"]);
            $('[name="user[first_name_kana]"]').val(data["first_name_kana"]);

            var mobileTelArray = data["mobile_tel"].split('-');
            $('[name="user[mobile_tel01]"]').val(mobileTelArray[0]);
            $('[name="user[mobile_tel02]"]').val(mobileTelArray[1]);
            $('[name="user[mobile_tel03]"]').val(mobileTelArray[2]);

            if (data["tel"] != "") {
                var telArray = data["tel"].split('-');
                $('[name="user[tel01]"]').val(telArray[0]);
                $('[name="user[tel02]"]').val(telArray[1]);
                $('[name="user[tel03]"]').val(telArray[2]);
            }

            var zipArray = data["zip_code"].split('-');
            $('[name="user[zip01]"]').val(zipArray[0]);
            $('[name="user[zip02]"]').val(zipArray[1]);
            $('[name="user[pref_id]"]').val(data["pref_id"]);
            $('[name="user[address1]"]').val(data["address1"]);
            $('[name="user[address2]"]').val(data["address2"]);

            $('.user_result_area').html('');

            $('#user-search-modal').modal('hide');
            $('#user-search-modal').trigger('click');

            $('#userArea').fadeIn();

        }).fail(function (data) {
            // alert("error!");
        });
    });
</script>
