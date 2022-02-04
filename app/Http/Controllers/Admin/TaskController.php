<?php

namespace App\Http\Controllers\Admin;
use App\Models\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{
    public function addTask(Request $request)
    {
        if($request->isMethod('post')){
            $data =$request->all();
            if($request->hasFile('file')){
                $image_tmp = $request->file;
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    if($extension ="png || jpg"){
                        return redirect()->route('admin.addTask')->with('error','Please Upload');
                    }                    
                }
            }
            $task = new Task;
            $task->title =$data['name'];
            $task->inst =$data['inst'];
            $task->topic =$data['topic'];
            $task->point =$data['point'];
            $task->exp_date =$data['exp_date'];
            $task->save();
            return redirect()->route('admin.addTask')->with('success','Task Added Successfully');
        }
        return view('tasks.add_task');
    }
}
