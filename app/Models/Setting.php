<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at'];
}
