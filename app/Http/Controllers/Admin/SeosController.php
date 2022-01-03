<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Seo;

use Session;
use Validator;

class SeosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {               
        return view('admin.seos.index', ['seos' => Seo::orderBy('id','asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(['url'=>Seo::urlToPath($request->input('url'))], [
            'url' => 'required|max:255|unique:seos,url',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        Seo::create($request->except('_token'));

        Session::flash('flash_message', 'Seo добавлена');
        return redirect()->action('Admin\SeosController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo = Seo::findOrfail((int)$id);
        
        return view('admin.seos.edit', ['seo' => $seo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seo = Seo::findOrfail((int)$id);
        
        
        $validator = Validator::make(['url'=>Seo::urlToPath($request->input('url'))], [
            'url' => 'required|max:255|unique:seos,url,'.$seo->id,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $seo->fill($request->except('_token'));
        $seo->save();

        Session::flash('flash_message', 'Seo изменена');
        return redirect()->action('Admin\SeosController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seo::destroy((int)$id);
        
        Session::flash('flash_message', 'Seo удалена');
        return redirect()->action('Admin\SeosController@index');
    }
}
