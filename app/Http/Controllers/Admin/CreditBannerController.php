<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CreditBanner;

use Session;

class CreditBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $banners = CreditBanner::sorted()->get();
        
        return view('admin.credit_banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.credit_banners.create');
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
        
        $credit_banner = new CreditBanner();    
        
        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path(). CreditBanner::images_path, $filename);
        
        $credit_banner->image = $filename;
        $credit_banner->parameter = $request->input('parameter');
        $credit_banner->marker = $request->input('marker');
        $credit_banner->link = $request->input('link');
        $credit_banner->anchor = (!empty($request->input('anchor'))) ? true : false;
        $credit_banner->save();

        Session::flash('flash_message', 'Баннер добавлен');
        return redirect()->action('Admin\CreditBannerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credit_banner = CreditBanner::findOrfail((int)$id);
        
        if($credit_banner->image && file_exists(public_path().CreditBanner::images_path.$credit_banner->image)){
            unlink(public_path().CreditBanner::images_path.$credit_banner->image);
        }
        
        $credit_banner->delete();
        
        Session::flash('flash_message', 'Баннер удален');
        return redirect()->action('Admin\CreditBannerController@index');
    }
}
