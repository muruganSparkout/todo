<?php

namespace Murugan\Todo\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Murugan\Todo\Models\Task;
use Mail;

class TaskController extends Controller
{
    public function index(){
        $data['list'] = Task::get();
        //return $data['list'];
        return view('todo::todo')->with($data);
    }
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'name' => 'required',
        ]);
        Task::create($request->all());
        
        $details = [
            'title' => 'Mail from Package',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to(config('todo.to_mail'))->send(new \Murugan\Todo\Mail\TaskMail($details));
    //    / Session::flash('flash_message', 'Task successfully added!');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task')
            ->with('success', 'Task deleted successfully');
    }
}
