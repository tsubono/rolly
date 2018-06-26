<?php

namespace App\Services;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserService
{
    private $user;

    function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * DB保存用データを返す
     */
    public function getDataForDB(Request $request)
    {
        $res = $request->input('user');

        // 郵便番号
        if (!empty($res["zip01"]) && !empty($res["zip02"])) {
            $res["zip_code"] = $res["zip01"] . "-" . $res["zip02"];
        }
        // 携帯電話番号
        if (!empty($res["mobile_tel01"]) && !empty($res["mobile_tel02"]) && !empty($res["mobile_tel03"])) {
            $res["mobile_tel"] = $res["mobile_tel01"] . "-" . $res["mobile_tel02"] . "-" . $res["mobile_tel03"];
        }
        // 電話番号
        if (!empty($res["tel01"]) && !empty($res["tel02"]) && !empty($res["tel03"])) {
            $res["tel"] = $res["tel01"]. "-". $res["tel02"]. "-". $res["tel03"];
        }

        // 身分証明書類
        if ($request->hasFile('user.identification_doc')) {
            $res["identification_doc"] = $this->uploadFile($request, true);
        }
        // その他証明書類
        if ($request->hasFile('user.doc_other')) {
            $res["doc_other"] = $this->uploadFile($request);
        }

        return $res;
    }

    /**
     * ファイルをアップロードする
     */
    public function uploadFile($request, $identification_doc_flg=false)
    {
        $path = "";

        if (!empty($request->input('product.id'))) {
            // 既存ファイルがあれば削除
            $user = $this->user->findOrFail($request->input('user.id'));
            if (!empty($user->identification_doc)) {
                unlink(public_path(). $user->identification_doc);
            }
        }

        if ($identification_doc_flg) {
            $file = $request->file('user.identification_doc');

            if (!empty($file)) {
                $datetime = Carbon::now()->format('YmdHis');
                $filename = $datetime . mt_rand() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/identification_docs', $filename);

                $path = "/storage/identification_docs/" . $filename;
            }
        } else {
            $file = $request->file('user.doc_other');

            if (!empty($file)) {
                $datetime = Carbon::now()->format('YmdHis');
                $filename = $datetime . mt_rand() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/doc_others', $filename);

                $path = "/storage/doc_others/" . $filename;
            }
        }

        return $path;
    }

    /**
     * 既存のファイルを削除する
     *
     * @param  User $user
     */
    public function deleteFiles($user)
    {
        if (!empty($user->identification_doc)) {
            unlink(public_path() . $user->identification_doc);
        }
        if (!empty($user->doc_other)) {
            unlink(public_path() . $user->doc_other);
        }
    }
}
