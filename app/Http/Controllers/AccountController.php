<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;
use YooKassa\Client;
use Illuminate\Support\Facades\Auth;
use YooKassa\Model\NotificationEventType;


class AccountController extends Controller
{
    const secret_key = 'live_kUbXSgyewQtI2jUedr_FGpErLmnuM3rjdqNf7X9oUrU';
    const secret_key_test = 'test_uJsQW7Szh6jzPFHFPGkeG3Ot6mN3EV5eUytUDGvhHUg';
    const secret_login = '833066';
    const secret_login_test = '836972';

    public function signin(){
        return view('auth.signin');
    }
    public function start(){
        return view('auth.start');
    }
    public function home(){
        if(Auth::check()){
            return view('account.home');
        }else{
            return redirect()->to('/signin');
        }
    }
    public function tarifs(){
        return view('account.tafifs');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|not_regex:/.*http.*/',
            'password' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $user = new User();
        $user->fill($request->only($user->getFillable()));
        $user->save();
        Auth::login($user);
    }
    public function pay(Request $request){
        return view('account.pay');
    }
    public function pay_checke(){
        $source = file_get_contents('php://input');
        $json = json_decode($source, true);
        Log::debug('yomanylog'.print_r($json, true));
        if($json['event'] == 'payment.succeeded' && $json['object']['status']){
            $now = new \DateTime();
            if($json['object']['amount']['value']==100){
                $now->modify('+1 month');
            }else{
                $now->modify('+3 month');
            }
            $now =$now->format('Y-m-d h:m:s');
            $user = User::where('email',$json['object']['description'])->update(['pay_status'=>'1','pay_to'=>$now]);
        }

        return response()->json(['message' => 'Done!'], 200);
    }
    public function success(Request $request){
        return view('account.success');
    }
    public function pay_query(Request $request){
        $user = User::where('email',$request['email'])->update(['pay_status'=>'2']);
        $url = 'https://mathsimple.ru/success';
        $password ='836972:test_uJsQW7Szh6jzPFHFPGkeG3Ot6mN3EV5eUytUDGvhHUg';
        $password ='833066:live_kUbXSgyewQtI2jUedr_FGpErLmnuM3rjdqNf7X9oUrU';
        if($request['pay_book'] == 1){
            $url = 'https://mathsimple.ru/book_dounload?mera='.$request['mera'];
            $password ='833066:live_kUbXSgyewQtI2jUedr_FGpErLmnuM3rjdqNf7X9oUrU';
        }
        if(!isset($request['email'])){
            $request['email'] = '';
        }
        $data = array(
            'amount' => array(
                'value' => $request['pay'],
                'currency' => 'RUB',
            ),
            'capture' => true,
            'confirmation' => array(
                'type' => 'redirect',
                'return_url' => $url,
            ),
            'description' => $request['email'],
            'metadata' => array(
                'order_id' => 1,
            )
        );
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $ch = curl_init('https://api.yookassa.ru/v3/payments');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $password);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Idempotence-Key: ' . $this->gen_uuid()));-
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res, true);

        return redirect()->to($res['confirmation']['confirmation_url']);
    }

    public function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
