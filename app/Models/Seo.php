<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at'];
    
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = self::urlToPath($value);
    }
    
    public static function urlToPath($value){
        
        if (filter_var($value, FILTER_VALIDATE_URL) !== FALSE) {
            $value = parse_url($value, PHP_URL_PATH);
        }
        
        if(strlen($value)===0){
            $value = '/';
        }
        
        if(strlen($value) > 1 && substr($value, 0, 1) === '/'){
            $value = substr($value, 1, strlen($value)-1);
        }
        
        if(strlen($value) > 1 && substr($value, strlen($value)-1) === '/'){
            $value = substr($value, 0, strlen($value)-1);
        }

        return $value;
    }
}
