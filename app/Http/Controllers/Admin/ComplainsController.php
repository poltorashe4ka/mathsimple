<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complain;

class ComplainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'created_more' => 'date|date_format:d.m.Y H:i:s',
            'created_less' => 'date|date_format:d.m.Y H:i:s'
        ]);
        
        $complains = Complain::orderBy('id');
        
        if (!empty($request->input('mobile_tel'))) {
            $complains->where('mobile_tel', 'LIKE', '%' . $request->input('mobile_tel') . '%');
        }
        
        if (!empty($request->input('created_more'))) {
            $complains->where('created_at', '>=', Complain::dateFromInput($request->input('created_more')));
        }
        
        if (!empty($request->input('created_less'))) {
            $complains->where('created_at', '<=', Complain::dateFromInput($request->input('created_less')));
        }
                        
        if (!empty($request->input('fio'))) {
            $complains->where('fio', 'LIKE', '%' . $request->input('fio') . '%');
        }
        
        return view('admin.complains.index', ['complains' => $complains->paginate(30)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complain = Complain::findOrfail((int)$id);
        
        return view('admin.complains.show', ['complain' => $complain]);
    }
}
