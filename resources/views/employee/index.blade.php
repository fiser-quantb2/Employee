@extends('layouts.master')

@section('title', 'Manage Employees')

@section('content')
<div class="container">
	<div class="row">
	  <div class="col s12 m12 l12">
	    <h5 class="breadcrumbs-title">List Employee</h5>
	    <ol class="breadcrumbs">
	        <li><a href="index.html">EmployeeDirectory</a></li>
	        <li><a href="#">Employee</a></li>
	        <li class="active">List Employee</li>
	    </ol>
	  </div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Department</th>
                        <th>Job title</th>
                        <th>Email</th>
                        @if(Auth::check())
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
             
                <tbody>
                	@foreach($employees as $employee)
                    <tr id="row-{{$employee->id}}">
                        <td><a id="view-{{$employee->id}}" href="#modalview" >{{$employee->name}}</a></td>
                        <td>
                        	@if($employee->photo == null)
                        	<img src="{{URL::asset('images/avatar.png')}}" alt="" style="max-width:60px;display:block;margin:0 auto;height:60px"class="circle responsive-img valign profile-image">
                        	@else
                        	<img src="{{url('getImage').'/'.$employee->photo}}" alt="" style="max-width:60px;display:block;margin:0 auto;height:60px"class="circle responsive-img valign profile-image">
                        	@endif
                        </td>
                   
                        <td>{{$employee->workFor()}}</td>
                
                        <td>{{$employee->job_title}}</td>
                        <td>{{$employee->email}}</td>
                        @if(Auth::check())
                        <td>
                            <a id="delete-{{$employee->id}}" href="#modaldelete" style="margin-left:20px" class="waves-effect waves-circle waves-light btn-floating secondary-content" data-id="{{$employee->id}}">
                                <i class="mdi-action-delete"></i>
                            </a>
                            <a id="edit-{{$employee->id}}" href="#modaledit" class="waves-effect waves-circle waves-light btn-floating secondary-content" data-id="{{$employee->id}}">
                                <i class="mdi-image-edit"></i>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Day la modal edit -->
            <div id="modaledit" class="modal">
	            <form id="form-edit" action="{{url('admin/employees/editEmployee')}}" method="post" enctype="multipart/form-data">
	            <input type="hidden" value="{{ Session::token() }}" name="_token">
	                <div class="modal-header">
	                    <h5 class="breadcrumbs-title">Edit Employee</h5>
	                </div>
	                <div class="modal-content">
	                    <div class="row">
	                    <div class="col s6 m6 l6">
	                        <img id="edit-profile-photo" src="{{URL::asset('images/avatar.png')}}" alt="" style="max-width:60%;display:block;margin:0 auto"class="circle responsive-img valign profile-image">
	                        <div class="file-field input-field">
	                          <div class="btn">
	                            <span>File</span>
	                            <input type="file" name="avatar-edit" id="jimage2">
	                          </div>
	                          <div class="file-path-wrapper">
	                            <input class="file-path validate" type="text">
	                          </div>
	                        </div>
	                    </div>
	                    <div class="col s6 m6 l6">
	                        <div class="input-field">
	                            <input id="edit-name" name="name-edit" type="text" class="validate" value="Quan Byn">
	                            <label for="name">Name</label>
	                        </div>

	                        <div class="input-field">
	                            <input id="edit-job" name="job-edit" type="text" class="validate" value="Sinh vien">
	                            <label for="job">Job title</label>
	                        </div>
	                        <div class="input-field">
	                            <input id="edit-phone" name="phone-edit" type="number" class="validate" value="098746454">
	                            <label for="number">Cellphone</label>
	                        </div>
	                         <div class="input-field">
	                            <input id="edit-email" name="email-edit" type="email" class="validate" value="zzbynzz@gmail.com">
	                            <label for="email">Email</label>
	                        </div>
	                        <div class="input-field">
	                            <select name="department-edit">
	                              <option value="0" disabled selected>Choose department</option>
	                              @foreach($departments as $department)
	                              <option value="{{$department->id}}">{{$department->name}}</option>
	                             
	                              @endforeach
	                            </select>
	                            <label>Select department</label>
	                        </div>
	                    </div>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <a href="#" class="btn waves-effect waves-light red modal-action modal-close">Cancel</a>
	                    <a href="#" style="margin-right:20px" class="btn waves-effect waves-light green modal-action modal-close"><input type="submit" value="Confirm"></a>
	                </div>
	            </form>
            </div>
            <!-- Day la modal delete -->
            <div id="modaldelete" class="modal">
                <div class="modal-content">
                    <p>Are you sure to delete ?</p>                                    
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn waves-effect waves-light red modal-action modal-close">Cancel</a>
                    <a id="btn-confim-delete" href="#" style="margin-right:20px" class="btn waves-effect waves-light green modal-action modal-close">Confirm</a>
                </div>
            </div>
            <!-- Day la modal view -->
            <div id="modalview" class="modal">
                <div class="modal-header">
                    <h5 class="breadcrumbs-title">View Employee</h5>
                </div>
                <div class="modal-content">
                    <img id="view-photo" src="{{URL::asset('images/avatar.png')}}" alt="" style="max-width:200px;display:block;margin:0 auto"class="circle responsive-img valign profile-image">
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-action-account-circle"></i> Name</div>
                          <div id="view-name" class="col s7 grey-text text-darken-4 right-align">Quan Byn</div>
                        </div>
                      </li>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-communication-phone"></i> Cellphone</div>
                          <div id="view-phone" class="col s7 grey-text text-darken-4 right-align">01678776463</div>
                        </div>
                      </li>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-communication-email"></i> Email</div>
                          <div id="view-email" class="col s7 grey-text text-darken-4 right-align">zzbynzz@gmail.com</div>
                        </div>
                      </li>
                      
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-editor-insert-emoticon"></i> Jobtitle</div>
                          <div id="view-jobtitle" class="col s7 grey-text text-darken-4 right-align">Sinh vien</div>
                        </div>
                      </li>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-social-group"></i>Department</div>
                          <div id="view-department" class="col s7 grey-text text-darken-4 right-align">Phong Giao Duc
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l12">
        	@if(Auth::check())
            <a href="#modaladd" class="modal-trigger btn-floating btn-large waves-effect waves-light "><i class="mdi-content-add"></i></a>
            @endif
            <div id="modaladd" class="modal">

                <form id="form-add" action="{{url('admin/employees/addEmployee')}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">    
	                <input type="hidden" value="{{ Session::token() }}" name="_token">
	                <div class="modal-header">
	                    <h5 class="breadcrumbs-title">Add Employee</h5>
	                </div>
	                <div class="modal-content">
	                    <div class="row">
	                    	               		
		                    <div class="col s6 m6 l6">
		                        <img id="photo-add" src="{{URL::asset('images/avatar.png')}}" alt="" style="max-width:60%;display:block;margin:0 auto"class="circle responsive-img valign profile-image">
		                        <div class="file-field input-field">
		                          <div class="btn">
		                            <span>File</span>
		                            <input id="jimage" name="avatar" type="file">
		                          </div>
		                          <div class="file-path-wrapper">
		                            <input class="file-path validate" type="text">
		                          </div>
		                        </div>
		                    </div>
		                    <div class="col s6 m6 l6">
		                        <div class="input-field">
		                            <input name="name" id="name" type="text" class="validate" value="">
		                            <label for="name">Name</label>
		                        </div>

		                        <div class="input-field">
		                            <input name="job" id="job" type="text" class="validate" value="">
		                            <label for="job">Job title</label>
		                        </div>
		                        <div class="input-field">
		                            <input name="phone" id="phone" type="number" class="validate" value="">
		                            <label for="number">Cellphone</label>
		                        </div>
		                         <div class="input-field">
		                            <input name="email" id="email" type="email" class="validate" value="">
		                            <label for="email">Email</label>
		                        </div>
		                        <div class="input-field">
		                            <select name="department">
		                              <option value="0" disabled selected>Choose department</option>
		                              @foreach($departments as $department)
		                              <option value="{{$department->id}}">{{$department->name}}</option>
		                             
		                              @endforeach
		                            </select>
		                            <label>Select department</label>
		                        </div>
		                        
		                    </div>
	                    </div>
	                </div>

	                <div class="modal-footer">
	                    <a href="#" class="btn waves-effect waves-light red modal-action modal-close">Cancel</a>
	                   	<a href="#" style="margin-right:20px" class="btn waves-effect waves-light green modal-action modal-close"><input type="submit" value="Add Employee"></a>
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end container-->

