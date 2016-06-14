@extends('layouts.master')

@section('title', 'Administration')

@section('content')
  <style>
    footer.page-footer{
      margin-top: 90px;
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
                  <form id="validateAdd" class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-account-circle prefix"></i>
                        <label for="username">Username</label>
                        <input id="username" type="text" name="username" class="validate" data-error=".errorTxt1">
                        <div class="errorTxt1"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-communication-email prefix"></i>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="validate" data-error=".errorTxt2">
                        <div class="errorTxt2"></div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <div class="preloader-wrapper">
                             <div class="spinner-layer spinner-blue">
                               <div class="circle-clipper left">
                                 <div class="circle"></div>
                               </div>
                               <div class="gap-patch">
                                 <div class="circle"></div>
                               </div>
                               <div class="circle-clipper right">
                                 <div class="circle"></div>
                               </div>
                             </div>
                           
                             <div class="spinner-layer spinner-red">
                               <div class="circle-clipper left">
                                 <div class="circle"></div>
                               </div>
                               <div class="gap-patch">
                                 <div class="circle"></div>
                               </div>
                               <div class="circle-clipper right">
                                 <div class="circle"></div>
                               </div>
                             </div>
                           
                             <div class="spinner-layer spinner-yellow">
                               <div class="circle-clipper left">
                                 <div class="circle"></div>
                               </div>
                               <div class="gap-patch">
                                 <div class="circle"></div>
                               </div>
                               <div class="circle-clipper right">
                                 <div class="circle"></div>
                               </div>
                             </div>
                           
                             <div class="spinner-layer spinner-green">
                               <div class="circle-clipper left">
                                 <div class="circle"></div>
                               </div>
                               <div class="gap-patch">
                                 <div class="circle"></div>
                               </div>
                               <div class="circle-clipper right">
                                 <div class="circle"></div>
                               </div>
                             </div>
                          </div>
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
  <script>
    $(document).ready(function(){
      $('#adminactive').click();
      $('#adminactive').addClass('active');
      $('#addadminactive').addClass('active');
    });
  </script>
  <script type="text/javascript" src="{{URL::asset('js/validate/validateform.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/ajax/admin-ajax.js') }}"></script>
@endsection