<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $table = 'tasks';   //
	protected $fillable =['name','done'];  //可以通過的參數
	//protected $guarded =[];
}
