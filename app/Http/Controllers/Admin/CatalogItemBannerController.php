<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CatalogItemBanner;

use Session;

class CatalogItemBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $banners = CatalogItemBanner::sorted()->get();
        
        return view('admin.catalog_item_banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog_item_banners.create');
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

        $catalog_item_banner = new CatalogItemBanner();
        
        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path(). CatalogItemBanner::images_path, $filename);

        $catalog_item_banner->image = $filename;
        $catalog_item_banner->parameter = $request->input('parameter');
        $catalog_item_banner->marker = $request->input('marker');
        $catalog_item_banner->link = $request->input('link');
        $catalog_item_banner->anchor = (!empty($request->input('anchor'))) ? true : false;
        $catalog_item_banner->save();

        Session::flash('flash_message', 'Баннер добавлен');
        return redirect()->action('Admin\CatalogItemBannerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalog_item_banner = CatalogItemBanner::findOrfail((int)$id);
        
        if($catalog_item_banner->image && file_exists(public_path().CatalogItemBanner::images_path.$catalog_item_banner->image)){
            unlink(public_path().CatalogItemBanner::images_path.$catalog_item_banner->image);
        }

        $catalog_item_banner->delete();
        
        Session::flash('flash_message', 'Баннер удален');
        return redirect()->action('Admin\CatalogItemBannerController@index');
    }
}
