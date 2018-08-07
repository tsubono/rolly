<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderCredit extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'zip_code', 'pref_id', 'address1', 'address2', 'tel', 'relationship', 'doc_1', 'doc_2'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
