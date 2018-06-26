<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class', 'note'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getMonthlyPrice($plan_id) {

        $price = 0;
        $plan_detail = PlanDetail::where('plan_id', $plan_id)->where('period', 1)->first();
        if (!empty($plan_detail)) {
            $price = $plan_detail->price;
        }
        return $price;
    }

}
