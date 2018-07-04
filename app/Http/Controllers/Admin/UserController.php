<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\User;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use App\Models\Order;

class UserController extends Controller
{
    private $user;
    private $order;
    private $brand;
    private $userService;
    private $orderService;

    public function __construct(User $user, Order $order, Brand $brand, UserService $userService, OrderService $orderService)
    {
        $this->user = $user;
        $this->order = $order;
        $this->brand = $brand;
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    /**
     * 会員一覧
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = $this->user->orderBy('created_at', 'desc')->paginate(15);

        $search = $request->get('search', []);

        $query = $this->user->query();

        foreach ($search as $key => $val) {
            if (($key != 'identification_status' && !empty($val)) || ($key == 'identification_status' && $val != -1)) {
                if ($key == 'name') {
                    $query->where(function ($q) use ($val) {
                        $q->where('last_name', 'like', '%' . $val . '%')
                            ->orWhere('first_name', 'like', '%' . $val . '%');
                    });
                } elseif ($key == 'identification_status') {
                    if ($val == 0) {
                        $val = null;
                    }
                    $query->where($key, $val);
                } else {
                    $query->where($key, 'like', '%' . $val . '%');
                }
            }
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.users.index', compact('users', 'search'));
    }

    /**
     * 会員新規作成表示
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brands = $this->brand->all();

        return view('admin.users.create', compact('brands'));
    }

    /**
     * 会員新規作成
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->input('user'), $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }

        $create = $this->userService->getDataForDB($request);

        $this->user->create($create);

        return redirect()->route('admin.users.index')->with('success', '会員を登録しました。');
    }

    /**
     * 会員詳細
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
    }

    /**
     * 会員編集表示
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $user = $this->user->findOrFail($id);
        $brands = $this->brand->all();

        return view('admin.users.edit', compact('user', 'brands'));
    }

    /**
     * 会員編集
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = $this->user->findOrFail($id);
        $update = $request->input('user');
        if (empty($update['password'])) {
            unset($update['password']);
        }
        $validator = Validator::make($update, $this->getRules($user->id), $this->getMessages());

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $update = $this->userService->getDataForDB($request);

        $user->update($update);

        return redirect()->route('admin.users.index')->with('success', '会員を更新しました。');
    }

    /**
     * 会員削除
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = $this->user->findOrFail($id);
        $this->userService->deleteFiles($user);
        $user->delete();

        // 受注関連情報を削除
        $orders = $this->order->where('user_id', $id)->get();
        foreach ($orders as $order) {
            if (!empty($order)) {
                $this->orderService->delete($order->id);
            }
        }

        return redirect()->route('admin.users.index')->with('success', '会員を削除しました。');
    }

    private function getRules($ignoreId = null)
    {
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
            'password' => 'min:6',
        ];
    }

    private function getMessages()
    {
        return [
//            'last_name_kana.regex' => '全角カタカナで入力してください。',
//            'first_name_kana.regex' => '全角カタカナで入力してください。',
            'zip01.digits' => '3文字で入力してください。',
            'zip02.digits' => '4文字で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'email.max' => 'メールアドレスを255文字以内で入力してください。',
            'email.unique' => '既に使用されているメールアドレスです。',
            // 'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードを6文字以上で入力してください。',
        ];
    }

    /**
     *会員一覧検索(ajax)
     *
     * @param  \Illuminate\Http\Request $request
     * @return $viewStr
     */
    public function ajaxSearchList(Request $request)
    {

        $search = $request->get('search');

        if (!empty($search)) {
            $users = $this->user
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name_kana', 'LIKE', "%{$search}%")
                ->orWhere('first_name_kana', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $users = $this->user->all();
        }

        $viewStr = View::make('admin.orders.searched_users')->with('users', $users)->render();
        echo $viewStr;
    }

    /**
     *会員検索(ajax)
     *
     * @param  \Illuminate\Http\Request $request
     * @return $user
     */
    public function ajaxSearch(Request $request)
    {

        $id = $request->get('id');
        $user = $this->user->findOrFail($id);

        echo json_encode($user);
    }
}
