@extends('layouts.master')

@section('title', 'Administration')

@section('content')
	<style>
		footer.page-footer{
			margin-top: 400px;
		}
	</style>
	<div class="container">
        <h5 class="breadcrumbs-title">Administration</h5>
        <div class="row">
            <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">Add admin</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="username" type="text" class="validate">
                          <label for="username">Username</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-communication-email prefix"></i>
                          <input id="email" type="email" class="validate">
                          <label for="email">Email</label>
                        </div>
                      </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button id="addadmin" class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">Change password</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
			              <div class="input-field col s12">
			                <i class="mdi-action-lock-outline prefix"></i>
			                <input id="newpass" type="password" name="newpass" class="validate">
			                <label for="newpass">New Password</label>
			              </div>
			          </div>
			          <div class="row">
			              <div class="input-field col s12">
			                 <button id="change" class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
			                    <i class="mdi-content-send right"></i>
			                 </button>
			              </div>
			          </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script>
	$(function() {
        $('#addadmin').click(function(e) {
          e.preventDefault();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
          $.ajax({
              'url' : "{{url('admin/add')}}",
              'data': {
                'username' : $('#username').val(),
                'email' : $('#email').val()
              },
              'type' : 'POST',
              success: function (data) {
                if (data.message != undefined) {
                  Materialize.toast("Added admin and send password to mail success ! Please check mail !",4000);
                }
              }
            });
        })
        $('#change').click(function(e) {
          e.preventDefault();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
          $.ajax({
              'url' : 'admin/changepass',
              'data': {
                'newpass' : $('#newpass').val()
              },
              'type' : 'POST',
              success: function (data) {
                console.log(data.message);
                if (data.error == true) {
                  if (data.message.newpass != undefined) {
                    Materialize.toast(data.message.newpass[0],4000);
                  }
                } else {
                  Materialize.toast("Change password successful!",4000);
                  setTimeout(function(){
                  		$('#newpass').val('');
                  },1000);
                }
              }
            });
        })
      });
	</script>
@endsection