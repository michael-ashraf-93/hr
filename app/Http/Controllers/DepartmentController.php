<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function Show()
    {
        $departments = Department::paginate(10);
        return view('admin.view.viewDep', compact('departments'));
    }

    public function Create()
    {
        return view('admin.add.addDep');
    }


    public function Store(Request $request)
    {
//        $this->validate(request(), [
//            'name' => 'required|max:250',
//            'manager_id' => 'required|max:250',
//            'location_id' => 'required|max:250',
//
//        ]);

        Department::create([
            'name' => $request['name'],
            'location_id' => $request['location'],
            'manager_id' => $request['manager'],
        ]);

        return redirect('/departments');


    }


    public function Edit($id)
    {
        $department = Department::where('id', $id)->get();
        return view('admin.edit.editDep', compact('department'));
    }


    public function Update($id, Request $request)
    {
//        dd($request->all());
        $department = Department::find($id);
        $department->update([
            'name' => $request['name'],
            'location_id' => $request['location'],
            'manager_id' => $request['manager'],
        ]);

        return redirect('/departments');
    }

//    public function Destroy($id)
//    {
//        $department = Department::find($id);
//        $department->delete($id);
//        return redirect('/departments');
//    }

    public function Destroy(Request $request)
    {
        Department::destroy($request->id);
        return response(['status' => true]);
    }
}
