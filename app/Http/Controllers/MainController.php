<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Mail\Mailable;
use Mail;
use Log;
use function PHPUnit\Framework\isEmpty;
use function Psy\debug;

class MainController extends Controller
{

    public function review(){
        $feedbacks = Feedback::orderBy('id','desc')->paginate(10);
        return view('desktop.review', ['feedbacks' => $feedbacks]);
    }
    public function shop(){
        return view('desktop.shop');
    }
    public function test_student(){
        $result=TestResult::where('test_id',1)->inRandomOrder()->first();
        $questions=Test::where('test_id',1)->get();
        return view('desktop.tests.test_student', ['result' => $result,'questions'=>$questions]);
    }
    public function contact(){
        return view('desktop.contact');
    }
    public function teoriya(){
        return view('desktop.teoriya');
    }
    public function number(){
        return view('desktop.teoriya.number');
    }
    public function operacii(){
        return view('desktop.teoriya.operacii');
    }
    public function figure(){
        return view('desktop.teoriya.figure');
    }
}
