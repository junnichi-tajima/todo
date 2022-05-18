<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view('index',['tasks' => $tasks]);
    }
    
    public function add(Request $request)
    {
        $param = [
            'content' => $request->content,
            'updated_at' => null,
        ];
        DB::insert('insert into tasks(content,updated_at) values(:content,:updated_at)',$param);
        return redirect('/');
    }
    
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/');
    }
    
    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $task->content = $request->content;
        $task->save();
        // return redirect('/');
        return $request->content;
    }
}
