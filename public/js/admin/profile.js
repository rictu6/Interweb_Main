(function($){

   "use strict";
   var $muncit_id = $(".muncit_id").val();
   //active
   $('#profiles').addClass('active');

   $('#users_profiles_link').addClass('active');
   $('#users_profiles').addClass('menu-open');
   //select2
   $('.select2').select2();

   //remove the general validation and assign a new validation for the profile form
   $('#profile_form').removeData('validator');
   $('#profile_form').validate({
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


   $('#division').select2({
       width:"100%",
       placeholder:trans("Division"),
       ajax: {
          beforeSend:function()
          {
             $('.preloader').show();
             $('.loader').show();
          },
          url: ajax_url('get_divisions'),
          processResults: function (data) {
                return {
                      results: $.map(data, function (item) {
                         return {
                            text: item.acronym,
                            id: item.div_id
                         }
                      })
                };
             },
             complete:function()
             {
                $('.preloader').hide();
                $('.loader').hide();
             }
          }
     });
//selected province

$(document).on('select2:select','#division', function (e) {
   var el=$(e.target);
   var data = e.params.data;
   $.ajax({
       url:ajax_url('get_sections_by_div'+'?div_id='+ data.id),
       beforeSend:function(){
         $('.preloader').show();
         $('.loader').show();
       },

       success:function(sec)
       {
           if(!(Array.isArray(sec) && sec.length > 0)){
           //alert(sec);
//if null
           }
         $('#sec_id').empty();
         $.each(sec, function(index, item) {
             //alert(item.muncit_desc);
             $('#sec_id').append('<option value="' + item.sec_id + '">' + item.sec_desc + '</option>'); // name refers to the objects value when you do you ->lists('name', 'id') in laravel


         });


       },
       complete:function()
       {
         $('.preloader').hide();
         $('.loader').hide();
       }
   });
 });



//get province select2 intialize
$('#province').select2({
   width:"100%",
   placeholder:trans("Province"),
   ajax: {
      beforeSend:function()
      {
         $('.preloader').show();
         $('.loader').show();
      },
      url: ajax_url('get_provinces'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.prov_desc,
                        id: item.prov_code
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });

//selected province

$(document).on('select2:select','#province', function (e) {
 var el=$(e.target);
 var data = e.params.data;
 $.ajax({
     url:ajax_url('get_muncits_by_prov'+'?prov_code='+ data.id),
     beforeSend:function(){
       $('.preloader').show();
       $('.loader').show();
     },

     success:function(mun)
     {
       $('#muncit_id').empty();
       $.each(mun, function(index, item) {
           //alert(item.muncit_desc);
           $('#muncit_id').append('<option value="' + item.muncit_id + '">' + item.muncit_desc + '</option>'); // name refers to the objects value when you do you ->lists('name', 'id') in laravel
       });


     },
     complete:function()
     {
       $('.preloader').hide();
       $('.loader').hide();
     }
 });
});

    //get office select2 intialize
    $('#office').select2({
     width:"100%",
     placeholder:trans("Office"),
     ajax: {
        beforeSend:function()
        {
           $('.preloader').show();
           $('.loader').show();
        },
        url: ajax_url('get_offices'),
        processResults: function (data) {
              return {

                    results: $.map(data, function (item) {
                       return {
                          text: item.office_desc,
                          id: item.office_id
                       }
                    })
              };
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        }
   });
   $(document).on('select2:select','#office', function (e) {
       var el=$(e.target);
       var data = e.params.data;
       $.ajax({
           // url:ajax_url('get_muncits_by_prov'+'?prov_code='+ data.id),
           beforeSend:function(){
             $('.preloader').show();
             $('.loader').show();
           },

           success:function(nvm_this)
           {
           if(data.id===1){//region
               $('#province').prop('disabled', true);
               $('#muncit_id').prop('disabled', true);
           }else if(data.id===2)//province
           {
               $('#province').prop('disabled', false);
               $('#muncit_id').prop('disabled', true);
           }else{
               $('#province').prop('disabled', false);
               $('#muncit_id').prop('disabled', false);
           }

           },
           complete:function()
           {
             $('.preloader').hide();
             $('.loader').hide();
           }
       });
     });



    //get empstatus select2 intialize
    $('#empstatus').select2({
     width:"100%",
     placeholder:trans("Employee Status"),
     ajax: {
        beforeSend:function()
        {
           $('.preloader').show();
           $('.loader').show();
        },
        url: ajax_url('get_empstatuss'),
        processResults: function (data) {
              return {
                    results: $.map(data, function (item) {
                       return {
                          text: item.stat_desc,
                          id: item.emp_status_id
                       }
                    })
              };
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        }
   });




   //  //get section select2 intialize
   //  $('#section').select2({
   //     width:"100%",
   //     placeholder:trans("Section Status"),
   //     ajax: {
   //        beforeSend:function()
   //        {
   //           $('.preloader').show();
   //           $('.loader').show();
   //        },
   //        url: ajax_url('get_sections'),
   //        processResults: function (data) {
   //              return {
   //                    results: $.map(data, function (item) {
   //                       return {
   //                          text: item.sec_desc,
   //                          id: item.sec_id
   //                       }
   //                    })
   //              };
   //           },
   //           complete:function()
   //           {
   //              $('.preloader').hide();
   //              $('.loader').hide();
   //           }
   //        }
   //   });

//get position select2 intialize
$('#position').select2({
   width:"100%",
   placeholder:trans("Position Status"),
   ajax: {
      beforeSend:function()
      {
         $('.preloader').show();
         $('.loader').show();
      },
      url: ajax_url('get_positions'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.pos_desc,
                        id: item.pos_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });





   //  //get muncit select2 intialize
   //  $('#muncit').select2({
   //   width:"100%",
   //   placeholder:trans("Municipality Status"),
   //   ajax: {
   //      beforeSend:function()
   //      {
   //         $('.preloader').show();
   //         $('.loader').show();
   //      },
   //      url: ajax_url('get_muncits'),
   //      processResults: function (data) {
   //            return {
   //                  results: $.map(data, function (item) {
   //                     return {
   //                        text: item.muncit_desc,
   //                        id: item.muncit_id
   //                     }
   //                  })
   //            };
   //         },
   //         complete:function()
   //         {
   //            $('.preloader').hide();
   //            $('.loader').hide();
   //         }
   //      }
   // });








})(jQuery);
