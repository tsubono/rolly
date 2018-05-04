<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * ブランドー一覧
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = $this->brand->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * ブランド新規作成表示
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * ブランド新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->brand->create($request->input('brand'));

        return redirect()->route('admin.brands.index')->with('success', 'ブランドを登録しました。');
    }

    /**
     * 親ブランド詳細
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
    }

    /**
     * ブランド編集表示
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
    }

    /**
     * ブランド編集
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $brand = $this->brand->findOrFail($id);
        $brand->update($request->input('brand'));

        return redirect()->route('admin.brands.index')->with('success', 'ブランドを更新しました。');
    }

    /**
     * ブランド削除
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $brand = $this->brand->findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'ブランドを削除しました。');
    }

}
