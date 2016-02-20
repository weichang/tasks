<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
	  public function index() {
	  	
	  /*	$tasks=[];
	  	for ($i=0; $i < 10; $i++) { 
	  		$task = new \stdClass();
	  		$task->name='task '.($i+1);
	  		$tasks[] = $task;
	  	}*/

	  	$tasks=Task::orderBy('created_at','desc')->get();
	  	$data = ['tasks' => $tasks];
		return view('tasks.index',$data);
	  }

	 public function store(Request $request){
	 	  //dd() 測試工具

		 //dd($request->all());
	 	 $this->validate($request,[
	 	 	'name'=>'required'
	 	 ]);
	 	 Task::create($request->all());	
		 return  redirect('/');
	 }

	 public  function update(Task $task){
	 	$task->done = true;
	 	$task->save();
	 	return  redirect('/');
	 }

	 public function destroy(Task $task){

	 	$task->delete();
	 	return  redirect('/');	
	 }

}
