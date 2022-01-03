<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at', 'date'];
    protected $table = 'feedbacks';
    
    const images_path = '/images/feedbacks/';
    const image_width = 300;
    const scan_width = 1200;
    const scan_resized_prefix = 'resized_';
    const scan_resized_width = 355;
    const limit = 3;
    
    public function setDateAttribute($value)
    {
        if(empty($value)){
            $this->attributes['date'] = NULL;
        }else{
            $datetime = \Datetime::createFromFormat('d.m.Y', $value);
            if($datetime instanceof \DateTime){
                $this->attributes['date'] = $datetime->format('Y-m-d');
            }
        }
    }
}
