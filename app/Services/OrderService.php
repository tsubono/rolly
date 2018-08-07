<?php

namespace App\Services;


use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderShippingAddress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderService
{
    private $user;
    private $order;

    function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * DB用の整形データを返す
     */
    public function getCreditDataForDB($request)
    {
        $res = $request->input('order_credit', []);

        // 郵便番号
        if (!empty($res["zip01"]) && !empty($res["zip02"])) {
            $res["zip_code"] = $res["zip01"] . "-" . $res["zip02"];
        }
        // 電話番号
        if (!empty($res["tel01"]) && !empty($res["tel02"]) && !empty($res["tel03"])) {
            $res["tel"] = $res["tel01"] . "-" . $res["tel02"] . "-" . $res["tel03"];
        }
        // fax番号
        if (!empty($res["fax01"]) && !empty($res["fax02"]) && !empty($res["fax03"])) {
            $res["fax"] = $res["fax01"] . "-" . $res["fax02"] . "-" . $res["fax03"];
        }


        // ファイルたち
        // 新規登録時
        if (empty($res["id"])) {
            $res["doc_1"] = $this->uploadFile($request, 'doc_1');
            $res["doc_2"] = $this->uploadFile($request, 'doc_2');
        // 編集時
        } else {
            if (!isset($res["doc_1_edit"])) {
                $res["doc_1_edit"] = 0;
            }
            if ($request->hasFile('order_credit.doc_1') || $res["doc_1_edit"] == "1") {
                $res["doc_1"] = $this->uploadFile($request, 'doc_1');
            }
            if (!isset($res["doc_2_edit"])) {
                $res["doc_2_edit"] = 0;
            }
            if ($request->hasFile('order_credit.doc_2') || $res["doc_2_edit"] == "1") {
                $res["doc_2"] = $this->uploadFile($request, 'doc_2');
            }
        }

        return $res;
    }

    /**
     * ファイルをアップロードする
     */
    public function uploadFile($request, $type = NULL)
    {
        $path = "";

        $file = $request->file('order_credit.' . $type);

        if (!empty($file)) {
            $datetime = Carbon::now()->format('YmdHis');
            $filename = $datetime . mt_rand() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/credit_docs', $filename);

            $path = "/storage/credit_docs/" . $filename;
        }

        return $path;
    }

    /**
     * 既存のファイルを削除する
     *
     * @param  User $user
     */
    public function deleteFiles($order_credit)
    {
        if (!empty($order_credit->doc_1)) {
            unlink(public_path() . $order_credit->doc_1);
        }
        if (!empty($order_credit->doc_other)) {
            unlink(public_path() . $order_credit->doc_2);
        }
    }


}
