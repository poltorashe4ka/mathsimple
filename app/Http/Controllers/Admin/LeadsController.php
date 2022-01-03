<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class LeadsController extends Controller
{

    public function index(Request $request)
    {
        $leads = User::orderBy('created_at','DESC');
        if (!empty($request->input('name'))) {
            $leads->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }
        return view('admin.leads.index', ['leads' => $leads->paginate(30)]);
    }

    public function show($id)
    {
        $lead = User::findOrfail((int)$id);
        return view('admin.leads.show', ['lead' => $lead]);
    }
}
