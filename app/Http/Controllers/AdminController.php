<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use App\Reqiuest;
use App\User;
use DB;
use Gate;
use Auth;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        $reqiuest = Reqiuest::all();
        $req_count = DB::select('SELECT * FROM reqiuests WHERE yes_no = 0');
        $req_show = Reqiuest::all()->take(3);
        $user = User::all();
        $user_show = User::all()->take(3);
        if (Gate::allows('Admin-store', Auth::user())) {
             return view('admin.home')->with(array('admin' => $admin, 'reqiuest'=> $reqiuest, 'user' => $user, 'req_count' => $req_count, 'req_show' => $req_show, 'user_show' => $user_show));
        }

        if (Gate::denies('Admin-store', Auth::user())) {
            return view('admin.request')->with(array('admin' => $admin, 'reqiuest'=> $reqiuest));
        }
        
    }

    public function create()
    {
        if (Gate::allows('Admin-store', Auth::user())) {
            return view('admin.create');
        }

        if (Gate::denies('Admin-store', Auth::user())){
             return redirect('/admin');
        }
    }



    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'name'          =>'required|string|max:255',
            'email'         =>'required|string|email|max:255|unique:users',
            'password'      =>'required|string|min:6',
            'kind'          =>'required|integer',
           ]);


        $adm = new Admin;
        $adm->name = $request->input('name');
        $adm->email = $request->input('email');
        $adm->password = bcrypt($request->input('password'));
        $adm->kind = $request->input('kind');
        $adm->save();
        return redirect('/admin')->with('success', 'Done successfuly');
    }
}
