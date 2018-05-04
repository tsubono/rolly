<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Plan;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
{
    private $product;
    private $brand;
    private $plan;
    private $productService;

    public function __construct(Product $product, Brand $brand, Plan $plan, ProductService $productService)
    {
        $this->product = $product;
        $this->brand = $brand;
        $this->plan = $plan;
        $this->productService = $productService;
    }

    /**
     * 商品一覧
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->product->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    /**
     * 商品新規作成表示
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brands = $this->brand->all();
        $plans = $this->plan->all();

        return view('admin.products.create', compact('brands', 'plans'));
    }

    /**
     * 商品新規作成
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->productService->getDataForDB($request);
        $this->product->create($create);

        return redirect()->route('admin.products.index')->with('success', '商品を登録しました。');
    }

    /**
     * 商品詳細
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
     * 商品編集表示
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $product = $this->product->findOrFail($id);

        $brands = $this->brand->all();
        $plans = $this->plan->all();

        return view('admin.products.edit', compact('product', 'brands', 'plans'));
    }

    /**
     * 商品編集
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $product = $this->product->findOrFail($id);
        $update = $this->productService->getDataForDB($request);
        $product->update($update);

        return redirect()->route('admin.products.index')->with('success', '商品を更新しました。');
    }

    /**
     * 商品削除
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $product = $this->product->findOrFail($id);

        // ファイルたちを削除
        $this->productService->deleteFiles($product);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', '商品を削除しました。');
    }

    /**
     * 商品一覧検索(ajax)
     *
     * @param  \Illuminate\Http\Request $request
     * @return $viewStr
     */
    public function ajaxSearchList(Request $request)
    {

        $search = $request->get('search');
        $brand_search = $request->get('brand_search');
        $query = $this->product->query();

        // 検索条件: キーワードとカテゴリ
        if (!empty($search) && !empty($brand_search)) {

            $query
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('model_name', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('brand_id', $brand_search);

            // 検索条件: キーワード
        } elseif (!empty($search)) {
            $query->where('id', 'LIKE', "%{$search}%");
            $query->orWhere('model_name', 'LIKE', "%{$search}%");
            $query->orWhere('name', 'LIKE', "%{$search}%");

            // 検索条件: カテゴリ
        } elseif (!empty($brand_search)) {
            $query
                ->where('brand_id', $brand_search);
        }

        $products = $query->get();

        $viewStr = View::make('admin.orders.searched_products')->with('products', $products)->render();
        echo $viewStr;
    }

    /**
     * 商品検索(ajax)
     *
     * @param  \Illuminate\Http\Request $request
     * @return $viewStr
     */
    public function ajaxSearch(Request $request)
    {

        $id = $request->get('id');
        $index = $request->get('index');
        $user_id = $request->get('user_id');
        $order_id = $request->get('order_id');
        $json = $request->get('json');
        $product = $this->product->findOrFail($id);

        $viewStr = View::make('admin.orders.order_products')
            ->with('product', $product)->with('index', $index)
            ->with('user_id', $user_id)->with('order_id', $order_id)
            ->with('json', $json)
            ->render();

        echo $viewStr;
    }

}
