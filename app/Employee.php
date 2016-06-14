<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class Employee extends Model
{
	protected $fillable = [
        'name', 'photo', 'job_title', 'cellphone', 'email'
    ];

    public function department(){
    	return $this->hasOne('App\Department', 'manager_id');
    }

    public function departments(){
    	return $this->belongsToMany('App\Department', 'emp_depts', 'emp_id', 'dept_id');
    }

    public function workFor(){
    	if(sizeof($this->departments()->get()) > 0)
    		return $this->departments()->first()->name;
    	else return null;
    }

    public function attachDepartment(Department $department){
        return $this->departments()->attach($department->id);
    }

    public function detachDepartment(Department $department){
        return $this->departments()->detach($department->id);
    }
}
