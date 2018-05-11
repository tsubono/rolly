<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    private $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    /**
     * プランー一覧
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans = $this->plan->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.plans.index', compact('plans'));
    }

    /**
     * プラン新規作成表示
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * プラン新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->plan->create($request->input('plan'));

        return redirect()->route('admin.plans.index')->with('success', 'プランを登録しました。');
    }

    /**
     * 親プラン詳細
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
     * プラン編集表示
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
     * プラン編集
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $plan = $this->plan->findOrFail($id);
        $plan->update($request->input('plan'));

        return redirect()->route('admin.plans.index')->with('success', 'プランを更新しました。');
    }

    /**
     * プラン削除
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $plan = $this->plan->findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'プランを削除しました。');
    }

}
