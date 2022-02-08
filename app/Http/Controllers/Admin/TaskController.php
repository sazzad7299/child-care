<?php

namespace App\Http\Controllers\Admin;
use App\Models\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;
use App\Models\Std_assignment;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function addTask(Request $request)
    {
        // return Carbon::today()->format('l');
 
        if($request->isMethod('post')){

            

            $data =$request->all();

            $file = $request->file('file');
            // echo "<pre>"; print_r($file); die;
            if ($file) {
                $extension=$file->getClientOriginalExtension();
                
                if($extension== 'pdf'){
                    $PDF=time().'.'.$extension;
                    $dest2='document/file/';
                    $pdfUrl = $dest2.$PDF;
                    $file->move($dest2,$PDF);
                }elseif($extension == 'png'||'PNG' || 'pNg' || 'PNg' || 'jpg' || 'JPg' || 'jpeg'){
                    $Image=time().'.'.$extension;
                    $dest='document/image/';
                    $imageUrl = $dest.$Image;
                    $file->move($dest,$Image);
                }
                else{
                    return redirect()->route('admin.addTask')->with('error','Please Upload Image or File');
                }  
            }

            $task = new Task;
            $task->title =$data['name'];
            $task->inst =$data['inst'];
            $task->topic =$data['topic'];
            if(!empty($imageUrl)){
                $task->img =$imageUrl;
                $task->pdf ="NULL";
                }
                if(!empty($pdfUrl)){
                $task->pdf =$pdfUrl;
                $task->img ="NULL";
            }
            $task->point =$data['point'];
            $task->exp_date =$data['exp_date'];
            $task->save();
            return redirect()->route('admin.addTask')->with('success','Task Added Successfully');
        }
        return view('tasks.add_task');
    }
    public function viewTask(){
        $tasks=Task::all();
        return view('tasks.view_task',compact('tasks'));
    }

    public function editTask($id){
        $task=Task::findOrFail($id);
        return view('tasks.edit_task',compact('task'));
    }

    public function deleteTask($id){
        $task=Task::findOrFail($id);

        $image_path = public_path("$task->img");
        $image_path = public_path("$task->pdf");

        if(!empty($image_path)){
        unlink($image_path);     
       }
    

        $task->delete();
        return back()->with('success','task delete successfully');
    }

    public function updateTask(Request $request)
    {
           $task =Task::findOrFail($request->id);
           $data =$request->all();

           if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file) {
                $extension=$file->getClientOriginalExtension();
                if($extension== 'png'){
                    $Image=time().'.'.$extension;
                    $dest='document/image/';
                    $imageUrl = $dest.$Image;
                    $file->move($dest,$Image);
                }
                elseif($extension== 'pdf'){
                    $PDF=time().'.'.$extension;
                    $dest2='document/file/';
                    $pdfUrl = $dest2.$PDF;
                    $file->move($dest2,$PDF);
                }else{
                    return redirect()->route('admin.editTask')->with('error','Please Upload Image or File');
                }  
            }
        }

            $task->title =$data['name'];
            $task->inst =$data['inst'];
            $task->topic =$data['topic'];
            if(!empty($imageUrl)){
                $task->img =$imageUrl;
                $task->pdf ="NULL";
                }
                if(!empty($pdfUrl)){
                $task->pdf =$pdfUrl;
                $task->img ="NULL";
            }
            $task->point =$data['point'];
            $task->exp_date =$data['exp_date'];
            $task->save();

            return redirect()->route('admin.viewTask')->with('success','Task Updated Successfully');
    }


   
}
