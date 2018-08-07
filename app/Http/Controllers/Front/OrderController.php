<?php

namespace App\Http\Controllers\Front;

use App\Mail\ApplySentToAdmin;
use App\Mail\ApplySentToUser;
use App\Models\Order;
use App\Models\OrderCredit;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mail;

class OrderController extends Controller
{
    private $user;
    private $order;
    private $orderCredit;
    private $product;
    private $userService;
    private $orderService;

    public function __construct(User $user, Order $order, OrderCredit $orderCredit, Product $product, UserService $userService, OrderService $orderService)
    {
        $this->user = $user;
        $this->orderCredit = $orderCredit;
        $this->order = $order;
        $this->product = $product;
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        if (empty($request->input('product_id'))) {
            return redirect('/lineup');
        }
        $product = $this->product->findOrFail($request->input('product_id'));
        $user = Auth::user();

        return view('front.order.index', compact('user', 'product'));
    }

    public function postPayment(Request $request)
    {
        $create_order = $request->input('order');
        $product = $this->product->findOrFail($create_order['product_id']);
        $user = Auth::user();

        // 身分証明関連ファイルがあれば登録する
        $update = $this->userService->getDataForDB($request);
        $user->update($update);

        $create_order['order_date'] = Carbon::now();

        // 名義者情報作成
        $formOrderCredit = $this->orderService->getCreditDataForDB($request);
        $OrderCredit = $this->orderCredit->create($formOrderCredit);

        $create_order['order_credit_id'] = $OrderCredit->id;

        // 受注情報作成
        $order = $this->order->create($create_order);

        //　管理者にメール送信
        Mail::to(env('MAIL_TO', 'rolly-rental@daishin.jp.net'))->queue(new ApplySentToAdmin($order));
        if (!empty(env('MAIL_TO_2', ''))) {
            Mail::to(env('MAIL_TO_2', 'rolly-rental@daishin.jp.net'))->queue(new ApplySentToAdmin($order));
        }
        // ユーザーにメール送信
        Mail::to($order->user->email)->queue(new ApplySentToUser($order));

        session(['price' => $product->plan->getMonthlyPrice($product->plan->id)]);
        return redirect()->route('order.payment');
    }

    public function getPayment(Request $request)
    {
        $price = session('price', 0);
        return view('front.order.payment', compact('price'));
    }

    public function complete()
    {
        return view('front.order.complete');
    }
}
