<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MainPageBanner;

use Session;

class MainPageBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $banners = MainPageBanner::sorted()->get();
        
        return view('admin.main_page_banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main_page_banners.create');
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
            'image' => 'required|image'
        ]);

        $main_page_banner = new MainPageBanner();
        
        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path(). MainPageBanner::images_path, $filename);

        $main_page_banner->image = $filename;
        $main_page_banner->parameter = $request->input('parameter');
        $main_page_banner->marker = $request->input('marker');
        $main_page_banner->link = $request->input('link');
        $main_page_banner->anchor = (!empty($request->input('anchor'))) ? true : false;
        $main_page_banner->save();

        Session::flash('flash_message', 'Баннер добавлен');
        return redirect()->action('Admin\MainPageBannerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $main_page_banner = MainPageBanner::findOrfail((int)$id);
        
        if($main_page_banner->image && file_exists(public_path().MainPageBanner::images_path.$main_page_banner->image)){
            unlink(public_path().MainPageBanner::images_path.$main_page_banner->image);
        }

        $main_page_banner->delete();
        
        Session::flash('flash_message', 'Баннер удален');
        return redirect()->action('Admin\MainPageBannerController@index');
    }
}
