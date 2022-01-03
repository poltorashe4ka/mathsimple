<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;

use Session;

class TestsController extends Controller{
    public function test_result(){
        $tests = TestResult::orderBy('id','desc')->paginate(10);
        return view('admin.test_result.index', ['tests' => $tests]);
    }

    public function test_result_create(){
        return view('admin.test_result.create');
    }

    public function test_result_store(Request $request){
        $formData = $request->except('_token','img');
        $test = new TestResult();
        $test->fill($formData);
        if ($request->hasFile('img')) {
            $image_filename = 'img_'.uniqid().'.'.$request->file('img')->guessExtension();
            $request->file('img')->move(public_path().  TestResult::images_path, $image_filename);
            $test->img = $image_filename;
        }
        $test->save();

        Session::flash('flash_message', 'Ответ добавлен');
        return redirect()->action('Admin\TestsController@test_result');
    }

    public function test_result_edit($id){
        $test = TestResult::findOrfail((int)$id);
        return view('admin.test_result.edit', ['test' => $test]);
    }

    public function test_result_update(Request $request, $id)
    {
        $formData = $request->except('_token','img');
        $test = TestResult::findOrfail((int)$id);
        $test->fill($formData);
        if ($request->hasFile('img')) {
            $image_filename = 'img_'.uniqid().'.'.$request->file('img')->guessExtension();
            $request->file('img')->move(public_path().  TestResult::images_path, $image_filename);
            $test->img = $image_filename;
        }
        $test->save();

        Session::flash('flash_message', 'Отзыв изменен');
        return redirect()->action('Admin\TestsController@test_result');
    }

    public function test_result_destroy($id)
    {
        $test = TestResult::findOrfail((int)$id);
        $test->delete();

        Session::flash('flash_message', 'Отзыв удален');
        return redirect()->action('Admin\TestsController@test_result');
    }

    public function index(){
        $tests = Test::orderBy('id','desc')->paginate(10);
        return view('admin.tests.index', ['tests' => $tests]);
    }

    public function create(){
        return view('admin.tests.create');
    }

    public function store(Request $request)
    {

        $formData = $request->except('_token');
        $test = new Test();

        $test->fill($formData);
        $test->save();

        Session::flash('flash_message', 'Отзыв добавлен');
        return redirect()->action('Admin\TestsController@index');
    }

    public function edit($id)
    {
        $test = Test::findOrfail((int)$id);
        return view('admin.tests.edit', ['test' => $test]);
    }

    public function update(Request $request, $id)
    {
        $test = Test::findOrfail((int)$id);

        $formData = $request->except('_token');

        $test->fill($formData);
        $test->save();

        Session::flash('flash_message', 'Отзыв изменен');
        return redirect()->action('Admin\TestsController@index');
    }

    public function destroy($id)
    {
        $test = Test::findOrfail((int)$id);
        $test->delete();

        Session::flash('flash_message', 'Отзыв удален');
        return redirect()->action('Admin\TestsController@index');
    }
}
