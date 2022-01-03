<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UsedBrand;
use App\Console\Commands\Import;

use Session;
use Artisan;

class UsedBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {               
        return view('admin.used_brands.index', [
            'brands' => UsedBrand::all(),
            'import_running' => Import::isRunning()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = UsedBrand::findOrfail((int)$id);
        
        return view('admin.used_brands.edit', ['brand' => $brand]);
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
        $brand = UsedBrand::findOrfail((int)$id);
        
        $this->validate($request, [
            'alias' => 'required|max:255|unique:used_brands,alias,'.$brand->id,
            'image' => 'image'
        ]);
        
        $brand->fill($request->except('_token','image'));
        
        if($brand->image && file_exists(public_path().UsedBrand::images_path.$brand->image)){
            unlink(public_path().UsedBrand::images_path.$brand->image);
        }
        
        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        
        $request->file('image')->move(public_path().UsedBrand::images_path, $filename);
        
        $brand->image = $filename;
        
        $brand->save();

        Session::flash('flash_message', 'Марка изменена');
        return redirect()->action('Admin\UsedBrandsController@index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {               
        if(Import::isRunning()){
            Session::flash('flash_message', 'Синхронизация в данным момент уже идет');
        }else{
            Artisan::queue('import');
            Session::flash('flash_message', 'Синхронизация запущена');
        }
        
        return redirect()->action('Admin\UsedBrandsController@index');
    }
}
