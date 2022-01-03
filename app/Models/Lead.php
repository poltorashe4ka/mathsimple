<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'birthdate'];
    protected $fillable = ['brand','model','model_year','car_cost','inital_pay',
        'fio','place_reg','age','mobile_tel','credit_term','complectation','birthdate'];
    private static $comment_fields = [
        'form_type' => 'Тип',
        'form_id' => 'Форма-источник',
        'time' => 'Удобное время',
        'your_car' => 'Марка и модель авто сдваемого в tradein авто',
        'your_price' => 'Цена сдаваемого в tradein авто',
        'your_year' => 'Год сдаваемого в tradein авто',
        'your_extra' => 'Доп. инфо сдаваемого в tradein авто',
        'your_mileage' => 'Пробег сдаваемого в tradein авто',
    ];    
    
    public function setCarCostAttribute($value)
    {
        if(!empty($value)){
            $this->attributes['car_cost'] = preg_replace('~\D+~', '',$value);
        }else{
            $this->attributes['car_cost'] =  NULL;
        }
    }
    
    public function setMobileTelAttribute($value)
    {
        $this->attributes['mobile_tel'] = preg_replace('~\D+~', '',$value);
    }
    
    public function setBirthdateAttribute($value)
    {
        if(empty($value)){
            $this->attributes['birthdate'] = NULL;
        }else{
            $datetime = \DateTime::createFromFormat('d.m.Y', $value);
            if($datetime instanceof \DateTime){
                $this->attributes['birthdate'] = $datetime->format('Y-m-d');
            }
        }
    }
    
    public static function dateFromInput($input_value)
    {
        $datetime = \DateTime::createFromFormat('d.m.Y H:i:s', $input_value);
        return $datetime->format('Y-m-d H:i:s');
    }
    
    public static function getCommentFields(){
        return array_keys(self::$comment_fields);
    }
    
    public static function makeComment($fields){
        $comment_parts = [];
        
        foreach(self::$comment_fields as $field_name=>$field_description){
            if(!empty($fields[$field_name])){
                $comment_parts[] = $field_description.': '.$fields[$field_name];
            }
        }
        
        return implode(',', $comment_parts);
    }

    /**
     * Overriding object serialization function for export
     *
     * @return \Illuminate\Http\Response
     */
    public function toArray() {

        $data = parent::toArray();
               
        $data['created'] = $data['created_at'];
        
        if(!empty($data['birthdate'])){
            $datetime = new \DateTime($data['birthdate']);
            $data['birthdate'] = $datetime->format('d.m.Y');
        }

        unset($data['created_at']);
        unset($data['updated_at']);
        unset($data['id']);
        
        return $data;
    }
    
    public function calltouch ($request) {
        if ($request->input('session_id_smr')) { //если сессия для Самары есть
            $sessionId = $request->input('session_id_smr');
        } else { // иначе отправляем в кабинет России
            $sessionId = $request->input('session_id_reg');
        }        
        
        $ct_site_id = config('calltouch.id');
        $ct_host = config('calltouch.node');
        
        $posts = ['orderComment' => ''];

        if ($sessionId) {
            $posts['sessionId'] = $sessionId;
        }
        
        if ($request->input('fio')) $posts['fio'] = $request->input('fio');
        if ($request->input('mobile_tel')) {
            $mobile_tel = preg_replace('~\D+~', '', $request->input('mobile_tel'));
            if (mb_strlen($mobile_tel) ===  11 && mb_substr($mobile_tel,0,1) === '7') {
                $mobile_tel = mb_substr($mobile_tel,1,10);
            }
            $posts['phoneNumber'] = $mobile_tel;
        }
        if ($request->input('form_type')) $posts['subject'] = $request->input('form_type');
        
        if ($request->input('brand')) $posts['orderComment'] .= "Марка: ".$request->input('brand')."\n";
        if ($request->input('model')) $posts['orderComment'] .= "Модель: ".$request->input('model')."\n";
        if ($request->input('car_cost')) $posts['orderComment'] .= "Цена: ".$request->input('car_cost')."\n";
        if ($request->input('complectation')) $posts['orderComment'] .= "Комплектация: ".$request->input('complectation')."\n";
        if ($request->input('model_year')) $posts['orderComment'] .= "Год: ".$request->input('model_year')."\n";
        if ($request->input('birthdate')) $posts['orderComment'] .= "Дата рождения: ".$request->input('birthdate')."\n";
        if ($request->input('age')) $posts['orderComment'] .= "Возраст: ".$request->input('age')."\n";
        if ($request->input('place_reg')) $posts['orderComment'] .= "Адрес регистрации: ".$request->input('place_reg')."\n";
        if ($request->input('inital_pay')) $posts['orderComment'] .= "Ежемесячный платеж: ".$request->input('inital_pay')."\n";
        if ($request->input('credit_term')) $posts['orderComment'] .= "Срок кредитования: ".$request->input('credit_term')."\n";
        if ($request->input('your_car')) $posts['orderComment'] .= "Автомобиль клиента: ".$request->input('your_car')."\n";
        if ($request->input('your_price')) $posts['orderComment'] .= "Цена автомобиля клиента: ".$request->input('your_price')."\n";
        if ($request->input('your_year')) $posts['orderComment'] .= "Год автомобиля клиента: ".$request->input('your_year')."\n";
        if ($request->input('your_extra')) $posts['orderComment'] .= "Комментарий клиента: ".$request->input('your_extra')."\n";
        if ($request->input('author')) $posts['orderComment'] .= "Автор отзыва: ".$request->input('author')."\n";
        if ($request->input('date')) $posts['orderComment'] .= "Дата покупки: ".$request->input('date')."\n";
        
        Log::debug("Sending calltouch lead:");
        Log::debug($posts);        

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=utf-8"));
        curl_setopt($ch, CURLOPT_URL,"https://".$ct_host."/calls-service/RestAPI/requests/".$ct_site_id."/register/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posts));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $calltouch = curl_exec ($ch);
        curl_close ($ch);

        Log::debug("Calltouch response:");
        Log::debug($calltouch);
    }
}
