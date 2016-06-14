@extends('layouts.master')

@section('title', 'Manage Departments')

@section('content')

<!--start container-->
<div class="container">
    <div class="row">
        <h5 class="breadcrumbs-title">List Department</h5>
        <div class="col s12 m12 l12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Office Number</th>
                        <th>Manager</th>
                        <th>Action</th>
                    </tr>
                </thead>
             
                <tbody>
                	@foreach($depts as $dept)
                    <tr id="row-{{$dept->id}}">
                        <td><a id="view-{{$dept->id}}" href="#modalview" >{{$dept->name}}</a></td>
                        <td>{{$dept->office_phone}}</td>
                        <td>{{$dept->getManager()}}</td>
                        <td>
                            <a id="delete-{{$dept->id}}" href="#modaldelete" style="margin-left:20px" class="waves-effect waves-circle waves-light btn-floating secondary-content" data-id="{{$dept->id}}">
                                <i class="mdi-action-delete"></i>
                            </a>
                            <a id="edit-{{$dept->id}}" href="#modaledit" class="waves-effect waves-circle waves-light btn-floating secondary-content" data-id="{{$dept->id}}">
                                <i class="mdi-image-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Day la modal edit -->
            <div id="modaledit" class="modal">
            	<form id="form-edit" action="{{url('admin/departments/editDepartment')}}" method="post" enctype="multipart/form-data">
				 	<input type="hidden" value="{{ Session::token() }}" name="_token">
	                <div class="modal-header">
	                    <h5 class="breadcrumbs-title">Edit Department</h5>
	                </div>
	                <div class="modal-content">
	                    <div class="input-field">
	                        <input id="edit-name" name="name-edit" type="text" class="validate" value="Quan Byn">
	                        <label for="name">Name</label>
	                    </div>
	                    <div class="input-field">
	                        <input id="edit-phone" name="phone-edit" type="number" class="validate" value="098746454">
	                        <label for="teacher">Office phone</label>
	                    </div>
	                    <div class="input-field">
	                        <!-- chon 1 trong cac employee thuoc department do de lam manager -->
	                        <select id="list_emp" name="manager-edit">
	                         	<option value="0" disabled selected>Choose manager</option>

	                          	@foreach($emps as $emp)
									<option id="edit-option-{{$emp->id}}" value="{{$emp->id}}">{{$emp->name}}</option>
	                      		@endforeach
	                        </select>
	                        <label>Select manager</label>
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
                    <h5 class="breadcrumbs-title">View Department</h5>
                </div>
                <div class="modal-content">
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-action-account-circle"></i> Name</div>
                          <div class="col s7 grey-text text-darken-4 right-align" id="view-name">Phong Giao Duc</div>
                        </div>
                      </li>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-communication-phone"></i> Office Phone</div>
                          <div class="col s7 grey-text text-darken-4 right-align" id="view-phone">01678776463</div>
                        </div>
                      </li>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-editor-insert-emoticon"></i> Manager</div>
                          <div class="col s7 grey-text text-darken-4 right-align" id="view-manager">Dao Tuan Anh</div>
                        </div>
                      </li>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5 grey-text darken-1"><i class="mdi-social-group"></i> List Employee in Department</div>
                          <div class="col s7 grey-text text-darken-4 right-align">
                               <ul id="view-emp" >
                                  <li class="collection-item">Dao Tuan Anh</li>
                                  <li class="collection-item">Tran Ba Quan</li>
                                  <li class="collection-item">Hiu Hiu</li>
                                  <li class="collection-item">He He</li>
                                </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <a href="#modaladd" class="modal-trigger btn-floating btn-large waves-effect waves-light "><i class="mdi-content-add"></i></a>
            <div id="modaladd" class="modal">
				 <form id="form-add" action="{{url('admin/departments/addDepartment')}}" method="post" enctype="multipart/form-data">
				 	<input type="hidden" value="{{ Session::token() }}" name="_token">
	                <div class="modal-header">
	                    <h5 class="breadcrumbs-title">Add Department</h5>
	                </div>
	                <div class="modal-content">
	                    <div class="input-field">
	                        <input id="name" name="name" type="text" class="validate">
	                        <label for="name">Name</label>
	                    </div>
	                    <div class="input-field">
	                        <input id="phone" name="phone" type="number" class="validate" >
	                        <label for="teacher">Office phone</label>
	                    </div>
	                    <div class="input-field">
	                        <!-- chon 1 trong cac employee da co de lam manager -->
	                        <select name="manager" >
	                          	<option value="0" disabled selected>Choose manager</option>
	                          	@foreach($emps as $emp)
									<option value="{{$emp->id}}">{{$emp->name}}</option>
	                          	@endforeach
	                          	
	                          	
	                        </select>
	                        <label>Select manager</label>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <a href="#" class="btn waves-effect waves-light red modal-action modal-close">Cancel</a>
	                    <a href="#" style="margin-right:20px" class="btn waves-effect waves-light green modal-action modal-close"><input type="submit" value="Add Department"></a>
	                </div>
	            </form>
            </div>
        </div>
    </div>
