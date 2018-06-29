<?php

namespace App\Http\Controllers\Front;

use App\Mail\RegisterSentToAdmin;
use App\Mail\RegisterSentToUser;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mail;

class RegisterController extends Controller
{
    private $user;
    private $userService;

    public function __construct(User $user, UserService $userService)
    {
        $this->user = $user;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return view('front.register.index');
    }

    public function confirm(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->input('user'), $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            return redirect('/#registerArea')
                ->withErrors($validator)
                ->withInput();
        }

        $user = $request->get('user');
        return view('front.register.confirm', compact('user'));
    }

    public function postComplete(Request $request)
    {
        if ($request->get('back', "")==1) {
            return redirect('/#registerArea')
                ->withInput();
        }

        // バリデーション
        $validator = Validator::make($request->input('user'), $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            return redirect('/#registerArea')
                ->withErrors($validator)
                ->withInput();
        }
        
        $create = $this->userService->getDataForDB($request);
        $user = $this->user->create($create);

        //　管理者にメール送信
        Mail::to(env('MAIL_TO', 'tsubono@ga-design.jp'))->queue(new RegisterSentToAdmin($user, $request->input('user.password')));
        // ユーザーにメール送信
        Mail::to($user->email)->queue(new RegisterSentToUser($user, $request->input('user.password')));

        return redirect()->route('register.complete');
    }

    public function getComplete()
    {
        return view('front.register.complete');
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
                'confirmed'
            ],
            'password' => 'required|min:6',
        ];
    }

    private function getMessages() {
        return [
//            'last_name_kana.regex' => '全角カタカナで入力してください。',
//            'first_name_kana.regex' => '全角カタカナで入力してください。',
            'zip01.digits' => '郵便番号を正しく入力してください。',
            'zip02.digits' => '郵便番号を正しく入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'email.max' => 'メールアドレスを255文字以内で入力してください。',
            'email.unique' => '既に使用されているメールアドレスです。',
            'email.confirmed' => '確認用メールアドレスと一致しません。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードを6文字以上で入力してください。',
        ];
    }
}
