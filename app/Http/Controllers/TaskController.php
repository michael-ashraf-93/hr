<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function Show()
    {
        $tasks = Task::paginate(10);
        return view('admin.view.viewTasks',compact('tasks'));
    }

    public function Create()
    {
        return view('admin.add.addTasks');
    }

    public function Store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:150',
            'body' => 'required|max:1000',
            'date' => 'required|max:250',
            'back' => 'required|max:250',
            'text' => 'required|max:250',
        ]);
        Task::create([
            'title' => $request->title,
            'body' => $request->body,
            'date' => strtotime($request->date),
            'back' => $request->back,
            'text' => $request->text,
            'user_id' => auth()->user()->id,
            'company_id' => auth()->user()->company_id,
        ]);
        return redirect()->back();
    }

    public function Edit($id)
    {
        $task = Task::where('id', $id)->get();
        return view('admin.edit.editTask', compact('task'));
    }


    public function Update($id, Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:150',
            'body' => 'required|max:1000',
            'date' => 'required|max:250',
        ]);
        $task = Task::find($id);
        $task->update([
            'title' => $request['title'],
            'body' => $request['body'],
            'date' => $request['date'],
            'user_id' => auth()->user()->id,
            'company_id' => auth()->user()->company_id,
        ]);

        return redirect('/tasks');
    }

    public function Destroy(Request $request)
    {
        Task::destroy($request->id);
        return response(['status' => true]);
    }

}
