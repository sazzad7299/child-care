<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ChildrenController extends Controller
{
    //
    public function viewChildren(Request $request)
    {
        $students=User::all();
        return view('children.view_children',compact('students'));
    }
    public function editStudent($id){
        $student=User::findOrFail($id);
        return view('children.edit_children',compact('student'));
    }

    public function updateChildren(Request $request)
    {
         $student =User::findOrFail($request->id);

            $student->name =$request['name'];
            $student->email =$request['email'];
            $student->save();

            return redirect()->route('admin.viewChildren')->with('success','Children Updated Successfully');
    }

    public function deleteStudent($id){
        $student=User::findOrFail($id);
        $student->delete();
        return redirect()->route('admin.viewChildren')->with('success','Children Delete Successfully');
    }
   
}
