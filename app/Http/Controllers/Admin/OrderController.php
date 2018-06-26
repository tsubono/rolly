<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class OrderController extends Controller
{
    private $order;
    private $user;
    private $userService;

    public function __construct(Order $order, User $user, UserService $userService)
    {
        $this->order = $order;
        $this->user = $user;
        $this->userService = $userService;
    }

    /**
     * 受注一覧
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->order->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * 受注新規作成表示
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.orders.create');
    }

    /**
     * 受注新規作成
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->input('user'), $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            return redirect()->route('admin.orders.create')
                ->withErrors($validator)
                ->withInput();
        }

        // ユーザー更新
        $user = $this->user->findOrFail($request->input('user')['id']);
        $user->update($this->userService->getDataForDB($request));

        // 受注更新
        $order = $request->input('order');
        if (!empty($order["settlement_date"])) {
            $order["return_date"] = Carbon::parse($order["settlement_date"])->addMonth(1);
        } else {
            $order["return_date"] = NULL;
        }
        $this->order->create($order);

        return redirect()->route('admin.orders.index')->with('success', '受注情報を登録しました。');
    }

    /**
     * 受注詳細
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
     * 受注編集表示
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $order = $this->order->findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    /**
     * 受注編集
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $validator = Validator::make($request->input('user'), $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            return redirect()->route('admin.orders.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        // ユーザー更新
        $user = $this->user->findOrFail($request->input('user')['id']);
        $user->update($this->userService->getDataForDB($request));

        // 受注更新
        $order = $this->order->findOrFail($id);
        $update_order = $request->input('order');
        if (!empty($update_order["settlement_date"])) {
            $update_order["return_date"] = Carbon::parse($update_order["settlement_date"])->addMonth(1);
        } else {
            $update_order["return_date"] = NULL;
        }
        $order->update($update_order);

        return redirect()->route('admin.orders.index')->with('success', '受注情報を更新しました。');
    }

    /**
     * 受注削除
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $order = $this->order->findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', '受注情報を削除しました。');
    }

    private function getRules($ignoreId = null) {
        return [
            'zip01' => 'digits:3',
            'zip02' => 'digits:4',
        ];
    }

    private function getMessages() {
        return [
            'zip01.digits' => '3文字で入力してください。',
            'zip02.digits' => '4文字で入力してください。',
        ];
    }
}
