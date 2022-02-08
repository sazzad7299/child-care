<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Task;
use App\Models\Std_assignment;
use App\Models\Purchase;
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


    public function UpdateAssignment(Request $request)
    {
            $task=Std_assignment::findOrFail($request->id);

            if ($request->hasFile('file')) {
            $file = $request->file('file');
            // echo "<pre>"; print_r($file); die;
            if ($file) {
                $extension=$file->getClientOriginalExtension();
                if($extension== 'pdf'){

                    $image_path = public_path("$task->pdf");    
                    if(!empty($image_path)){
                    unlink($image_path);     
                   }

                    $PDF=time().'.'.$extension;
                    $dest2='assignment/file/';
                    $pdfUrl = $dest2.$PDF;
                    $file->move($dest2,$PDF);

                }elseif($extension == 'png'||'PNG' || 'pNg' || 'PNg' || 'jpg' || 'JPg' || 'jpeg'){

                    $image_path = public_path("$task->img");    
                    if(!empty($image_path)){
                    unlink($image_path);     
                   }
                   
                    $Image=time().'.'.$extension;
                    $dest='assignment/image/';
                    $imageUrl = $dest.$Image;
                    $file->move($dest,$Image);
                }
            }
        }

           
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
            return redirect()->back()->with('success','Assignment UPDATED Successfully');
        }

        public function item($id)
        {
            $item= Item::findOrFail($id);
            return view('item.single')->with(compact('item'));
        }

        public function item_buy(Request $request)
        {
            $data =$request->all();
            $TotalSum=\DB::table('std_assignments')->where('user_id',$data['user_id'])
                            ->where('status','1')->max('point_sum');

            if($TotalSum >= $data['point']){
            $purchase = new Purchase;
            $purchase->user_id =$data['user_id'];
            $purchase->item_id =$data['item_id'];
            $purchase->point =$data['point'];
            $purchase->status =0;
            $purchase->save();

            $sum=$TotalSum - $data['point'];

            $users=\DB::table('std_assignments')->where('user_id',$data['user_id'])
            ->where('status','1')->get();

            foreach($users as $user){
                \DB::table('std_assignments')
                ->where('user_id',$data['user_id'])
                ->update(['point_sum' => $sum]);
            } 
            return redirect()->back()->with('success','Item Buy Successfully');
            }else{
                return redirect()->back()->with('success','Not enoungh point for buy this item');
            }

        }


    public function showOrders(Request $request)
        {
        $purchases=Purchase::where('user_id',$request->user_id)->get();
        return view('order.view_purchase',compact('purchases'));
      }
}
