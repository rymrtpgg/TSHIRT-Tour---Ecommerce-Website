$(document).ready(function () {
    $('#form2').validate({
      rules: {
        username: {
          required: true,
        },
         email: {
          required: true,
        },
        password: {
          required: true,
          minlength: 8
        },
        conf_password: {
          required: true,
          minlength: 8
        }
      },
      messages: {
        username: {
          
          required: 'Please enter Name.'

      },
        password: {
          required: 'Please enter Password.',
          minlength: 'Password must be at least 8 characters long.',
        },
        conf_password: {
          required: 'Please enter Cofirm Password.',
          minlength: 'Password must be at least 8 characters long.',
        }        
      },
      submitHandler: function (form2) {
        form2.submit();
      }
    });
  });