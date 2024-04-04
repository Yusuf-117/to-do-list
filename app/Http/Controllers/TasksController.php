<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the Task.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks/index')->with(['tasks' => $tasks]);
    }

    /**
     * Store a newly created Task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Task::create(["name" => $request->name]);

        return redirect()->back()->with('success','Task created successfully');
    }

    /**
     * Update the specified Task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $task = Task::find($id);
        if($task){
            $task->completed = true;
            $task->save();
            return redirect()->back();

        }else{
            return redirect()->back()->withErrors(["msg" => "Task not found"]);
        }
    }

    /**
     * Remove the specified Task from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
