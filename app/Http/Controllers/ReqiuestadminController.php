<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Admin;
use App\Reqiuest;
use App\Addstudent;

use Gate;
use Auth;

class ReqiuestadminController extends AdminController
{

    public function index()
    {
        $admin = Admin::all();
        $reqiuest = Reqiuest::all();
        
        if (Gate::allows('Admin-store', Auth::user())) {
             return view('admin.request')->with(array('admin' => $admin, 'reqiuest'=> $reqiuest));
        }

        if (Gate::denies('Admin-store', Auth::user())){
             return redirect('/admin');
        }
    }


    public function update($id)
    {
        $req_up = Reqiuest::find($id);
        $req_up->yes_no = 1;
        $req_up->save();
        return redirect('/admin/request')->with('success', 'Done successfuly');
    }



    public function destroy($id)
    {
        $req1 = Reqiuest::find($id);
        $req1->delete();
        return redirect('/admin')->with('success', 'Done successfuly');
    }

}