<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Math;
use Illuminate\Mail\Mailable;
use Mail;
use Log;
use Cookie;
use function PHPUnit\Framework\isEmpty;
use function Psy\debug;

class MathController extends Controller
{

    public function index(){
        return view('desktop.index');
    }
    public function mera(Request $request){
        $primers = [];
        $math = new Math();
        $title = '1 кг = 1000 г, 1 г = 1 000 мг';
        if(!isset($request['mera_type'])){
            $request['mera_type'] = "mera_massa";
        }
        if($request['mera_type'] == "mera_massa"){
            $primers = $math->mera_massa();
        }elseif($request['mera_type'] == "mera_dlina"){
            $primers = $math->mera_dllina();
            $title = '1 м = 10 дм = 100 см = 1 000 мм';
        }elseif($request['mera_type'] == "mera_ploshad"){
            $title = '1 м = 10 дм = 100 см = 1 000 мм';
            $primers = $math->mera_ploshad();
        }elseif($request['mera_type'] == "mera_vrema"){
            $title = '1 ч = 60 мин, 1 мин = 60 сек';
            $primers = $math->mera_vrema();
        }
        if(!empty($primers)){
            $primers = $this->getrandomelement($primers);
        }
        return view('desktop.mera',['primers'=>$primers,'title'=>$title]);
    }
    public function book_dounload(Request $request){
        $primers = [];
        $math = new Math();
        if($request['mera']=='massa'){
            $primers = $math->mera_massa();
            $primers = $this->getrandomelement($primers,300);
        }
        if($request['mera']=='vrema'){
            $primers = $math->mera_vrema();
            $primers = $this->getrandomelement($primers,300);
        }
        if($request['mera']=='dllina'){
            $primers = $math->mera_dllina();
            $primers = $this->getrandomelement($primers,300);
        }
        if($request['mera']=='schet100'){
            $primers = $math->schet100();
        }
        if($request['mera']=='schet1000'){
            $primers = $math->schet100(1000);
        }

        Cookie::queue('massa', 'https://mathsimple.ru/book_dounload?mera='.$request['mera']);
        return view('desktop.book_dounload',['primers'=>$primers]);
    }
    public function rim(Request $request){
        $primers = [];
        $math = new Math();
        $end=100;
        if(isset($request['end'])){
            $end = $request['end'];
        }
        $primers = $math->rim($end);
        if(!empty($primers)){
            $primers = $this->getrandomelement($primers);
        }
        return view('desktop.rim',['primers'=>$primers]);
    }

    public function getrandomelement($array,$count=10) {
        $res = [];
        for($i=0;$i<$count;$i++){
            $pos=rand(0,sizeof($array)-1);
            $res[]=$array[$pos];
        }
        return $res;
    }

    public function clock(){
        return view('desktop.clock');
    }
    public function drob(){
        return view('desktop.drob');
    }
    public function comp(Request $request){
        $primers = [];
        $array_do = [];
        $array_do = $this->get_array_make($request, $array_do);
        if(isset($request)){
            for($i=0; $i<$request['count'] ; $i++){
                $row = [];
                $row['primer'] = random_int($request['start'],$request['end']);
                $row['value'] = random_int($request['start'],$request['end']);
                $primers[] = $row;
            }
        }
        return view('desktop.comp',['primers'=>$primers]);
    }
    public function tasks(Request $request){
        $primers = [];
        $array_do = [];

        $array_do = $this->get_array_make($request, $array_do);
        if($request['count']>100){
            $request['count']=100;
        }
        if(isset($request)){
            for($i=0; $i<$request['count'] ; $i++){
                $row = [];
                $a = random_int($request['start'],$request['end']);
                $b = random_int($request['start'],$request['end']);
                $do = array_rand($array_do);
                if($array_do[$do] == 'sum'){
                    if(random_int(0,1) == 1){
                        $sum = $a+$b;
                        $row['primer'] = "$a + x = $sum";
                        $row['value'] = $b;
                    }else{
                        $sum = $a+$b;
                        $row['primer'] = "x + $a = $sum";
                        $row['value'] = $b;
                    }
                }
                if($array_do[$do] == 'diff'){
                    if(! isset($request['minus']) || $request['minus'] != 'on'){
                        $b = random_int($request['start'],$a);
                    }
                    if(random_int(0,1) == 1){
                        $diff = $a - $b;
                        $row['primer'] = "$a - x = $diff";
                        $row['value'] = $b;
                    }else{
                        $diff = $a - $b;
                        $row['primer'] = "x - $b = $diff";
                        $row['value'] = $a;
                    }
                }
                if($array_do[$do] == 'mult'){
                    while ($a*$b>$request['end']*10) {
                        $a = random_int($request['start'],$request['end']);
                        $b = random_int($request['start'],$request['end']);
                    }
                    if(random_int(0,1) == 1){
                        $mult = $a * $b;
                        $row['primer'] = "$a * x = $mult";
                        $row['value'] = $b;
                    }else{
                        $mult = $a * $b;
                        $row['primer'] = "x * $a = $mult";
                        $row['value'] = $b;
                    }
                }
                if($array_do[$do] == 'div'){
                    if($request['start'] <= 0){
                        $request['start'] = 1;
                    }
                    $b = random_int($request['start'],$request['end']);
                    while ($a%$b!=0 && $b!=0) {
                        $b = random_int($request['start'],$request['end']);
                    }
                    if(random_int(0,1) == 1){
                        $div = $a/$b;
                        $row['primer'] = "$a : x = $div";
                        $row['value'] = $b;
                    }else{
                        $div = $a/$b;
                        $row['primer'] = "x : $b = $div";
                        $row['value'] = $a;
                    }
                }
                $primers[] = $row;
            }

        }
        return view('desktop.tasks',['primers'=>$primers,]);
    }
    public function mental(){
        return view('desktop.mental');
    }
    public function mental_start(Request $request){
        $array_do = [];
        $array_do = $this->get_array_make($request, $array_do);
        if($request['count']>100){
            $request['count']=100;
        }
        $request['count_value']=3;
        $primers = $this->get_primers($request,$array_do);
        return view('desktop.mental',['primers'=>$primers]);
    }
    public function make(Request $request)
    {
        $array_do = [];
        $array_do = $this->get_array_make($request, $array_do);
        if($request['count']>100){
            $request['count']=100;
        }

        $primers = $this->get_primers($request, $array_do);
        return view('desktop.make',['primers'=>$primers,]);
    }

