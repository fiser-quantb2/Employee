@extends('layouts.master')

@section('title', 'Change password')

@section('content')
  <script type="text/javascript" src="{{URL::asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
  <style>
    footer.page-footer{
      margin-top: 33px;
    }
  </style>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Change password</h5>
        <ol class="breadcrumbs">
            <li><a href="#">EmployeeDirectory</a></li>
            <li><a href="#">Administration</a></li>
            <li class="active">Change password</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card-panel">
              <h4 class="header2">Change password</h4>
              <div class="row">
                <form class="col s12" id="validateChange">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-lock prefix"></i>
                      <label for="oldpass">Old Password</label>
                      <input id="oldpass" type="password" name="oldpass" class="validate" data-error='.errorTxt1'>
                      <div class="errorTxt1"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-lock-outline prefix"></i>
                      <label for="password">New Password</label>
                      <input id="password" type="password" name="password" class="validate" data-error='.errorTxt2'>
                      <div class="errorTxt2"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-lock-open prefix"></i>
                      <label for="password_confirmation">Confirm New Password</label>
                      <input id="password_confirmation" type="password" name="password_confirmation" class="validate" data-error='.errorTxt3'>
                      <div class="errorTxt3"></div>
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
    $(document).ready(function(){
      $('#adminactive').click();
      $('#adminactive').addClass('active');
      $('#changepassactive').addClass('active');
    });
  </script>
  <script type="text/javascript" src="{{URL::asset('js/validate/validateform.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/ajax/admin-ajax.js') }}"></script>
@endsection