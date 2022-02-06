<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Task;
use App\Models\Std_assignment;
use Carbon\Carbon;
use Auth;


class HomeController extends Controller
{
    //
    public function home(){
        $items=Item::where('status','1')->orderBy('id', 'desc')->get();
        $tasks=Task::whereDate('exp_date','>=',Carbon::now())->orderBy('exp_date', 'asc')->get();
        return view('home',compact('tasks','items'));
    }
    public function showItem(){
        $items=Item::where('status','1')->orderBy('id', 'desc')->get();
        return view('items',compact('items'));
    }
    public function show_assignment(){
        $tasks=Task::whereDate('exp_date','>=',Carbon::now())->orderBy('exp_date', 'asc')->get();
        return view('task',compact('tasks'));
    }
    public function assignment($id)
    {
    
        $task= Task::findOrFail($id);
        return view('single')->with(compact('task'));
    }
    public function PostAssignment(Request $request)
    {
            $data =$request->all();

            $file = $request->file('file');
            // echo "<pre>"; print_r($file); die;
            if ($file) {
                $extension=$file->getClientOriginalExtension();
                if($extension== 'pdf'){
                    $PDF=time().'.'.$extension;
                    $dest2='assignment/file/';
                    $pdfUrl = $dest2.$PDF;
                    $file->move($dest2,$PDF);
                }elseif($extension == 'png'||'PNG' || 'pNg' || 'PNg' || 'jpg' || 'JPg' || 'jpeg'){
                    $Image=time().'.'.$extension;
                    $dest='assignment/image/';
                    $imageUrl = $dest.$Image;
                    $file->move($dest,$Image);
                }
            }

            $task = new Std_assignment;
            $task->user_id =$data['user_id'];
            $task->task_id =$data['task_id'];
            if(!empty($imageUrl)){
                $task->img =$imageUrl;
                $task->pdf ="NULL";
            }
            if(!empty($pdfUrl)){
                $task->pdf =$pdfUrl;
                $task->img ="NULL";
            }
            $task->point =0;
            $task->status =0;
            $task->save();
            return redirect()->back()->with('success','Assignment Submitted Successfully');
        }

        public function item($id)
        {
            $item= Item::findOrFail($id);
            return view('item.single')->with(compact('item'));
        }


}
