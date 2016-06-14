@extends('layouts.master')

@section('title', 'Administration')

@section('content')
	<style>
		footer.page-footer{
			margin-top: 109px;
		}
	</style>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Add administrator</h5>
        <ol class="breadcrumbs">
            <li><a href="index.html">EmployeeDirectory</a></li>
            <li><a href="#">Administration</a></li>
            <li class="active">Add administrator</li>
        </ol>
      </div>
    </div>
  </div>
	<div class="container">
      <div class="row">
          <div class="col s12 m12 l6 offset-l3">
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
      </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/ajax/admin-ajax.js') }}"></script>
@endsection