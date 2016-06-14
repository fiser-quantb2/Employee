@extends('layouts.master')

@section('title', 'Administration')

@section('content')
<form method="POST" enctype="multipart/form-data" url="upload/img">
  <div class="row">
    <div class="input-field col s12">
      <a href="#modal1" class="modal-trigger">hehehe</a>
      <div id="modal1" class="modal">
        <div class="modal-content">
          <div class="file-field input-field">
	          <div class="btn">
	            <span>File</span>
	            <input type="file" name="image" id="image">
	          </div>
          </div>
          {!! csrf_field() !!}
          <input type="submit">
        </div>
      </div>
    </div>
  </div>
</form>
@endsection