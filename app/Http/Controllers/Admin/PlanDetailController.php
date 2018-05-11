<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\PlanDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanDetailController extends Controller
{
    private $plan;
    private $planDetail;

    public function __construct(Plan $plan, PlanDetail $planDetail)
    {
        $this->plan = $plan;
        $this->planDetail = $planDetail;
    }

    /**
     * プラン詳細ー一覧
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans= $this->plan->all();
        $plan_details = $this->planDetail->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.plan_details.index', compact('plans', 'plan_details'));
    }

    /**
     * プラン詳細新規作成表示
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * プラン詳細新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->planDetail->create($request->input('plan_detail'));

        return redirect()->route('admin.plan_details.index')->with('success', 'プラン詳細を登録しました。');
    }

    /**
     * 親プラン詳細詳細
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
     * プラン詳細編集表示
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
     * プラン詳細編集
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $planDetail = $this->planDetail->findOrFail($id);
        $planDetail->update($request->input('plan_detail'));

        return redirect()->route('admin.plan_details.index')->with('success', 'プラン詳細を更新しました。');
    }

    /**
     * プラン詳細削除
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $planDetail = $this->planDetail->findOrFail($id);
        $planDetail->delete();

        return redirect()->route('admin.plan_details.index')->with('success', 'プラン詳細を削除しました。');
    }

}
