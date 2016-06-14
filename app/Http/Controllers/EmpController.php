<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Employee;
use App\Department;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class EmpController extends Controller
{
    public function __construct(){
    	
    }

    public function index(){
    	$employees = Employee::all();
        $departments = Department::all();
    	return view('employee.index', compact('employees', 'departments'));
    }

    public function addEmployee(Request $request){
/*    	if(Auth::check()){*/
            $inputs = $request->all();
        	$rules = [
        		'name' => 'required|min:6',
        		'job' => 'required',
        		'phone' => 'required',
        		'email' => 'required'
        	];

        	$messages = [
        		'name.required' => 'Name is required',
        		'name.min' => 'Name is least 6 characters',
        		'job' => 'Job is required',
        		'phone' => 'Phone is required',
        		'email' => 'Email is required'
        	];
        	$validator = Validator::make($request->all(),$rules,$messages);

        	if($validator->fails()){
        		return response()->json([
        			'error' => true,
        			'message' => $validator->errors() 
        		],200);
        	}
        	else{
        		$employee = new Employee;
        		$employee->name = $request->input('name');
        		$employee->job_title = $request->input('job');
        		$employee->cellphone = $request->input('phone');
        		$employee->email = $request->input('email');
        		if ($request->hasFile('avatar')) {
                    $file = Input::file('avatar');;
                    $extension = $file->getClientOriginalExtension();
                    Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
                    $employee->photo = $file->getFilename().'.'.$extension;
    	        }


        		$employee->save();

                if($request->get('department') != "0"){
                    $employee->attachDepartment(Department::find($request->get('department')));
                }
        		// $employee = Employee::where('email', '=', $request->input('email'))->first();

                if($employee->workFor() != null)
                    $employee->workfor = $employee->workFor();
                else
                    $employee->workfor = "";


    			return response()->json($employee, 200);
    		}
/*        }*/
    }

    public function editEmployee(Request $request, $id){
/*        if(Auth::check()){*/
            $rules = [
                'name-edit' => 'required|min:6',
                'job-edit' => 'required',
                'phone-edit' => 'required',
                'email-edit' => 'required'
            ];

            $messages = [
                'name-edit.required' => 'Name is required',
                'name-edit.min' => 'Name is least 6 characters',
                'job-edit' => 'Job is required',
                'phone-edit' => 'Phone is required',
                'email-edit' => 'Email is required'
            ];
            $validator = Validator::make($request->all(),$rules,$messages);


            if($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors() 
                ],200);
            }
            else{
                $employee = Employee::find($id);
                
                $tmp = $employee->photo;

                $employee->name = $request->input('name-edit');
                $employee->job_title = $request->input('job-edit');
                $employee->cellphone = $request->input('phone-edit');
                $employee->email = $request->input('email-edit');
                
                if ($request->hasFile('avatar-edit')) {
                    $file = Input::file('avatar-edit');;
                    $extension = $file->getClientOriginalExtension();
                    Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
                    $employee->photo = $file->getFilename().'.'.$extension;
                }
                else{
                    $employee->photo = $tmp;
                }

                $employee->save();

                if($request->get('department-edit') != "0"){
                    if(sizeof($employee->departments()->get()) > 0)
                        $employee->detachDepartment($employee->departments()->first());
                    //$employee->attachDepartment(Department::find($request->get('department-edit')));
                    $employee->attachDepartment(Department::find($request->get('department-edit')));
                }

                if($employee->workFor() != null)
                    $employee->workfor = $employee->workFor();
                else
                    $employee->workfor = "";
                
                return response()->json($employee, 200);
            }
/*        }*/
    }

    public function getEmpImage($filename){
        if($filename != null){
            $file = Storage::disk('local')->get($filename);
            return new Response($file, 200);
        }
        else{
            $file = asset('images/avatar.png');
            return new Response($file, 200);
        }
    }
}
