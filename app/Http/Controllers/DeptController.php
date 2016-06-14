<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Employee;
use Validator;

class DeptController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$depts = Department::all();
    	$emps = Employee::all();
    	return view('department.index', compact('depts', 'emps'));
    }

    public function editDepartment(Request $request, $id){
    	
    	$rules = [
    		'name-edit' => 'required|min:6',
    		'phone-edit' => 'required',
    	];

    	$messages = [
    		'name-edit.required' => 'Name is required',
    		'name-edit.min' => 'Name is least 6 characters',
    		'phone-edit' => 'Phone is required',
    	];
    	$validator = Validator::make($request->all(),$rules,$messages);

    	if($validator->fails()){
    		return response()->json([
    			'error' => true,
    			'message' => $validator->errors() 
    		],200);
    	}

    	else{
    		$department = Department::find($id);

    		$department->name = $request->input('name-edit');
	    	$department->office_phone = $request->input('phone-edit');
	    	
    		$department->manager_id = $request->get('manager-edit');
    		
	    	$department->save();
			
			$department->manager = $department->getManager();

			return response()->json($department, 200);
		}

    	

    }

    public function addDepartment(Request $request){
    	$rules = [
    		'name' => 'required|min:6',
    		'phone' => 'required',
    	];

    	$messages = [
    		'name.required' => 'Name is required',
    		'name.min' => 'Name is least 6 characters',
    		'phone' => 'Phone is required',
    	];
    	$validator = Validator::make($request->all(),$rules,$messages);

    	if($validator->fails()){
    		return response()->json([
    			'error' => true,
    			'message' => $validator->errors() 
    		],200);
    	}
    	else{
    		$department = new Department;
    		$department->name = $request->input('name');
    		$department->office_phone = $request->input('phone');
    		if($request->get('manager') != '0'){
    			$department->manager_id = $request->get('manager');
    		}
    		
    		$department->save();

    		$department->manager = $department->getManager();
    		//$employee = Employee::where('email', '=', $request->input('email'))->first();

			return response()->json($department, 200);
		}
    }

    public function deleteDepartment( $id, Request $request ) {
	    $department = Department::findOrFail( $id );

	    if ( $request->ajax() ) {
	        $department->delete( $request->all() );

	        return response(['msg' => 'Hobby deleted', 'id' => $id, 'status' => 'success']);
	    }
	    return response(['msg' => 'Failed deleting the hobby', 'status' => 'failed']);
	}
}
