<?php

namespace App\Http\Controllers\Front;

use App\Mail\RegisterNotifySent;
use App\Mail\RegisterReplySent;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
    private $product;
    private $userService;

    public function __construct(User $user, Order $order, Product $product, UserService $userService)
    {
        $this->user = $user;
        $this->order = $order;
        $this->product = $product;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $product = $this->product->findOrFail($request->input('product_id'));
        $user = Auth::user();

        return view('front.order.index', compact('user', 'product'));
    }

    public function postPayment(Request $request)
    {
        $product = $this->product->findOrFail($request->input('product')['id']);
        $user = Auth::user();

        // 身分証明関連ファイルがあれば登録する
        $update = $this->userService->getDataForDB($request);
        $user->update($update);

        // 受注情報作成
        $this->order->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'order_date' => Carbon::now(),
        ]);

        session(['price' => $product->plan->getMonthlyPrice($product->plan->id)]);
        return redirect()->route('order.payment');
    }

    public function getPayment(Request $request)
    {
        $price = session('price', 0);
        return view('front.order.payment', compact('price'));
    }

    public function getComplete()
    {
        return view('front.order.complete');
    }
}
