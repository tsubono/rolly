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
        }
        if (!empty($res["id"] && ($request->hasFile('product.image1') || $res["image1_edit"] == "1"))) {
            $res["image1"] = $this->uploadFile($request, '1');
        }
        if (!empty($res["id"] && ($request->hasFile('product.image2') || $res["image2_edit"] == "1"))) {
            $res["image2"] = $this->uploadFile($request, '2');
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

        if (!empty($product->image)) {
            unlink(public_path(). $product->image);
        }
        if (!empty($product->image_600_layout)) {
            unlink(public_path(). $product->image_600_layout);
        }
        if (!empty($product->image_600_copy)) {
            unlink(public_path(). $product->image_600_copy);
        }
//        if (!empty($product->image_900_layout)) {
//            unlink(public_path(). $product->image_900_layout);
//        }
//        if (!empty($product->image_900_copy)) {
//            unlink(public_path(). $product->image_900_copy);
//        }
//        if (!empty($product->image_1200_layout)) {
//            unlink(public_path(). $product->image_1200_layout);
//        }
//        if (!empty($product->image_1200_copy)) {
//            unlink(public_path(). $product->image_1200_copy);
//        }
//        if (!empty($product->image_1500_layout)) {
//            unlink(public_path(). $product->image_1500_layout);
//        }
//        if (!empty($product->image_1500_copy)) {
//            unlink(public_path(). $product->image_1500_copy);
//        }
//        if (!empty($product->image_1800_layout)) {
//            unlink(public_path(). $product->image_1800_layout);
//        }
//        if (!empty($product->image_1800_copy)) {
//            unlink(public_path(). $product->image_1800_copy);
//        }
    }
}
