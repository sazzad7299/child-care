<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    //
    public function addItem(Request $request)
    {
 
        if($request->isMethod('post')){
            $request->validate([
                'title'=>'required|unique:items|max:25',
                'desc'=>'required',
                'point'=>'required',
                'file'=>'required',
            ]);

            $data =$request->all();

            $file = $request->file('file');
            if ($file) {
                $extension=$file->getClientOriginalExtension();
                if($extension== 'png' || 'jpg'){
                    $Image=time().'.'.$extension;
                    $dest='item/image/';
                    $imageUrl = $dest.$Image;
                    $file->move($dest,$Image);
                }else{
                    return redirect()->route('admin.addItem')->with('error','Please Upload Image');
                }  
            }

            $task = new Item;
            $task->title =$data['title'];
            $task->desc =$data['desc'];
            $task->point =$data['point'];
            if(!empty($imageUrl)){
                $task->img =$imageUrl;
            }
            $task->status =1;
            $task->save();
            return redirect()->route('admin.addItem')->with('success','Item Added Successfully');
        }
        return view('item.add_item');
    }
    public function viewItem(){
        $items=Item::all();
        return view('item.view_item',compact('items'));
    }
    public function editItem($id){
        $item=Item::findOrFail($id);
        return view('item.edit_item',compact('item'));
    }

    public function updateItem(Request $request)
    {
        $item =Item::findOrFail($request->id);
        $data =$request->all();
 
            $file = $request->file('file');
            if ($file) {
                $extension=$file->getClientOriginalExtension();
                if($extension== 'png' || 'jpg'){
                    $Image=time().'.'.$extension;
                    $dest='item/image/';
                    $imageUrl = $dest.$Image;
                    $file->move($dest,$Image);
                }else{
                    return redirect()->route('admin.editItem')->with('error','Please Upload Image');
                }  
            }
            $item->title =$data['title'];
            $item->desc =$data['desc'];
            $item->point =$data['point'];
            if(!empty($imageUrl)){
                $item->img =$imageUrl;
            }
            $item->status =1;
            $item->save();
            return redirect()->route('admin.viewItem')->with('success','Item Updated Successfully');
        }

        public function deleteItem($id){
            $item=Item::findOrFail($id);
    
            $image_path = public_path("$item->img");    
            if(!empty($image_path)){
            unlink($image_path);     
           }
            $item->delete();
            return back()->with('success','Item delete successfully');
        }
}
