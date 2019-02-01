<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Admin;

use App\Reqiuest;


class HomeController extends Controller
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
        $st_id = auth()->user()->id;
        $user = User::find($st_id);
        return view('user.home')->with('reqs', $user->reqs);
    }



}


