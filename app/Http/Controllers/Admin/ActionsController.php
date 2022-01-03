<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Action;

use Session;

class ActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $actions = Action::sorted()->get();
        
        return view('admin.actions.index', ['actions' => $actions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.actions.create');
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
            'title' => 'required|max:255',
            'date' => 'required|date_format:d.m.Y',
            'text' => 'required',
            'image' => 'required|image',
            'big_image' => 'required|image'
        ]);
        
        $action = new Action();
        
        $action->fill($request->except('_token','image','big_image'));
                
        $image_filename = 'image_'.uniqid().'.'.$request->file('image')->guessExtension();
        $request->file('image')->move(public_path().  Action::images_path, $image_filename);
        $action->image = $image_filename;
        
        $image_filename = 'big_image_'.uniqid().'.'.$request->file('big_image')->guessExtension();
        $request->file('big_image')->move(public_path().  Action::images_path, $image_filename);
        $action->big_image = $image_filename;
        
        $action->save();

        Session::flash('flash_message', 'Акция добавлена');
        return redirect()->action('Admin\ActionsController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = Action::findOrfail((int)$id);
        
        return view('admin.actions.edit', ['action' => $action]);
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
        $action = Action::findOrfail((int)$id);
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required|date_format:d.m.Y',
            'text' => 'required',
            'image' => 'image',
            'big_image' => 'image'
        ]);
        
        $action->fill($request->except('_token','image','big_image'));
                
        if($request->hasFile('image')){
            if(file_exists(public_path().Action::images_path.$action->image)){
                unlink(public_path().Action::images_path.$action->image);
            }
            
            $filename = 'image_'.uniqid().'.'.$request->file('image')->guessExtension();
            $request->file('image')->move(public_path().  Action::images_path, $filename);
            
            $action->image = $filename;
        }
        
        if($request->hasFile('big_image')){
            if(file_exists(public_path().Action::images_path.$action->big_image)){
                unlink(public_path().Action::images_path.$action->big_image);
            }
            
            $filename = 'big_image_'.uniqid().'.'.$request->file('big_image')->guessExtension();
            $request->file('big_image')->move(public_path().  Action::images_path, $filename);
            
            $action->big_image = $filename;
        }

        $action->save();

        Session::flash('flash_message', 'Акция изменена');
        return redirect()->action('Admin\ActionsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Action::findOrfail((int)$id);
        
        $path = public_path().Action::images_path.$action->image;
        if($action->image && file_exists($path) && is_file($path)){
            unlink($path);
        }
        
        $path = public_path().Action::images_path.$action->big_image;
        if($action->big_image && file_exists($path) && is_file($path)){
            unlink($path);
        }

        $action->delete();
        
        Session::flash('flash_message', 'Акция удалена');
        return redirect()->action('Admin\ActionsController@index');
    }
}