<!-- End main -->

<script>

$(function(){
	
	$(document).ready(function() {
	    document.getElementById("jimage").onchange = function () {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            document.getElementById("photo-add").src = e.target.result;
	        };
	        reader.readAsDataURL(this.files[0]);
	    };

	    document.getElementById("jimage2").onchange = function () {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            document.getElementById("edit-profile-photo").src = e.target.result;
	        };
	        reader.readAsDataURL(this.files[0]);
	    };
	});

	@foreach($employees as $employee)
	$('#data-table-simple').on('click', '#delete-{{$employee->id}}', function(event) {
		if(($("#modaldelete").data('bs.modal') || {}).isShown){

		}
		else $('#modaldelete').openModal();

		var dataId = $(this).attr('data-id');

		$('#btn-confim-delete').click(function(event) {
			/* Act on the event */
			$.ajaxSetup({
              	headers: {
                  	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              	}
      		});
			$.ajax({
				url: '{{url('admin/employees/deleteEmployee')}}'+'/'+dataId,
				method: 'delete',
			})
			.done(function(data){
				alert('Xóa thành công');
				$('#data-table-simple').dataTable().fnDeleteRow('#row-'+dataId);
			})
		});
	});

	$('#data-table-simple').on('click', '#view-{{$employee->id}}', function(event) {
		/* Act on the event */
		@if($employee->photo != null) 
			$('#view-photo').attr('src', "{{url('getImage').'/'.$employee->photo}}");
		@endif
		$('#view-name').text('{{$employee->name}}');
		$('#view-phone').text('{{$employee->cellphone}}');
		$('#view-email').text('{{$employee->email}}');
		$('#view-jobtitle').text('{{$employee->job_title}}');
		$('#view-department').text('{{$employee->workFor()}}');
		if(($("#modalview").data('bs.modal') || {}).isShown){

		}
		else $('#modalview').openModal();
	});

	$('#data-table-simple').on('click', '#edit-{{$employee->id}}', function(event) {
		/* Act on the event */
		@if($employee->photo != null) 
			$('#edit-profile-photo').attr('src', "{{url('getImage').'/'.$employee->photo}}");
		@endif
		$('#edit-name').val('{{$employee->name}}');
		$('#edit-phone').val('{{$employee->cellphone}}');
		$('#edit-email').val('{{$employee->email}}');
		$('#edit-jobtitle').val('{{$employee->job_title}}');
		
		if(($("#modaledit").data('bs.modal') || {}).isShown){

		}
		else $('#modaledit').openModal();

		var dataId = $(this).attr('data-id');

		$(document).on('submit', '#form-edit', function(event) {

			event.preventDefault();
			$.ajax({
				url: "{{url('admin/employees/editEmployee')}}"+"/"+dataId,
				method: "post",
				data: new FormData($(this)[0]),
				processData: false,
				contentType: false
			})
			.done(function(data){
				Materialize.toast("Edit employee successful !",4000);
				console.log(data);
				if(data.photo != null){
					photo = '<img src="{{url('getImage')."/"}}'+data.photo+'" alt="" style="max-width:60px;display:block;margin:0 auto"class="circle responsive-img valign profile-image">'
				}
				else{
					photo = '<img src="{{URL::asset('images/avatar.png')}}" alt="" style="max-width:60px;display:block;margin:0 auto"class="circle responsive-img valign profile-image">'
				}
				
				$('#data-table-simple').dataTable().fnUpdate([
					'<a id="view-'+data.id+'" href="#modalview" >'+data.name+'</a>',
					photo,
					data.workfor,
					data.job_title,
					data.email,
					'<a id="delete-'+data.id+'" href="#modaldelete" style="margin-left:20px" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-action-delete"></i></a><a id="edit-'+data.id+'" href="#modaledit" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-image-edit"></i></a>'
				], '#row-'+dataId);	

				
			})
			.fail(function(data){
				Materialize.toast("Edit employee failed !",4000);
				console.log(data);
			})
		});
	});

	@endforeach


	$(document).on('submit', '#form-add', function(event) {
		
		var formData = new FormData($(this));
		event.preventDefault();
		$.ajax({
			url: "{{url('admin/employees/addEmployee')}}",
			method: "post",
			data: new FormData($(this)[0]),
			processData: false,
			contentType: false
		})
		.done(function(data){
			Materialize.toast("Add employee successful !",4000);
			console.log(data.workfor);
			if(data.photo != null){
				photo = '<img src="{{url('getImage')."/"}}'+data.photo+'" alt="" style="max-width:60px;display:block;margin:0 auto"class="circle responsive-img valign profile-image">'
			}
			else{
				photo = '<img src="{{URL::asset('images/avatar.png')}}" alt="" style="max-width:60px;display:block;margin:0 auto"class="circle responsive-img valign profile-image">'
			}
			
			$('#data-table-simple').dataTable().fnAddData([
				'<a id="view-'+data.id+'" href="#modalview" >'+data.name+'</a>',
				photo,
				data.workfor,
				data.job_title,
				data.email,
				'<a id="delete-'+data.id+'" href="#modaldelete" style="margin-left:20px" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-action-delete"></i></a><a id="edit-'+data.id+'" href="#modaledit" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-image-edit"></i></a>'
			]);	
			
		})
		.fail(function(data){
			Materialize.toast("Add employee failed !",4000);
			console.log(data);
		})
	});
});

</script>


@endsection