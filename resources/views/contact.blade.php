@extends('layouts.master')

@section('title', 'Contact')

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/google-map/google-map-script.js')}}"></script>
<div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Contact</h5>
        <ol class="breadcrumbs">
            <li><a href="index.html">EmployeeDirectory</a></li>
            <li class="active">Contact</li>
        </ol>
      </div>
    </div>
</div>
<div class="container">
  <div class="section">

    <p class="caption">Have a question? Don't hesitate to send us a message. Our team will be happy to help you.</p>

    <div class="divider"></div>
    
    <div id="contact-page" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <div id="map-canvas" data-lat="21.036717" data-lng="105.782984"></div>
        </div>
        <div class="card-content">                    
            <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                <i class="mdi-editor-mode-edit"></i>
            </a>

            <div class="row">
              <div class="col s12 m6 ">
                <form class="contact-form">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="name" type="text">
                      <label for="first_name">Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" type="email">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="website" type="text">
                      <label for="website">Website</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="message" class="materialize-textarea"></textarea>
                      <label for="message">Message</label>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Send
                          <i class="mdi-content-send right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div> 
              <div class="col s12 m6">
                <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="mdi-communication-live-help"></i> About us</div>
                    <div class="collapsible-body" style="">
                      <p>We are team of Web Development subject, do project Employee Directory.</p>
                    </div>
                  </li>
                  <li class="active">
                    <div class="collapsible-header active"><i class="mdi-communication-email"></i> Need Help?</div>
                    <div class="collapsible-body" style="display: none;">
                      <p>We welcome your inquiries at the email address <a mailto="zzbynzz@gmail.com">zzbynzz@gmail.com</a>.We will get in touch with you soon.</p>
                    </div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="mdi-editor-insert-emoticon"></i> Testimonial</div>
                    <div class="collapsible-body" style="">
                      <blockquote>Fantastic product, my sites all run super fast and the support is excellent!<br>The website you designed helped a lot! </blockquote>
                    </div>
                  </li>
                </ul>
              </div>                  
        </div>
    </div>            
  </div>
</div>
@endsection