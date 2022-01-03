<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CatalogGroup;

use Session;

class CatalogGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $groups = CatalogGroup::sorted()->get();
        
        return view('admin.catalog_groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog_groups.create');
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
            'visibility' => 'boolean',
            'title' => 'required|max:255|unique:catalog_group,title',
            'alias' => 'required|max:255|unique:catalog_group,alias',
            'sync_alias' => 'max:255|unique:catalog_group,sync_alias',
            'image' => 'required|image'
        ]);
        
        $group = new CatalogGroup();
        
        $group->fill($request->except('_token','image'));
                
        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path().  CatalogGroup::images_path, $filename);
        
        $group->image = $filename;
        $group->save();

        Session::flash('flash_message', 'Марка добавлена');
        return redirect()->action('Admin\CatalogGroupController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = CatalogGroup::findOrfail((int)$id);
        
        return view('admin.catalog_groups.edit', ['group' => $group]);
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
        $group = CatalogGroup::findOrfail((int)$id);
        
        $this->validate($request, [
            'visibility' => 'boolean',
            'title' => 'required|max:255|unique:catalog_group,title,'.$id,
            'alias' => 'required|max:255|unique:catalog_group,alias,'.$id,
            'sync_alias' => 'max:255|unique:catalog_group,sync_alias,'.$id,
            'image' => 'image'
        ]);
        
        $group->fill($request->except('_token','image'));
                
        if($request->hasFile('image')){
            $path = public_path().CatalogGroup::images_path;
            
            if(file_exists($path.$group->image) && is_file($path.$group->image)){
                unlink($path.$group->image);
            }
            
            $filename = uniqid().'.'.$request->file('image')->guessExtension();
            $request->file('image')->move($path, $filename);
            
            $group->image = $filename;
        }

        $group->save();

        Session::flash('flash_message', 'Марка изменена');
        return redirect()->action('Admin\CatalogGroupController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = CatalogGroup::findOrfail((int)$id);
        
        $path = public_path().CatalogGroup::images_path;
        
        if($group->image && file_exists($path.$group->image) && is_file($path.$group->image)){
            unlink($path.$group->image);
        }
        
        $group->delete();
        
        Session::flash('flash_message', 'Марка удалена');
        return redirect()->action('Admin\CatalogGroupController@index');
    }
}
