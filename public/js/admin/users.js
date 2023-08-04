(function($){

   "use strict";
  //active
  $('#users').addClass('active');
   //datatable
   var table=$('#users_table').DataTable( {
       dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
       "<'row'<'col-sm-12'tr>>" +
       "<'row'<'col-sm-4'i><'col-sm-8'p>>",
       buttons: [
           {
               extend:    'copyHtml5',
               text:      '<i class="fas fa-copy"></i> '+trans("Copy"),
               titleAttr: 'Copy'
           },
           {
               extend:    'excelHtml5',
               text:      '<i class="fas fa-file-excel"></i> '+trans("Excel"),
               titleAttr: 'Excel'
           },
           {
               extend:    'csvHtml5',
               text:      '<i class="fas fa-file-csv"></i> '+trans("CVS"),
               titleAttr: 'CSV'
           },
           {
               extend:    'pdfHtml5',
               text:      '<i class="fas fa-file-pdf"></i> '+trans("PDF"),
               titleAttr: 'PDF'
           },
           {
             extend:    'colvis',
             text:      '<i class="fas fa-eye"></i>',
             titleAttr: 'PDF'
           }
       ],
       "processing": true,
       "serverSide": true,
       "bSort" : false,
         "ajax": {
             url:url("admin/get_users")
         },
         // orderCellsTop: true,
         fixedHeader: true,
         "columns": [
           {data:"emp_id"},
           {data:"pic_emp", name:"pic_emp", sortable: false, searchable: false,
           render: function( data, type, full, meta ) {


                    if (data === '' || data === null) {
                       return '<img src="/img/no-image.png" style="width:50px" />'

                   }
                   else
                   {

                    return "<img  src=\"/uploads/signature/"  + data + "\" height=\"50\"/  class=\"img-circle elevation-2\" />";
                   }



           } },



           {data:"bio_id"},
           {data:"last_name"},
           {data:"first_name"},
           {data:"email"},
           {data:"roles"},
           {data:"action",searchable:false,orderable:false,sortable:false}
         ],
         "language": {
           "sEmptyTable":     trans("No data available in table"),
           "sInfo":           trans("Showing")+" _START_ "+trans("to")+" _END_ "+trans("of")+" _TOTAL_ "+trans("records"),
           "sInfoEmpty":      trans("Showing")+" 0 "+trans("to")+" 0 "+trans("of")+" 0 "+trans("records"),
           "sInfoFiltered":   "("+trans("filtered")+" "+trans("from")+" _MAX_ "+trans("total")+" "+trans("records")+")",
           "sInfoPostFix":    "",
           "sInfoThousands":  ",",
           "sLengthMenu":     trans("Show")+" _MENU_ "+trans("records"),
           "sLoadingRecords": trans("Loading..."),
           "sProcessing":     trans("Processing..."),
           "sSearch":         trans("Search")+":",
           "sZeroRecords":    trans("No matching records found"),
           "oPaginate": {
               "sFirst":    trans("First"),
               "sLast":     trans("Last"),
               "sNext":     trans("Next"),
               "sPrevious": trans("Previous")
           },
         }
   });


   $('#users_roles_link').addClass('active');
   $('#users_roles').addClass('menu-open');

   //prepare edit user page
   var user_roles=$('#user_roles').val();

   if(user_roles!=null)
   {
       var user_roles= JSON.parse(user_roles);
       var roles=[];
       console.log('yes');
       user_roles.forEach(function(role){
           roles.push(parseInt(role.role_id));
       });
       console.log(roles);

       $('#roles_assign').val(roles).trigger('change');
   }

   $('.select2').select2();




  //create division
  $('#create_division').on('submit',function(e){
     e.preventDefault();

     var data=$('#create_division').serialize();

     var valid=$(this).valid();

     if(valid)
     {
        $.ajax({
           url:ajax_url("create_division"),
           type:"post",
           data:data,
           beforeSend:function(){
              $('.preloader').show();
              $('.loader').show();
           },
           success:function(data){
              $('#division').append(`<option value="`+data.div_id+`">`+data.div_desc+`</option>`);
              $('#division').val(data.div_id).trigger('select2:select');
              $('#division_modal').modal('hide');
              toastr.success(trans('Division saved successfully'),trans('Success'));
              $('#division_modal_error').html(``);
              $('#create_division_inputs input').val(``);
           },
           error:function(xhr, status, error){
                 toastr.error(trans('Something went wrong'),trans('Failed'));
                 var errors=xhr.responseJSON.errors;
                 var error_html=`<div class="callout callout-danger">
                                   <h5 class="text-danger">
                                      <i class="fa fa-times"></i> `+trans("Failed")+`
                                   </h5>
                                   <ul>`;
                 for (var key in errors){
                    error_html+=`<li>`+errors[key]+`</li>`;
                 }
                 error_html+=`</ul></div>`;
                 $('#division_modal_error').html(error_html);
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        });
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
               {$('#muncit_id').prop('disabled', true);
                   $('#province').prop('disabled', false);

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

  //create office
  $('#create_office').on('submit',function(e){
     e.preventDefault();

     var data=$('#create_office').serialize();

     var valid=$(this).valid();

     if(valid)
     {
        $.ajax({
           url:ajax_url("create_office"),
           type:"post",
           data:data,
           beforeSend:function(){
              $('.preloader').show();
              $('.loader').show();
           },
           success:function(data){
              $('#office').append(`<option value="`+data.office_id+`">`+data.office_desc+`</option>`);
              $('#office').val(data.office_id).trigger('select2:select');
              $('#office_modal').modal('hide');
              toastr.success(trans('Office saved successfully'),trans('Success'));
              $('#office_modal_error').html(``);
              $('#create_office_inputs input').val(``);
           },
           error:function(xhr, status, error){
                 toastr.error(trans('Something went wrong'),trans('Failed'));
                 var errors=xhr.responseJSON.errors;
                 var error_html=`<div class="callout callout-danger">
                                   <h5 class="text-danger">
                                      <i class="fa fa-times"></i> `+trans("Failed")+`
                                   </h5>
                                   <ul>`;
                 for (var key in errors){
                    error_html+=`<li>`+errors[key]+`</li>`;
                 }
                 error_html+=`</ul></div>`;
                 $('#office_modal_error').html(error_html);
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        });
     }
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



  //create empstatus
  $('#create_empstatus').on('submit',function(e){
     e.preventDefault();

     var data=$('#create_empstatus').serialize();

     var valid=$(this).valid();

     if(valid)
     {
        $.ajax({
           url:ajax_url("create_empstatus"),
           type:"post",
           data:data,
           beforeSend:function(){
              $('.preloader').show();
              $('.loader').show();
           },
           success:function(data){
              $('#empstatus').append(`<option value="`+data.emp_stat_id+`">`+data.stat_desc+`</option>`);
              $('#empstatus').val(data.emp_stat_id).trigger('select2:select');
              $('#empstatus_modal').modal('hide');
              toastr.success(trans('Employee Status saved successfully'),trans('Success'));
              $('#empstatus_modal_error').html(``);
              $('#create_empstatus_inputs input').val(``);
           },
           error:function(xhr, status, error){
                 toastr.error(trans('Something went wrong'),trans('Failed'));
                 var errors=xhr.responseJSON.errors;
                 var error_html=`<div class="callout callout-danger">
                                   <h5 class="text-danger">
                                      <i class="fa fa-times"></i> `+trans("Failed")+`
                                   </h5>
                                   <ul>`;
                 for (var key in errors){
                    error_html+=`<li>`+errors[key]+`</li>`;
                 }
                 error_html+=`</ul></div>`;
                 $('#empstatus_modal_error').html(error_html);
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        });
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



    //create section
    $('#create_section').on('submit',function(e){
       e.preventDefault();

       var data=$('#create_section').serialize();

       var valid=$(this).valid();

       if(valid)
       {
          $.ajax({
             url:ajax_url("create_section"),
             type:"post",
             data:data,
             beforeSend:function(){
                $('.preloader').show();
                $('.loader').show();
             },
             success:function(data){
                $('#section').append(`<option value="`+data.pos_id+`">`+data.pos_desc+`</option>`);
                $('#section').val(data.pos_id).trigger('select2:select');
                $('#section_modal').modal('hide');
                toastr.success(trans('Section Status saved successfully'),trans('Success'));
                $('#section_modal_error').html(``);
                $('#create_section_inputs input').val(``);
             },
             error:function(xhr, status, error){
                   toastr.error(trans('Something went wrong'),trans('Failed'));
                   var errors=xhr.responseJSON.errors;
                   var error_html=`<div class="callout callout-danger">
                                     <h5 class="text-danger">
                                        <i class="fa fa-times"></i> `+trans("Failed")+`
                                     </h5>
                                     <ul>`;
                   for (var key in errors){
                      error_html+=`<li>`+errors[key]+`</li>`;
                   }
                   error_html+=`</ul></div>`;
                   $('#section_modal_error').html(error_html);
             },
             complete:function()
             {
                $('.preloader').hide();
                $('.loader').hide();
             }
          });
       }
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



  //create province
  $('#create_province').on('submit',function(e){
     e.preventDefault();

     var data=$('#create_province').serialize();

     var valid=$(this).valid();

     if(valid)
     {
        $.ajax({
           url:ajax_url("create_province"),
           type:"post",
           data:data,
           beforeSend:function(){
              $('.preloader').show();
              $('.loader').show();
           },
           success:function(data){
              $('#province').append(`<option value="`+data.prov_code+`">`+data.prov_desc+`</option>`);
              $('#province').val(data.prov_code).trigger('select2:select');
              $('#province_modal').modal('hide');
              toastr.success(trans('Province Status saved successfully'),trans('Success'));
              $('#province_modal_error').html(``);
              $('#create_province_inputs input').val(``);
           },
           error:function(xhr, status, error){
                 toastr.error(trans('Something went wrong'),trans('Failed'));
                 var errors=xhr.responseJSON.errors;
                 var error_html=`<div class="callout callout-danger">
                                   <h5 class="text-danger">
                                      <i class="fa fa-times"></i> `+trans("Failed")+`
                                   </h5>
                                   <ul>`;
                 for (var key in errors){
                    error_html+=`<li>`+errors[key]+`</li>`;
                 }
                 error_html+=`</ul></div>`;
                 $('#province_modal_error').html(error_html);
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        });
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


   $(document).on('select2:select','#province', function (e) {
       var el=$(e.target);
       var data = e.params.data;
       $.ajax({
           url:ajax_url('get_muncits_by_prov'+'?prov_code='+ data.id),
           beforeSend:function(){
             $('.preloader').show();
             $('.loader').show();
           },
         //   processResults: function (data) {
         //     return {
         //           results: $.map(data, function (item) {
         //              return {
         //                 text: item.muncit_desc,
         //                 id: item.muncit_id
         //              }
         //           })
         //     };
         //  },
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

  //create muncit
  $('#create_muncit').on('submit',function(e){
     e.preventDefault();

     var data=$('#create_muncit').serialize();

     var valid=$(this).valid();

     if(valid)
     {
        $.ajax({
           url:ajax_url("create_muncit"),
           type:"post",
           data:data,
           beforeSend:function(){
              $('.preloader').show();
              $('.loader').show();
           },
           success:function(data){
              $('#muncit').append(`<option value="`+data.muncit_id+`">`+data.muncit_desc+`</option>`);
              $('#muncit').val(data.muncit_id).trigger('select2:select');
              $('#muncit_modal').modal('hide');
              toastr.success(trans('Muncit Status saved successfully'),trans('Success'));
              $('#muncit_modal_error').html(``);
              $('#create_muncit_inputs input').val(``);
           },
           error:function(xhr, status, error){
                 toastr.error(trans('Something went wrong'),trans('Failed'));
                 var errors=xhr.responseJSON.errors;
                 var error_html=`<div class="callout callout-danger">
                                   <h5 class="text-danger">
                                      <i class="fa fa-times"></i> `+trans("Failed")+`
                                   </h5>
                                   <ul>`;
                 for (var key in errors){
                    error_html+=`<li>`+errors[key]+`</li>`;
                 }
                 error_html+=`</ul></div>`;
                 $('#muncit_modal_error').html(error_html);
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        });
     }
  });



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



  //create positions
  $('#create_position').on('submit',function(e){
     e.preventDefault();

     var data=$('#create_position').serialize();

     var valid=$(this).valid();

     if(valid)
     {
        $.ajax({
           url:ajax_url("create_position"),
           type:"post",
           data:data,
           beforeSend:function(){
              $('.preloader').show();
              $('.loader').show();
           },
           success:function(data){
              $('#position').append(`<option value="`+data.pos_id+`">`+data.pos_desc+`</option>`);
              $('#position').val(data.pos_id).trigger('select2:select');
              $('#position_modal').modal('hide');
              toastr.success(trans('Position Status saved successfully'),trans('Success'));
              $('#position_modal_error').html(``);
              $('#create_position_inputs input').val(``);
           },
           error:function(xhr, status, error){
                 toastr.error(trans('Something went wrong'),trans('Failed'));
                 var errors=xhr.responseJSON.errors;
                 var error_html=`<div class="callout callout-danger">
                                   <h5 class="text-danger">
                                      <i class="fa fa-times"></i> `+trans("Failed")+`
                                   </h5>
                                   <ul>`;
                 for (var key in errors){
                    error_html+=`<li>`+errors[key]+`</li>`;
                 }
                 error_html+=`</ul></div>`;
                 $('#position_modal_error').html(error_html);
           },
           complete:function()
           {
              $('.preloader').hide();
              $('.loader').hide();
           }
        });
     }
  });





    //get provname by name select2
    $('#prov_desc').select2({
       width:"100%",
       placeholder:trans("Province Name"),
       ajax: {
          beforeSend:function()
          {
             $('.preloader').show();
             $('.loader').show();
          },
          url: ajax_url('get_province_by_desc'),
          processResults: function (data) {
                return {
                      results: $.map(data, function (item) {
                         return {
                            text: item.prov_desc,
                            id: item.prov_id
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

    //selected provname
    $(document).on('select2:select','#prov_desc', function (e) {
       var el=$(e.target);
       var data = e.params.data;
       $.ajax({
           url:ajax_url('get_province'+'?prov_id='+data.prov_id),
           beforeSend:function(){
                $('.preloader').show();
                $('.loader').show();
           },
           success:function(patient)
           {
             $("#muncit_id").append('<option value="'+province.prov_id+'">'+province.prov_desc+'</option>');

           },
          complete:function()
          {
             $('.preloader').hide();
             $('.loader').hide();
          }
       });
    });
  //datatables
  $('.datatables').dataTable();

   //delete user
   $(document).on('click','.delete_user',function(e){
       e.preventDefault();
       var el=$(this);
       swal({
           title: trans("Are you sure to delete user ?"),
           type: "warning",
           showCancelButton: true,
           confirmButtonClass: "btn-danger",
           confirmButtonText: trans("Delete"),
           cancelButtonText: trans("Cancel"),
           closeOnConfirm: false
       },
       function(){
           $(el).parent().submit();
       });
   });

})(jQuery);
