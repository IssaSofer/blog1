<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Admin;
use App\Reqiuest;
use App\Addstudent;

use Gate;
use Auth;


class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
	// show index 
	public function index()
	{

		$reqiuest = Reqiuest::all();
		$admin = Admin::all();
		$student = User::orderBy('created_at')->paginate(16);

		if (Gate::allows('Admin-store', Auth::user())){
			return view('admin.students')->with('student' , $student);
		}

		if (Gate::denies('Admin-store', Auth::user())){
			 return redirect('/admin');
		}
	}


	// edit students 

	public function edit($id)
	{

		$admin = Admin::all();

		if (Gate::allows('Admin-store', Auth::user())){
			$students = User::find($id);
			return view('admin.editstudent')->with('students' , $students);
		}

		if (Gate::denies('Admin-store', Auth::user())){
			 return redirect('/admin');
		}
	}


    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'name'       =>'required',
            'email'     =>'required',
            'room'      =>'required',
           ]);

        $student_up = User::find($id);
        $student_up->name = $request->input('name');
        $student_up->email = $request->input('email');
        $student_up->room = $request->input('room');

        if ($request->input('password') !== "") {

        	$student_up->password = $request->input('password');

        }else{
        	$student_up->password = $request->input('oldpassword');
        }
        
        $student_up->save();

        return redirect('/admin/students');

	}

	public function destroy($id)
	{
		$del = User::find($id);
		$del->delete();

		return redirect('/admin/students');
	}

}