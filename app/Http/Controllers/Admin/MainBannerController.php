<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MainBanner;

use Session;

class MainBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $banners = MainBanner::sorted()->get();
        
        return view('admin.main_banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main_banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image',
            'link' => 'max:255'
        ]);
        
        $main_banner = new MainBanner();    
        
        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path(). MainBanner::images_path, $filename);
        
        $main_banner->image = $filename;
        $main_banner->link = $request->input('link');
        $main_banner->save();

        Session::flash('flash_message', 'Баннер добавлен');
        return redirect()->action('Admin\MainBannerController@index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_banner = MainBanner::findOrfail((int)$id);
        
        return view('admin.main_banners.edit', ['main_banner' => $main_banner]);
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
        $main_banner = MainBanner::findOrfail((int)$id);
        
        $this->validate($request, [
            'image' => 'image',
            'link' => 'max:255'
        ]);
        
        $main_banner->fill($request->except('_token','image'));
                
        if($request->hasFile('image')){
            if(file_exists(public_path().  MainBanner::images_path.$main_banner->image)){
                unlink(public_path().MainBanner::images_path.$main_banner->image);
            }
            
            $filename = 'image_'.uniqid().'.'.$request->file('image')->guessExtension();
            $request->file('image')->move(public_path().  MainBanner::images_path, $filename);
            
            $main_banner->image = $filename;
        }

        $main_banner->save();

        Session::flash('flash_message', 'Баннер изменен');
        return redirect()->action('Admin\MainBannerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $main_banner = MainBanner::findOrfail((int)$id);
        
        if($main_banner->image && file_exists(public_path().MainBanner::images_path.$main_banner->image)){
            unlink(public_path().MainBanner::images_path.$main_banner->image);
        }
        
        $main_banner->delete();
        
        Session::flash('flash_message', 'Баннер удален');
        return redirect()->action('Admin\MainBannerController@index');
    }
}
