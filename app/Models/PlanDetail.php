<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanDetail extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id', 'period', 'price', 'note'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

}
