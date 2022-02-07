<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Task;
use App\Models\User;
use App\Models\Std_assignment;

class AssignmentController extends Controller
{
    //
    public function viewAssignment(Request $request)
    {
        $assignments=Std_assignment::all();
        return view('tasks.view_assignment',compact('assignments'));
    }
    public function editStatus($id){
        $assignment=Std_assignment::findOrFail($id);

        if($assignment->status==0){
            $assignment->status=1;
            $assignment->save();
        }else{
            $assignment->status=0;
            $assignment->save();
        }
    
        return redirect()->back()->with('success','Status Updated Successfully');
    }

    public function returnStatus($id){
        $assignment=Std_assignment::findOrFail($id);
            $assignment->status=3;
            $assignment->save();

        return redirect()->back()->with('success','Return Successfully');
    }

    public function assignment_details($id)
    {
        $assignment= Std_assignment::findOrFail($id);
        $user=User::where('id',$assignment->user_id)->first();
        $task=Task::where('id',$assignment->task_id)->first();
        return view('tasks.assignment_details')->with(compact('assignment','user', 'task'));
    }
    public function add_extra_point(Request $request){
        $assignment=Std_assignment::findOrFail($request->id);
            $assignment->point +=$request->point;
            $assignment->status=1;
            $assignment->save();
        return redirect()->back()->with('success','Extra Point Added Successfully');
    }
}
