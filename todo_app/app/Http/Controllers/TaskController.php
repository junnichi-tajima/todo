<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Http\Request;
use DateTime;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view('index',['tasks' => $tasks]);
    }
    
    public function add(Request $request)
    {
         $validate_rule = [
             'content' => 'required|string|max:20'
         ];
         $this->validate($request,$validate_rule);
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
         $validate_rule = [
             'content' => 'required|string|max:20'
         ];
         $this->validate($request,$validate_rule);
         
        $task = Task::find($request->id);
        $task->content = $request->content;
        $date = new DateTime('Asia/Tokyo');
        $task->updated_at = $date->format('Y-m-d H:i:s');
        $task->save();
        return redirect('/');
        // return $request->content;
    }
}
