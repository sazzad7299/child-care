<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    //
    public function viewChildren(Request $request)
    {
        return view('children.view_children');
    }
}
