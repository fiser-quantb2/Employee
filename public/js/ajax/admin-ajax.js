$(function() {
  $('#addadmin').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ajaxStart(function(){
      $(".preloader-wrapper").addClass('active');
    });

    $(document).ajaxComplete(function(){
      $(".preloader-wrapper").removeClass('active');
    });
    $.ajax({
        'url' : 'add',
        'data': {
          'username' : $('#username').val(),
          'email' : $('#email').val(),      
        },
        'type' : 'POST',
        success: function (data) {
          if (data.error == true) {
            if(data.message.username != undefined){
              Materialize.toast(data.message.username[0],4000);
            }
            if(data.message.email != undefined){
              Materialize.toast(data.message.email[0],4000);
            }
            if (data.message.erroruser != undefined) {
              Materialize.toast(data.message.erroruser[0],4000);
            }
            if (data.message.erroremail != undefined){
              Materialize.toast(data.message.erroremail[0],4000);
            }
          }else{
            $('.test').hide();
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
        'url' : 'changepass',
        'data': {
          'oldpass' : $('#oldpass').val(),
          'password' : $('#password').val(),
          'password_confirmation' : $('#password_confirmation').val()
        },
        'type' : 'POST',
        success: function (data) {
          console.log(data.message);
          if (data.error == true) {
            if (data.message.oldpass != undefined) {
              Materialize.toast(data.message.oldpass[0],4000);
            }
            if (data.message.password != undefined) {
              Materialize.toast(data.message.password[0],4000);
            }
            if(data.message.password_confirmation != undefined) {
              Materialize.toast(data.message.password_confirmation[0],4000);
            };
            if (data.message.errorpass != undefined) {
              Materialize.toast(data.message.errorpass[0],4000);
            }
          } else {
            Materialize.toast("Change password successful!",4000);
            setTimeout(function(){
            		$('#oldpass').val('');
                $('#password').val('');
                $('#password_confirmation').val('');
                $('#oldpass').blur();
                $('#password').blur();
                $('#password_confirmation').blur();
            },1000);
          }
        }
      });
  })
});