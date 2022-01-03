<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

use Session;

class FeedbacksController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::orderBy('id','desc')->paginate(10);

        return view('admin.feedbacks.index', ['feedbacks' => $feedbacks]);
    }

    public function create()
    {
        return view('admin.feedbacks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'active' => 'boolean',
            'author' => 'required|max:255',
            'date' => 'required|date_format:d.m.Y',
            'text' => 'required',
        ]);

        $formData = $request->except('_token');
        $feedback = new Feedback();

        $feedback->fill($formData);
        $feedback->save();

        Session::flash('flash_message', 'Отзыв добавлен');
        return redirect()->action('Admin\FeedbacksController@index');
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrfail((int)$id);
        return view('admin.feedbacks.edit', ['feedback' => $feedback]);
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrfail((int)$id);

        $this->validate($request, [
            'active' => 'boolean',
            'author' => 'required|max:255',
            'date' => 'required|date_format:d.m.Y',
            'text' => 'required',
        ]);

        $formData = $request->except('_token');

        $feedback->fill($formData);
        $feedback->save();

        Session::flash('flash_message', 'Отзыв изменен');
        return redirect()->action('Admin\FeedbacksController@index');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrfail((int)$id);
        $feedback->delete();

        Session::flash('flash_message', 'Отзыв удален');
        return redirect()->action('Admin\FeedbacksController@index');
    }
}
