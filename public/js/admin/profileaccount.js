(function($){
        
    "use strict";

    //active
    $('#profileaccounts').addClass('active');
   
    $('#users_profiles_link').addClass('active');
    $('#users_profiles').addClass('menu-open');
    //select2
    $('.select2').select2();
    
    //remove the general validation and assign a new validation for the profile form
    $('#profileaccount_form').removeData('validator');
    $('#profileaccount_form').validate({
        rules:{
            user_name:{
                required:true,
            },
            email:{
                required:true,
                email:true
            },
            password_hash:{
                required:function(){
                    return $('#password_confirmation').val()!="";
                },
            },
            password_confirmation:{
                required:function(){
                    return $('#password_hash').val()!="";
                },
                equalTo:"#password_hash"
            }
        },
        messages:{
            password_confirmation:{
                equalTo:trans("Password confirmation does not match password")
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
    });





})(jQuery);
