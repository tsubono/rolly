<script>
    $(function() {

        // 郵便番号から自動入力
        $('#user-zip-btn').click(function () {
            AjaxZip3.zip2addr('user[zip01]', 'user[zip02]', 'user[pref_id]', 'user[address1]');
        });
        $('#order_shipping_address-zip-btn').click(function () {
            AjaxZip3.zip2addr('order_shipping_address[zip01]', 'order_shipping_address[zip02]', 'order_shipping_address[pref_id]', 'order_shipping_address[address1]');
        });
        $('#order_credit-zip-btn').click(function () {
            AjaxZip3.zip2addr('order_credit[zip01]', 'order_credit[zip02]', 'order_credit[pref_id]', 'order_credit[address1]');
        });

        // 会員検索ボタン押下時
        $('#user_search_btn').click(function () {

            $('.user_result_area').html('');

            $.ajax({
                type: 'post',
                data: {
                    'search': $('#user_search_input').val(),
                    '_token': '{{csrf_token()}}'
                },
                url: '{{ url('/admin/users/ajaxSearchList') }}'
            }).done(function (data) {
                $('.user_result_area').html(data);
            }).fail(function (data) {
            });
        });

        // 商品の追加ボタン押下時
        $('#product_search_btn').click(function () {

            $('.product_result_area').html('');

            $.ajax({
                type: 'post',
                data: {
                    'search': $('#product_search_input').val(),
                    'brand_search': $('#product_search_brand_id').val(),
                    '_token': '{{csrf_token()}}',
                },
                url: '{{ url('/admin/products/ajaxSearchList') }}'
            }).done(function (data) {
                $('.product_result_area').html(data);
            }).fail(function (data) {
            });
        });

        $('#user_reset').click (function() {
            $('#userArea').css('display', 'none');
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        // 登録ボタン押下時
        $('#submitBeforeBtn').click (function() {
            // ユーザーが選択されているかどうか
            if ($('#userArea').css('display') == 'none') {
                alert('注文者情報を指定してください。');
                return false;
            }
            // 商品が選択されているかどうか
            if ($('#productArea').css('display') == 'none') {
                alert('レンタル商品情報を指定してください。');
                return false;
            }

            $('#submitBtn').trigger('click');
        });
    });

</script>