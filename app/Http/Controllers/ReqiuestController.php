<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Reqiuest;



class ReqiuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reqs = User::all();
        return view('reqiuest.req')->with('reqs',$reqs);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'desc_request'      =>'required',
           ]);

        //return $request->all();


        $req = new Reqiuest;
        $req->student = auth()->user()->name;
        $req->room = auth()->user()->room;
        $req->desc_request = $request->input('desc_request');
        $req->yes_no = 0;
        $req->st_id = auth()->user()->id;
        $req->save();

        return redirect('/home')->with('success', 'Done successfuly');
    }


}