</div>
<!--end container-->

<script>
$(function(){
	$(document).on('submit', '#form-add', function(event) {
		
		//var formData = new FormData($(this));
		event.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			method: $(this).attr('method'),
			data: $(this).serialize(),
			//dataType: "json",
		})
		.done(function(data){
			alert("Thêm department thành công");
			$('#data-table-simple').dataTable().fnAddData([
				'<a id="view-'+data.id+'" href="#modalview" >'+data.name+'</a>',
				data.office_phone,
				data.manager,
				'<a id="delete-'+data.id+'" href="#modaldelete" style="margin-left:20px" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-action-delete"></i></a><a id="edit-'+data.id+'" href="#modaledit" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-image-edit"></i></a>'
			]);	
			
		})

		.fail(function(data){
			console.log(data);
		})
	});

	

	@foreach($depts as $dept)
		$('#data-table-simple').on('click', '#view-{{$dept->id}}', function(event) {
			
			$('#view-name').text('{{$dept->name}}');
			$('#view-phone').text('{{$dept->office_phone}}');
			$('#view-manager').text('{{$dept->getManager()}}');
			$('#view-emp').empty();
				@foreach($dept->employees()->get() as $employee)
				$('#view-emp').append('<li class="collection-item">{{$employee->name}}</li>')
				@endforeach
			if(($("#modalview").data('bs.modal') || {}).isShown){

			}
			else $('#modalview').openModal();
		});

		$('#data-table-simple').on('click', '#delete-{{$dept->id}}', function(event) {
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
					url: '{{url('admin/departments/deleteDepartment')}}'+'/'+dataId,
					method: 'delete',
				})
				.done(function(data){
					alert('Xóa thành công');
					$('#data-table-simple').dataTable().fnDeleteRow('#row-'+dataId);
				})
			});
		});


		$('#data-table-simple').on('click', '#edit-{{$dept->id}}', function(event) {
			$('#edit-name').attr('value', '{{$dept->name}}');
			$('#edit-phone').attr('value', '{{$dept->office_phone}}');

			//$('#edit-manager').
			if(($("#modaledit").data('bs.modal') || {}).isShown){

			}
			else $('#modaledit').openModal();

			var dataId = $(this).attr('data-id');

			$(document).on('submit', '#form-edit', function(event) {
				
				event.preventDefault();
				$.ajax({
					url: '{{url('admin/departments/editDepartment')}}'+'/'+ dataId,
					method: $(this).attr('method'),
					data: $(this).serialize(),
					//dataType: "json",
				})
				.done(function(data){
					alert("Sửa department thành công");
					console.log(data);
					$('#data-table-simple').dataTable().fnUpdate([
						'<a id="view-'+data.id+'" href="#modalview" >'+data.name+'</a>',
						data.office_phone,
						data.manager,
						'<a id="delete-'+data.id+'" href="#modaldelete" style="margin-left:20px" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-action-delete"></i></a><a id="edit-'+data.id+'" href="#modaledit" class="waves-effect waves-circle waves-light btn-floating secondary-content"><i class="mdi-image-edit"></i></a>'
					], '#row-'+dataId);	
				})

				.fail(function(data){
					console.log(data);
				})
			});
		});
	@endforeach

	
})
</script>

@endsection