<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function Show()
    {
        $jobs = Job::paginate(10);
        return view('admin.view.viewJobs', compact('jobs'));
    }

    public function Create()
    {
        return view('admin.add.addJob');
    }


    public function Store(Request $request)
    {

        Job::create([
            'title' => $request['title'],
            'min_salary' => $request['min_salary'],
            'max_salary' => $request['max_salary'],
        ]);

        return redirect('/jobs');


    }


    public function Edit($id)
    {
        $job = Job::where('id', $id)->get();
        return view('admin.edit.editJob', compact('job'));
    }


    public function Update($id, Request $request)
    {
//        dd($request->all());
        $job = Job::find($id);
        $job->update([
            'title' => $request['title'],
            'min_salary' => $request['min_salary'],
            'max_salary' => $request['max_salary'],

        ]);
        return redirect('/jobs');
    }


//    public function Destroy($id)
//    {
//        $job = Job::find($id);
//        $job->delete($id);
//        return redirect('/jobs');
//    }

    public function Destroy(Request $request)
    {
        Job::destroy($request->id);
        return response(['status' => true]);
    }

}
