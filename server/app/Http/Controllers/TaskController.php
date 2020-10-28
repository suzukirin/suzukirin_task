<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    // indexページへ移動
     public function index()
     {
         // モデル名::テーブル全件取得
         $tasks = Task::all();
         // taskティレクトリーの中のindexページを指定し、tasksの連想配列を代入
       return view('tasks.index', ['tasks' => $tasks]);
     }

    //public function create()
    //{
    //    return view('tasks.create');
    //}


    public function store(TaskRequest $request)
    {
// インスタンスの作成
     $task = new Task;

    // 値の用意
     $task->title = $request->title;
     $task->body = $request->body;
    
     $task->timestamps =false;


// インスタンスに値を設定して保存
     $task->save();
     // 登録したらindexに戻る
     return redirect('/tasks');
      }

    // showページへ移動
     public function show($id)
     {
         $task = Task::find($id);
       return view('tasks.show', ['task' => $task]);
     }
    
       public function edit($id) 
     {
         $task = Task::find($id);
         return view('tasks.edit', ['task' => $task]);
     }

      public function update(TaskRequest $request, $id) 
     {
         // ここはidで探して持ってくる以外はstoreと同じ
         $task = Task::find($id);

         // 値の用意
         $task->title = $request->title;
         $task->body = $request->body;
         
        
         $task->timestamps = false;

         // 保存
         $task->save();

         // 登録したらindexに戻る
         return redirect('/tasks');
     }

          public function destroy($id)
     {
         $task = Task::find($id);
         $task->delete();
         return redirect('/tasks');
     }

        
}
