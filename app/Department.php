<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Department extends Model
{
	protected $fillable = [
        'name', 'office_phone', 'manager_id'
    ];

    public function manager(){
    	return $this->belongsTo('App\Employee', 'manager_id');
    }

    public function employees(){
    	return $this->belongsToMany('App\Employee', 'emp_depts', 'dept_id', 'emp_id');
    }

    public function getManager(){
    	if(sizeof($this->manager()->first()) > 0)
    		return $this->manager()->first()->name;
    	else return "";
    }

    public function setManager(Employee $emp){
    	$this->manager_id = $emp->id;
    	$this->save();
    }
}
