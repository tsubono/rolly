<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SettlementSentToAdmin;
use App\Mail\SettlementSentToUser;
use App\Models\Order;
use App\Models\OrderCredit;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mail;

class OrderController extends Controller
{
    private $order;
    private $orderCredit;
    private $user;
    private $product;
    private $userService;
    private $orderService;

    public function __construct(Order $order, OrderCredit $orderCredit, User $user, Product $product, UserService $userService, OrderService $orderService)
    {
        $this->order = $order;
        $this->orderCredit = $orderCredit;
        $this->user = $user;
        $this->product = $product;
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    /**
     * 受注一覧
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $orders = $this->order->orderBy('created_at', 'desc')->paginate(15);

        $search = $request->get('search', []);

        $query = $this->order->query();

        foreach ($search as $key => $val) {
            if (($key!='identification_status' && !empty($val)) || ($key=='identification_status' && $val!=-1)) {
                if ($key == 'brand_id') {
                    $query->whereHas('product', function ($q) use ($key, $val) {
                        $q->where($key, $val);
                    });
                } elseif ($key == 'model_name') {
                    $query->whereHas('product', function ($q) use ($key, $val) {
                        $q->where($key, 'like', '%' . $val . '%');
                    });
                } elseif ($key == 'name') {
                    $query->whereHas('user', function ($q) use ($key, $val) {
                        $q->where(function ($q) use ($val) {
                            $q->where('last_name', 'like', '%' . $val . '%')
                                ->orWhere('first_name', 'like', '%' . $val . '%');
                        });
                    });
                } elseif ($key == 'identification_status') {
                    if ($val==0) {
                        $val = null;
                    }
                    $query->whereHas('user', function ($q) use ($key, $val) {
                        $q->where($key, $val);
                    });
                } else {
                    $query->where($key, 'like', '%' . $val . '%');
                }
            }
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.orders.index', compact('orders', 'search'));
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

        // 商品更新
        $product = $this->product->findOrFail($request->input('product')['id']);
        $product->update($request->input('product'));

        $order = $request->input('order');
        if (!empty($order["settlement_date"])) {
            $order["return_date"] = Carbon::parse($order["settlement_date"])->addMonth(1)->subDay(1);
        } else {
            $order["return_date"] = NULL;
        }

        // 名義人情報更新
        $formOrderCredit = $this->orderService->getCreditDataForDB($request);
        $orderCredit = $this->orderCredit->create($formOrderCredit);

        $order['order_credit_id'] = $orderCredit->id;
        // 受注更新
        $order = $this->order->create($order);

        if (!empty($order->settlement_date)) {
//            //　管理者にメール送信
//            Mail::to(env('MAIL_TO', 'rolly-rental@daishin.jp.net'))->queue(new SettlementSentToAdmin($order));
//            if (!empty(env('MAIL_TO_2', ''))) {
//                Mail::to(env('MAIL_TO_2', 'rolly-rental@daishin.jp.net'))->queue(new SettlementSentToAdmin($order));
//            }
//            // ユーザーにメール送信
//            Mail::to($order->user->email)->queue(new SettlementSentToUser($order));
        }

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

        // 商品更新
        $product = $this->product->findOrFail($request->input('product')['id']);
        $product->update($request->input('product'));

        // 受注更新
        $order = $this->order->findOrFail($id);
        $old_settlement_date = $order->settlement_date;

        $update_order = $request->input('order');
        if (!empty($update_order["settlement_date"])) {
            $update_order["return_date"] = Carbon::parse($update_order["settlement_date"])->addMonth(1)->subDay(1);
        } else {
            $update_order["return_date"] = NULL;
        }

        // 名義人情報更新
        $formOrderCredit = $this->orderService->getCreditDataForDB($request);

        if (empty($request->input('order_credit')['id'])) {
            $orderCredit = $this->orderCredit->create($formOrderCredit);
            $order['order_credit_id'] = $orderCredit->id;
        } else {
            $orderCredit = $this->orderCredit->findOrFail($request->input('order_credit')['id']);
            $orderCredit->update($formOrderCredit);
        }

        $order->update($update_order);


        if (!empty($order->settlement_date) && (empty($old_settlement_date) || !Carbon::parse($old_settlement_date)->isSameDay(Carbon::parse($order->settlement_date)))) {
            //　管理者にメール送信
//            Mail::to(env('MAIL_TO', 'rolly-rental@daishin.jp.netp'))->queue(new SettlementSentToAdmin($order));
//            if (!empty(env('MAIL_TO_2', ''))) {
//                Mail::to(env('MAIL_TO_2', 'rolly-rental@daishin.jp.net'))->queue(new SettlementSentToAdmin($order));
//            }
//            // ユーザーにメール送信
//            Mail::to($order->user->email)->queue(new SettlementSentToUser($order));
        }

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

    /**
     * 資料表示
     */
    public function getDocument(Request $request) {
        $url = $request->get('url', '');
        if (!empty($url)) {
            if (file_exists(public_path(). $url)) {
                return response()->file(public_path(). $url);
            } else {
                echo 'ファイルが不正です。再度アップロード依頼をだしてください。';
                exit;
            }
        }
    }
}