    public function get_primers($request, $array_do){
        $primers = [];
        $count_value_request = 2;
        if(isset($request['count_value']) && $request['count_value'] !=0){
            $count_value_request = $request['count_value'];
        }

        if(isset($request)){
            for($i=0; $i<$request['count']; $i++){
                $values = [];
                $row = [];
                for($count_value=1; $count_value<=$count_value_request; $count_value++){
                    $v = random_int($request['start'],$request['end']);
                    if(isset($values[$count_value-1]) ){
                        do {
                            $v = random_int($request['start'],$request['end']);
                        } while ($v == $values[$count_value-1]);
                    }
                    $values[] =$v;
                }
                $a = random_int($request['start'],$request['end']);
                $b = random_int($request['start'],$request['end']);

                $do = array_rand($array_do);
                $row['primer'] ='';
                $row['value'] =0;
                if($array_do[$do] == 'sum'){
                    foreach ($values as $key => $value){
                        if($key ==  count($values) - 1){
                            $row['primer'] .="$value = ";
                        }else{
                            $row['primer'] .="$value + ";
                        }
                        $row['value'] +=$value;
                    }
                }
                if($array_do[$do] == 'diff'){
                    if(! isset($request['minus']) || $request['minus'] != 'on'){
                        $b = random_int($request['start'],$a);
                    }
                    $row['primer'] = "$a - $b = ";
                    $row['value'] = $a-$b;
                }
                if($array_do[$do] == 'mult'){
                    while ($a*$b>$request['end']*10) {
                        $a = random_int($request['start'],$request['end']);
                        $b = random_int($request['start'],$request['end']);
                    }
                    $row['primer'] = "$a x $b = ";
                    $row['value'] = $a*$b;
                }
                if($array_do[$do] == 'div'){
                    if($request['start'] == 0 || $request['start'] == 1){
                        $request['start'] = 2;
                    }
                    $b = random_int($request['start'],$request['end']);
                    while ($a%$b!=0) {
                        $a = random_int(3,$request['end']);
                        $b = random_int($request['start'],$a-1);
                    }
                    $row['primer'] = "$a : $b = ";
                    $row['value'] = $a/$b;
                }
                $primers[] = $row;
            }
        }
        //dd($primers);
        return $primers;
    }

    public function get_array_make(Request $request, $array_do){
        if(isset($request['sum'])){
            $array_do[] = 'sum';
        }
        if(isset($request['diff'])){
            $array_do[] = 'diff';
        }
        if(isset($request['mult'])){
            $array_do[] = 'mult';
        }
        if(isset($request['div'])){
            $array_do[] = 'div';
        }
        if(empty($array_do)){
            $array_do[] = 'sum';
        }
        if($request['start'] == null){
            $request['start'] = 0;
        }
        if($request['end'] == null){
            $request['end'] = 10;
        }
        if($request['count'] == null){
            $request['count'] = 10;
        }

        if($request['end']<$request['start']){
            $end = $request['end'];
            $request['end'] = $request['start'];
            $request['start'] = $end;
        }
        return $array_do;
    }

    public function send_msg(Request $request){

        try {
            $subject = "Обратная связь";
            $msg = $request['message'];
            $email = 'mathsimple@yandex.ru';

            Mail::send('emails.feadback', ['msg' => $msg,'email' => $request['email'],'name' => $request['name']], function($message) use ($msg, $subject, $email) {
                $message
                    ->from(env('MAIL_USERNAME'), 'Обратная связь')
                    ->to($email)
                    ->subject($subject);
            });
        } catch (\Exception $e) {
            Log::error("Email sending failed: ".$e->getMessage());
        }
        return view('desktop.index');
    }

    public function print(Request $request)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($request['print_text'].'</br>');
        $mpdf->Output();
        return view('desktop.index');
    }


    public function table(Request $request){
        $primers = [];
        for($i=0; $i<10 ; $i++){
            $row = [];
            $a = random_int(0,10);
            if(isset($request['mult_value'])){
                $b = $request['mult_value'];
            }else{
                $b = random_int(0,10);
            }
            $mult = $a * $b;
            $row['primer'] = "$a x $b = ";
            $row['value'] = $mult;
            $primers[] = $row;
        }

        return view('desktop.table',['primers'=>$primers,]);
    }
    public function check(Request $request)
    {
        return view('desktop.index');
    }

}
