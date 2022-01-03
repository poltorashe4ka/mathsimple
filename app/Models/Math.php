<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Math extends Model
{
    use HasFactory;

    public function rim($end){
        $primers = [];
        for ($i=1;$i<$end; $i++){
            $p = [];
            $p["primer"] =$this->numberToRomanRepresentation($i) ;
            $p["value"] = $i;
            $primers[] = $p;
        }
        return array_values($primers);
    }

    private function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function mera_dllina(){
        return [["primer"=>"7 дм 4 см = … см", "value"=>"74"],
            ["primer"=>"2 см 6 мм = … мм", "value"=>"26"],
            ["primer"=>"2 дм 6 см = … см", "value"=>"26"],
            ["primer"=>"5 дм 1 см = … см", "value"=>"51"],
            ["primer"=>"9 дм 4 см = … см", "value"=>"94"],
            ["primer"=>"5 м 5 см = … см", "value"=>"505"],
            ["primer"=>"3 см 4 мм = … мм", "value"=>"34"],
            ["primer"=>"7 м 8 дм = … см", "value"=>"780"],
            ["primer"=>"9 м 2 см = … см", "value"=>"902"],
            ["primer"=>"5 см 7 мм = … мм", "value"=>"57"],
            ["primer"=>"6 дм 8 см = … см", "value"=>"68"],
            ["primer"=>"7 дм 3 см = … см", "value"=>"73"],
            ["primer"=>"4 м 8 дм = … дм", "value"=>"48"],
            ["primer"=>"8 дм 8 см = … см", "value"=>"88"],
            ["primer"=>"9 дм 7 см = … см", "value"=>"97"],
            ["primer"=>"5 дм 9 см = … см", "value"=>"59"],
            ["primer"=>"6 м 9 см = … см", "value"=>"609"],
            ["primer"=>"2 дм 8 см = … см", "value"=>"28"],
            ["primer"=>"3 м 6 дм = … см", "value"=>"360"],
            ["primer"=>"7 см 9 мм = … мм", "value"=>"79"],
            ["primer"=>"9 м 7 см = … см", "value"=>"907"],
            ["primer"=>"4 дм 9 см = … см", "value"=>"49"],
            ["primer"=>"8 м 4 дм = … дм", "value"=>"84"],
            ["primer"=>"7 дм 8 см = … см", "value"=>"78"],
            ["primer"=>"3 дм 0 см = … см", "value"=>"30"],
            ["primer"=>"2 см 9 мм = … мм", "value"=>"29"],
            ["primer"=>"7 дм 1 см = … см", "value"=>"71"],
            ["primer"=>"8 дм 4 см = … см", "value"=>"84"],
            ["primer"=>"6 дм 9 см = … см", "value"=>"69"],
            ["primer"=>"1 м 8 см = … см", "value"=>"108"],
            ["primer"=>"5 см 3 мм = … мм", "value"=>"53"],
            ["primer"=>"9 м 7 дм = … дм", "value"=>"97"],
            ["primer"=>"7 м 8 см = … см", "value"=>"708"],
            ["primer"=>"1 см 4 мм = … мм", "value"=>"14"],
            ["primer"=>"9 дм 9 см = … см", "value"=>"99"],
            ["primer"=>"6 дм 7 см = … см", "value"=>"67"],
            ["primer"=>"2 м 4 дм = … см", "value"=>"240"],
            ["primer"=>"9 дм 1 см = … см", "value"=>"91"],
            ["primer"=>"6 дм 2 см = … см", "value"=>"62"],
            ["primer"=>"3 дм 7 см = … см", "value"=>"37"],
            ["primer"=>"8 м 5 см = … см", "value"=>"805"],
            ["primer"=>"4 дм 7 мм = … мм", "value"=>"407"],
            ["primer"=>"8 м 3 дм = … см", "value"=>"830"],
            ["primer"=>"5 см 1 мм = … мм", "value"=>"51"],
            ["primer"=>"3 м 6 см = … см", "value"=>"306"],
            ["primer"=>"8 дм 5 см = … см", "value"=>"85"],
            ["primer"=>"4 м 9 дм = … дм", "value"=>"49"],
            ["primer"=>"1 дм 8 см = … см", "value"=>"18"],
            ["primer"=>"6 дм 5 см = … см", "value"=>"65"],
            ["primer"=>"3 см 2 мм = … мм", "value"=>"32"],
            ["primer"=>"9 дм 2 см = … см", "value"=>"92"],
            ["primer"=>"5 дм 6 см = … см", "value"=>"56"],
            ["primer"=>"3 дм 8 см = … см", "value"=>"38"],
            ["primer"=>"5 м 9 см = … см", "value"=>"509"],
            ["primer"=>"6 см 3 мм = … мм", "value"=>"63"],
            ["primer"=>"1 м 1 дм = … дм", "value"=>"11"],
            ["primer"=>"2 м 5 дм = … дм", "value"=>"25"],
            ["primer"=>"2 см 4 мм = … мм", "value"=>"24"],
            ["primer"=>"2 дм 4 см = … см", "value"=>"24"],
            ["primer"=>"56 м = … дм", "value"=>"560"],
            ["primer"=>"95 м = … дм", "value"=>"950"],
            ["primer"=>"740 дм = … м", "value"=>"74"],
            ["primer"=>"860 см = … дм", "value"=>"86"],
            ["primer"=>"15 дм = … см", "value"=>"150"],
            ["primer"=>"6 м 8 дм = … см", "value"=>"680"],
            ["primer"=>"4 м 2 см = … см", "value"=>"402"],
            ["primer"=>"8 дм 3 см = … см", "value"=>"83"],
            ["primer"=>"9 дм 6 см = … см", "value"=>"96"],
            ["primer"=>"6 см 7 мм = … мм", "value"=>"67"],
            ["primer"=>"2 дм 5 см = … см", "value"=>"25"],
            ["primer"=>"4 м 4 дм = … дм", "value"=>"44"],
            ["primer"=>"2 м 9 см = … см", "value"=>"209"],
            ["primer"=>"5 дм 7 см = … см", "value"=>"57"],
            ["primer"=>"6 дм 1 см = … см", "value"=>"61"],
            ["primer"=>"8 см 8 мм = … мм", "value"=>"88"],
            ["primer"=>"3 дм 9 см = … см", "value"=>"39"],
            ["primer"=>"3 дм 5 см = … см", "value"=>"35"],
            ["primer"=>"5 дм = … см", "value"=>"50"],
            ["primer"=>"8 м 6 дм = … дм", "value"=>"86"],
            ["primer"=>"9 м 3 см = … см", "value"=>"903"],
            ["primer"=>"2 м 8 дм = … дм", "value"=>"28"],
            ["primer"=>"4 м 6 дм = … дм", "value"=>"46"],
            ["primer"=>"44 м = … дм", "value"=>"440"],
            ["primer"=>"66 м = … дм", "value"=>"660"],
            ["primer"=>"4 м 5 дм = … дм", "value"=>"45"],
            ["primer"=>"8 м 9 дм = … см", "value"=>"890"],
            ["primer"=>"2 дм 7 см = … см", "value"=>"27"],
            ["primer"=>"10 см = … дм", "value"=>"1"],
            ["primer"=>"6 см 4 мм = … мм", "value"=>"64"],
            ["primer"=>"30 дм = … м", "value"=>"3"],
            ["primer"=>"8 см 2 мм = … мм", "value"=>"82"],
            ["primer"=>"40 дм = … м", "value"=>"4"],
            ["primer"=>"7 м 2 дм = … дм", "value"=>"72"],
            ["primer"=>"8 см 5 мм = … мм", "value"=>"85"],
            ["primer"=>"5 м 6 дм = … дм", "value"=>"56"],
            ["primer"=>"9 дм 8 см = … см", "value"=>"98"],
            ["primer"=>"4 см 7 мм = … мм", "value"=>"47"],
            ["primer"=>"9 дм 5 см = … см", "value"=>"95"],
            ["primer"=>"6 см 8 мм = … мм", "value"=>"68"],
            ["primer"=>"42 дм = … см", "value"=>"420"],
            ["primer"=>"9 м 6 дм = … см", "value"=>"960"],
            ["primer"=>"5 м 4 см = … см", "value"=>"540"],
            ["primer"=>"7 м 8 дм = … дм", "value"=>"78"],
            ["primer"=>"3 м 7 см = … см", "value"=>"307"],
            ["primer"=>"4 дм 2 см = … см", "value"=>"42"],
            ["primer"=>"5 дм 2 см = … см", "value"=>"52"],
            ["primer"=>"8 см 4 мм = … мм", "value"=>"84"],
            ["primer"=>"6 дм 4 см = … см", "value"=>"64"],
            ["primer"=>"2 дм 1 см = … см", "value"=>"21"],
            ["primer"=>"3 дм 4 см = … см", "value"=>"34"],
            ["primer"=>"18 дм = … см", "value"=>"180"],
            ["primer"=>"24 дм = … см", "value"=>"240"],
            ["primer"=>"36 см = … мм", "value"=>"360"],
            ["primer"=>"61 см = … мм", "value"=>"610"],
            ["primer"=>"20 мм = … см", "value"=>"2"],
            ["primer"=>"4 дм = … см", "value"=>"40"],
            ["primer"=>"6 дм = … см", "value"=>"60"],
            ["primer"=>"80 дм = … см", "value"=>"800"],
            ["primer"=>"60 см = … дм", "value"=>"6"],
            ["primer"=>"1 дм 5 мм = … мм", "value"=>"105"],
            ["primer"=>"20 см = … дм", "value"=>"2"],
            ["primer"=>"900 см = … дм", "value"=>"90"],
            ["primer"=>"6 м = … см", "value"=>"600"],
            ["primer"=>"4 м = … дм", "value"=>"40"],
            ["primer"=>"1 м 9 дм = … дм", "value"=>"19"],
            ["primer"=>"70 дм = … см", "value"=>"700"],
            ["primer"=>"80 дм = … м", "value"=>"8"],
            ["primer"=>"7 дм 6 см = … см", "value"=>"76"],
            ["primer"=>"7 м = … см", "value"=>"700"],
            ["primer"=>"1 м 7 дм = … дм", "value"=>"17"],
            ["primer"=>"3 м = … см", "value"=>"300"],
            ["primer"=>"8 дм = … см", "value"=>"80"],
            ["primer"=>"90 дм = … м", "value"=>"9"],
            ["primer"=>"6 дм 3 см = … см", "value"=>"63"],
            ["primer"=>"3 дм = … см", "value"=>"30"],
            ["primer"=>"9 дм 3 см = … см", "value"=>"93"],
            ["primer"=>"7 дм = … см", "value"=>"70"],
            ["primer"=>"5 дм 8 см = … см", "value"=>"58"],
            ["primer"=>"40 см = … дм", "value"=>"4"],
            ["primer"=>"2 дм 9 см = … см", "value"=>"29"],
            ["primer"=>"30 см = … мм", "value"=>"300"],
            ["primer"=>"9 см = … мм", "value"=>"90"],
            ["primer"=>"7 см 8 мм = … мм", "value"=>"78"],
            ["primer"=>"7 дм 2 см = … см", "value"=>"72"],
            ["primer"=>"80 см = … дм", "value"=>"8"],
            ["primer"=>"90 см = … дм", "value"=>"9"],
            ["primer"=>"50 мм = … см", "value"=>"5"],
            ["primer"=>"3 см = … мм", "value"=>"30"],
            ["primer"=>"60 мм = … см", "value"=>"6"],
            ["primer"=>"500 см = … дм", "value"=>"50"],
            ["primer"=>"7 см = … мм", "value"=>"70"],
            ["primer"=>"80 мм = … см", "value"=>"8"],
            ["primer"=>"1 дм = … мм", "value"=>"100"]];
    }
    public function mera_vrema(){
        $primers = [];
        for ($i=1;$i<60; $i++){
            for ($j=1;$j<60; $j++){
                $p = [];
                $rand=rand(0,2);
                if($rand == 1 && $i<24){
                    $p["primer"] = $i.' ч '.$j.' м = … м';
                }else{
                    $p["primer"] = $i.' м '.$j.' с = … с';
                }
                $p["value"] = $i*60+$j;
                $primers[] = $p;
            }
        }
        return array_values($primers);
    }
    public function schet100($end=100){
        $primers = [];
        for($i=1; $i<=400; $i++) {
            $row = [];
            $a = random_int(1, $end);
            $b = random_int(1, $end);
            $row['primer'] = '';
            $row['value'] = 0;
            if ($i <= 100) {
                $row['primer'] = "$a + $b = ";
                $row['value'] = $a + $b;
            }
            if ($i > 100 && $i <= 200) {
                $b = random_int(1, $a);
                $row['primer'] = "$a - $b = ";
                $row['value'] = $a - $b;
            }
            if ($i > 200 && $i <= 300) {
                while ($a * $b > $end) {
                    $a = random_int(1, $end);
                    $b = random_int(1, $end);
                }
                $row['primer'] = "$a x $b = ";
                $row['value'] = $a * $b;
            }
            if ($i > 300 && $i <= 400) {
                $b = random_int(2, $end);
                while ($a % $b != 0) {
                    $a = random_int(3, $end);
                    $b = random_int(2, $a - 1);
                }
                $row['primer'] = "$a : $b = ";
                $row['value'] = $a / $b;
            }
            $primers[] = $row;
        }
        return array_values($primers);
    }
    public function mera_ploshad(){
        $primers = [];
        for ($i=1;$i<10; $i++){
            for ($j=1;$j<115; $j++){
                $p = [];
                $rand=rand(0,2);
                if($rand == 1){
                    $p["primer"] = $i.' г '.$j.' мг = … мг';
                }else{
                    $p["primer"] = $i.' кг '.$j.' г = … г';
                }
                $p["value"] = $i*1000+$j;
                $primers[] = $p;
            }
        }
        return array_values($primers);
    }
    public function mera_massa(){
        $primers = [];
        for ($i=1;$i<10; $i++){
            for ($j=1;$j<115; $j++){
                $p = [];
                $rand=rand(0,2);
                if($rand == 1){
                    $p["primer"] = $i.' г '.$j.' мг = … мг';
                }else{
                    $p["primer"] = $i.' кг '.$j.' г = … г';
                }
                $p["value"] = $i*1000+$j;
                $primers[] = $p;
            }
        }
        return array_values($primers);
    }

}
