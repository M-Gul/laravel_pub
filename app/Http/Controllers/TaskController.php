<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\task;
use Validator;


class TaskController extends Controller
{
    public function show(){
        $tasks = Task::all();
         return view('tasks',[
            'tasks'=>$tasks
         ]);
    }
    // public function showOne($task){
    //     $tasks = Task::find($task);
    //      return view('tasks',[
    //         'tasks'=>$tasks
    //      ]);
    //}

    public function addTask(Request $request){
       $validator = Validator ::make($request->all(),[
            'name'=>'required|max:200',
       ]);
       if ($validator->fails()){
        return redirect('/');
       }
       $task = new Task;
       $task->name = $request->name;
       $task->save();
       return redirect('/');
    }
    public function del($id){

      Task::findOrFail($id)->delete();
 
    return redirect('/');
    }
  
}
