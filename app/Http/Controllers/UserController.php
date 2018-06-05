<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function userData()
    {
        return datatables()->of(User::all())->toJson();
    }

    public function Show()
    {
//        $array = User::where('manager_id', '!=', null)->pluck('manager_id')->toArray();
        $users = User::paginate(10);
//        dd($users);
        return view('admin.view.viewUsers', compact('users'));

//        $array = User::where('manager_id', '!=', null)->pluck('manager_id')->toArray();
//        $users = User::whereNotIn('id', $array)->paginate(10);
//        return view('admin.view.viewUsers', compact('users'));
    }

    public function Show_Managers()
    {

        $array = User::pluck('manager_id')->toArray();
        $array = array_unique($array);
        $managers = User::whereIn('id', $array)->paginate(10);

        return view('admin.view.viewManagers', compact('managers'));
    }


    public function Create()
    {
        $managers = User::where('role', 'manager')->get();
        return view('admin.add.addUser', compact('managers'));

//        $array = User::pluck('manager_id')->toArray();
//        $array = array_unique($array);
//        $managers = User::whereIn('id', $array)->paginate(10);
//        return view('admin.add.addUser', compact('managers'));
    }


    public function Store(Request $request)
    {
        $this->validate(request(), [
            'fname' => 'required|max:250',
            'lname' => 'required|max:250',
            'phone' => 'required|max:250',
            'gender' => 'required|max:250',
            'role' => 'required|max:250',
            'hire_date' => 'required|max:250',
            'salary' => 'required|max:250',
            'commission' => 'required|max:250',
//            'manager' => 'required|max:250',
            'department' => 'required|max:250',
            'job' => 'required|max:250',
            'email' => 'required|max:250',
            'password' => 'required|max:250'
        ]);
        User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'phone' => $request['phone'],
            'company_id' => auth()->user->company_id,
            'gender' => $request['gender'],
            'role' => $request['role'],
            'hire_date' => $request['hire_date'],
            'salary' => $request['salary'],
            'commission_pct' => $request['commission'],
            'manager_id' => $request['manager'],
            'department_id' => $request['department'],
            'job_id' => $request['job'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])

        ]);
        return redirect('/users');


    }


    public function Edit($id)
    {
        $users = User::where('id', $id)->get();
        return view('admin.edit.editUser', compact('users'));
    }


    public function Update($id, Request $request)
    {
//        dd($request->all());
        $user = User::find($id);
        $user->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'phone' => $request['phone'],
            'hire_date' => $request['hire_date'],
            'salary' => $request['salary'],
            'commission_pct' => $request['commission'],
            'manager_id' => $request['manager'],
            'department_id' => $request['department'],
            'job_id' => $request['job'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])

        ]);

        return redirect('/users');
    }



    public function EditProfile($id)
    {
        $users = User::where('id', $id)->get();
        return view('admin.edit.editUser', compact('users'));
    }


    public function UpdateProfile($id, Request $request)
    {
//        dd($request->all());
        $user = User::find($id);
        $user->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'phone' => $request['phone'],
            'hire_date' => $request['hire_date'],
            'salary' => $request['salary'],
            'commission_pct' => $request['commission'],
            'manager_id' => $request['manager'],
            'department_id' => $request['department'],
            'job_id' => $request['job'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])

        ]);

        return redirect('/users');
    }


//    public function Destroy($id)
//    {
//        $user = User::find($id);
//        $user->delete($id);
//        return redirect('/users');
//    }




    public function Destroy(Request $request)
    {
        User::destroy($request->id);
        return response(['status' => true]);
    }



}
