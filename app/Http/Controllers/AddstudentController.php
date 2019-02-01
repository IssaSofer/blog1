<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reqiuest;
use App\User;
use App\Admin;
use Gate;
use Auth;

class AddstudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

        if (Gate::allows('Admin-store', Auth::user())){
            return view('addstudent.addstudent');
        }

        if (Gate::denies('Admin-store', Auth::user())){
             return redirect('/admin');
        }
    }

    public function create(Request $request)
    {
        $this->validate($request, [

            'name'          =>'required',
            'email'         =>'required',
            'password'      =>'required',
            'room'          =>'required',
           ]);


        $adm = new User;
        $adm->name = $request->input('name');
        $adm->email = $request->input('email');
        $adm->password = bcrypt($request->input('password'));
        $adm->room = $request->input('room');
        $adm->save();
        return redirect('/admin')->with('success', 'Done successfuly');
    }
}