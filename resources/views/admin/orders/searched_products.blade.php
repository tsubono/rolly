<table class="table">
    <thead>
    <tr id="search_customer_modal_box__body_inner_header">
        <th>ID</th>
        <th>名前</th>
        <th>決定</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->brand->name }} {{ $product->model_name }}</td>
            <td>
                <button type="button" class="btn btn-default btn-sm set-product"
                        data-id="{{ $product->id }}">
                    決定
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script>
    // 商品選択時
    $('.set-product').click(function () {

        var id = $(this).data('id');

        $.ajax({
            type: 'post',
            data: {
                'id': id,
                '_token': '{{csrf_token()}}'
            },
            url: '{{ url('/admin/products/ajaxSearch') }}'
        }).done(function (data) {

            $('#productArea').css('display', 'none');

            data = $.parseJSON(data);

            $('[name="order[product_id]"]').val(data["product_id"]);
            $('[name="product[id]"]').val(data["product_id"]);

            $('#product_id_disp').text(data["product_id"]);
            $('[name=product_id_disp]').val(data["product_id"]);
            $('#product_name_disp').text(data["product_name_disp"]);
            $('[name=product_name_disp]').val(data["product_name_disp"]);
            $('#plan_name_disp').text(data["plan_name_disp"]);
            $('[name=plan_name_disp]').val(data["plan_name_disp"]);
            $('#plan_price_disp').text(data["plan_price_disp"].toLocaleString());
            $('[name=plan_price_disp]').val(data["plan_price_disp"].toLocaleString());

            $('[name="product[status]"]').val(data["status"]);

            $('.product_result_area').html('');

            $('#product-search-modal').modal('hide');
            $('#product-search-modal').trigger('click');

            $('#productArea').fadeIn();

        }).fail(function (data) {
            // alert("error!");
        });
    });
</script>
