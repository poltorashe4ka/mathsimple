<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.settings.index', ['settings' => Setting::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:settings,name',
            'value' => 'max:1750',
        ]);
        
        Setting::create($request->except('_token'));

        Session::flash('flash_message', 'Настройка добавлена');
        return redirect()->action('Admin\SettingsController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrfail((int)$id);
        
        return view('admin.settings.edit', ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrfail((int)$id);
        
        $this->validate($request, [
            'name' => 'required|max:255|unique:settings,name,'.$setting->id,
            'value' => 'max:1750',
        ]);
        

        $setting->fill($request->except('_token'));
        $setting->save();

        Session::flash('flash_message', 'Настройка изменена');
        return redirect()->action('Admin\SettingsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Setting::destroy((int)$id);
        
        Session::flash('flash_message', 'Настройка удалена');
        return redirect()->action('Admin\SettingsController@index');
    }
}
