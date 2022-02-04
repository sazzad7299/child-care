<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function addTask(Request $request)
    {
        return view('tasks.add_task');
    }
}
