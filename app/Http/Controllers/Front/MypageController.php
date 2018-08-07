<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class MypageController extends Controller
{
    private $user;
    private $order;
    private $userService;

    public function __construct(User $user, Order $order, UserService $userService)
    {
        $this->middleware('auth');

        $this->user = $user;
        $this->order = $order;
        $this->userService = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.mypage.index');
    }

    public function getEdit(Request $request) {
        $user = Auth::user();
        return view('front.mypage.edit', compact('user'));
    }

    public function postEdit(Request $request) {

        $user = $this->user->findOrFail($request->input('user')['id']);

        $validator = Validator::make($request->input('user'), $this->getRules($user->id), $this->getMessages());

        if ($validator->fails()) {
            return redirect()->route('front.mypage.edit')
                ->withErrors($validator)
                ->withInput();
        }
        $update = $this->userService->getDataForDB($request);

        // 身分証明書類更新
        if ($request->hasFile('user.identification_doc') && $update['identification_doc_flg']==1) {
            unlink(public_path(). $user->identification_doc);
        }
        // その他証明書類更新
        if ($request->hasFile('user.doc_other') && $update['doc_other_flg']==1) {
            unlink(public_path(). $user->doc_other);
        }
        // その他証明書類2更新
        if ($request->hasFile('user.doc_other_2') && $update['doc_other_2_flg']==1) {
            unlink(public_path(). $user->doc_other_2);
        }
        // その他証明書類3更新
        if ($request->hasFile('user.doc_other_3') && $update['doc_other_3_flg']==1) {
            unlink(public_path(). $user->doc_other_3);
        }
        $user->update($update);

        return redirect()->route('front.mypage.edit')->with('success', '登録情報を更新しました。');
    }

    public function status(Request $request) {

        $user = Auth::user();

        $currentOrder = $this->order->where('user_id', $user->id)->orderBy('return_date', 'desc')->first();
        if (empty($currentOrder)) {
            $currentOrder = new Order();
        }

        return view('front.mypage.status', compact('user', 'currentOrder'));

    }

    private function getRules($ignoreId = null) {
        return [
//            'last_name_kana' => 'regex:/[ァ-ヶ]/u',
//            'first_name_kana' => 'regex:/[ァ-ヶ]/u',
            'zip01' => 'digits:3',
            'zip02' => 'digits:4',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($ignoreId)->whereNull('deleted_at'),
            ],
//            'password' => 'required|min:6',
        ];
    }

    private function getMessages() {
        return [
//            'last_name_kana.regex' => '全角カタカナで入力してください。',
//            'first_name_kana.regex' => '全角カタカナで入力してください。',
            'zip01.digits' => '3文字で入力してください。',
            'zip02.digits' => '4文字で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'email.max' => 'メールアドレスを255文字以内で入力してください。',
            'email.unique' => '既に使用されているメールアドレスです。',
//            'password.required' => 'パスワードを入力してください。',
//            'password.min' => 'パスワードを6文字以上で入力してください。',
        ];
    }
}
