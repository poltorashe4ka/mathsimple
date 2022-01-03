<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CatalogGroup;
use App\Models\CatalogItem;
use App\Models\ContextGallery;

use Session;

class CatalogItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {       
        $group = CatalogGroup::findOrFail($id);
        
        $items = CatalogItem::where('group_id', $group->id)->sorted()->get();
                
        return view('admin.catalog_items.index', ['items' => $items, 'group' => $group]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $group = CatalogGroup::findOrFail((int)$id);
        
        return view('admin.catalog_items.create', ['group' => $group]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $group = CatalogGroup::findOrFail($id);
        
        $this->validate($request, [
            'visibility' => 'boolean',
            'title' => 'required|max:255|unique:catalog_item,title,NULL,id,group_id,'.$id,
            'alias' => 'required|max:255|unique:catalog_item,alias,NULL,id,group_id,'.$id,
            'sync_alias' => 'max:255|unique:catalog_item,sync_alias,NULL,id,group_id,'.$id,
            'vin_example' => 'size:17|unique:catalog_item,vin_example,NULL,id,group_id,'.$id,
            'discount' => 'integer'
        ]);
        
        $item = new CatalogItem();
        
        $item->fill($request->except('_token'));
        $item->group_id = $group->id;
        if($item->isDirty('vin_example')){
            $item->vin = substr($item->vin_example, 0, 11).sprintf("%06d", mt_rand(1, 999999));
        }
        $item->save();

        Session::flash('flash_message', 'Модель добавлена');
        return redirect()->action('Admin\CatalogItemController@index', ['id' => $group->id]);
    }
    
    /**
        *
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function addContextImage(Request $request, $id)
    {
        $item = CatalogItem::findOrFail($id);
        
        $this->validate($request, [
            'marker' => 'required|max:32',
            'image' => 'required|image',
            'parameter' => 'required|max:32',
        ]);
        
        $gallery = new ContextGallery();
        $gallery->fill($request->only(['marker', 'parameter']));
        $gallery->item_id = $item->id;

        $filename = uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path().  ContextGallery::images_path, $filename);
        
        $gallery->image = $filename;
        $gallery->save();

        Session::flash('flash_message', 'Изображение добавлено');
        return redirect()->action('Admin\CatalogItemController@edit', ['id' => $item->id]);
    }

    /**
        *
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function destroyContextImage(Request $request, $id)
    {
        $gallery = ContextGallery::findOrFail($id);
        $item_id = $gallery->item_id;

        $path = public_path().ContextGallery::images_path;
        
        if($gallery->image && file_exists($path.$gallery->image) && is_file($path.$gallery->image)){
            unlink($path.$gallery->image);
        }
        
        $gallery->delete();
        
        Session::flash('flash_message', 'Изображение удалено');
        return redirect()->action('Admin\CatalogItemController@edit', ['id' => $item_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CatalogItem::findOrfail((int)$id);
        $gallery = ContextGallery::where('item_id', $item->id)->get();
        
        return view('admin.catalog_items.edit', ['item' => $item, 'gallery' => $gallery]);
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
        $item = CatalogItem::with('group')->findOrfail($id);
        
        $this->validate($request, [
            'visibility' => 'boolean',
            'title' => 'required|max:255|unique:catalog_item,title,'.$id.',id,group_id,'.$item->group_id,
            'alias' => 'required|max:255|unique:catalog_item,alias,'.$id.',id,group_id,'.$item->group_id,
            'sync_alias' => 'max:255|unique:catalog_item,sync_alias,'.$id.',id,group_id,'.$item->group_id,
            'vin_example' => 'size:17|unique:catalog_item,sync_alias,'.$id.',id,group_id,'.$item->group_id,
            'discount' => 'integer'
        ]);
        
        $item->fill($request->except('_token'));
        if($item->isDirty('vin_example')){
            $item->vin = substr($item->vin_example, 0, 11).sprintf("%06d", mt_rand(1, 999999));
        }
        $item->save();

        Session::flash('flash_message', 'Модель изменена');
        return redirect()->action('Admin\CatalogItemController@index', ['id' => $item->group_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CatalogItem::findOrfail((int)$id);
        $item->delete();
        
        Session::flash('flash_message', 'Модель удалена');
        return redirect()->action('Admin\CatalogItemController@index', ['id' => $item->group_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function models($id)
    {
        $catalog_items = CatalogItem::sorted()->where('visibility', true)
                ->where('group_id', (int)$id)->get();
        
        return view('admin.catalog_items.models', ['catalog_items' => $catalog_items]);
    }
}
