<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'management_code', 'brand_id', 'model_number', 'model_name', 'serial_no', 'color', 'max_belt_length', 'image1', 'image2', 'image3', 'image4',
        'plan_id', 'status', 'note',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
