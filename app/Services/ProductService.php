<?php

namespace App\Services;


use App\Models\OrderDetail;
use App\Models\OrderShippingAddress;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductService
{
    private $product;

    function __construct(Product $product) {
        $this->product = $product;
    }

    /**
     * DB保存用データを返す
     */
    public function getDataForDB(Request $request)
    {
        $res = $request->input('product');

        // ファイルたち
        if (empty($res["id"])) {
            $res["image1"] = $this->uploadFile($request, '1');
            $res["image2"] = $this->uploadFile($request, '2');
            $res["image3"] = $this->uploadFile($request, '3');
            $res["image4"] = $this->uploadFile($request, '4');
        }
        if (!empty($res["id"]) && ($request->hasFile('product.image1') || $res["image1_edit"] == "1")) {
            $res["image1"] = $this->uploadFile($request, '1');
        }
        if (!empty($res["id"]) && ($request->hasFile('product.image2') || $res["image2_edit"] == "1")) {
            $res["image2"] = $this->uploadFile($request, '2');
        }
        if (!empty($res["id"]) && ($request->hasFile('product.image3') || $res["image3_edit"] == "1")) {
            $res["image3"] = $this->uploadFile($request, '3');
        }
        if (!empty($res["id"]) && ($request->hasFile('product.image4') || $res["image4_edit"] == "1")) {
            $res["image4"] = $this->uploadFile($request, '4');
        }

        return $res;
    }

    /**
     * 商品ファイルをアップロードする
     *
     * @param  \Illuminate\Http\Request $request
     * @param  $size
     * @param  $type
     * @return $path
     */
    public function uploadFile($request, $type)
    {
        $path = "";

        if (!empty($request->input('product.id'))) {
            // 既存ファイルがあれば削除
            $product = $this->product->findOrFail($request->input('product.id'));
            $column = 'image'. $type;
            if (!empty($product->$column)) {
                unlink(public_path(). $product->$column);
            }
        }

        $file = $request->file('product.image'.$type);

        if (!empty($file)) {
            $datetime = Carbon::now()->format('YmdHis');
            $filename = $datetime . mt_rand() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/product_files', $filename);

            $path = "/storage/product_files/" . $filename;
        }

        return $path;
    }

    /**
     * 既存のファイルを削除する
     *
     * @param  Product $product
     */
    public function deleteFiles($product) {

        if (!empty($product->image1)) {
            unlink(public_path(). $product->image1);
        }
        if (!empty($product->image2)) {
            unlink(public_path(). $product->image2);
        }
        if (!empty($product->image3)) {
            unlink(public_path(). $product->image3);
        }
        if (!empty($product->image4)) {
            unlink(public_path(). $product->image4);
        }

    }
}
