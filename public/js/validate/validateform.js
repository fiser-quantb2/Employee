$("#validateAdd").validate({
    rules: {
        username: {
            required: true,
            minlength: 5
        },
        email: {
            required: true,
            email:true
        },
    },
    //For custom messages
    messages: {
        username:{
            required: "Enter a username",
            minlength: "Enter at least 5 characters"
        },
        email:{
            required: "Enter a email"
        },
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }
});
$('#validateChange').validate({
    rules: {
        oldpass : {
            required : true,
            minlength : 6
        },
        password : {
            required : true,
            minlength : 6
        },
        password_confirmation : {
            required : true,
            minlength : 6,
            equalTo : '#password'
        }
    },
    errorElement : 'div',
    errorPlacement : function(error, element) {
        var placement = $(element).data('error');
        if(placement) {
            $(placement).append(error)
        } else {
            error.insertAfter(element);
        }
    }
});
$('#validateLogin').validate({
    rules: {
        username : {
            required : true,
            minlength : 5
        },
        password : {
            required : true,
            minlength : 6
        }
    },
    errorElement : 'div',
    errorPlacement : function(error, element) {
        var placement = $(element).data('error');
        if(placement) {
            $(placement).append(error)
        }else {
            erorr.insertAfter(element);
        }
    }
});