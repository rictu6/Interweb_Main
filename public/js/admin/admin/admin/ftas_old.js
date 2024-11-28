(function($){

    "use strict";

    $('#ftas').addClass('active');
    $('#users_profiles_link').addClass('active');
    $('#users_profiles').addClass('menu-open');

    var lce_id=$('#lce_id').val();
    var destination_selected=$('#destination').val();

   //active

    //datatable
    var table=$('#ftas_table').DataTable( {
        dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        buttons: [
          {
              extend:    'copyHtml5',
              text:      '<i class="fas fa-copy"></i> Copy',
              titleAttr: 'Copy'
          },
          {
              extend:    'excelHtml5',
              text:      '<i class="fas fa-file-excel"></i> Excel',
              titleAttr: 'Excel'
          },
          {
              extend:    'csvHtml5',
              text:      '<i class="fas fa-file-csv"></i> CVS',
              titleAttr: 'CSV'
          },
          {
              extend:    'pdfHtml5',
              text:      '<i class="fas fa-file-pdf"></i> PDF',
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
              url:url("admin/get_ftas"),
              data:function(data)
              {
                data.filter_status=$('#filter_status').val();
              }
          },
          // orderCellsTop: true,
          fixedHeader: true,
          "columns": [
            {data:"fta_id"},
            {data:"l_c_e.fullname"},
            {data:"leavetype"},
            {data:"destination"},
            {data:"l_c_e.designation"},
            {data:"l_c_e.province.prov_desc"},
            {data:null,
                render: function ( data, type, full, meta ) {
                    var muncit = data.l_c_e.muncit_id>0?data.l_c_e.muncit.muncit_desc:data.l_c_e.province.prov_desc;
                    return muncit;
                }
            },
            // {data:"l_c_e.muncit.muncit_desc",
            // "defaultContent": "l_c_e.province.prov_desc"},
            {data:"datefrom"},
            {data:"dateto"},
            {data:"frequency_of_travel"},
            {data:null,
                render: function ( data) {
                    //var check = data.datefrom>0?data.l_c_e.muncit.muncit_desc:data.l_c_e.province.prov_desc;
                    var startDate = data.datefrom;//.format('D/MM/YYYY');
                    var endDate = data.dateto;//.format('D/MM/YYYY');
                    var date=new Date();
                    var todaydate=date.toLocaleDateString();

                    var check = todaydate <= endDate && todaydate>=startDate?"ONGOING":"DONE";
                   //check= '<span class="badge badge-primary mr-1">'+check+'</span>';
                    return check;
                }
            },
            {data:"action",searchable:true,orderable:false,sortable:false}
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

    $('#filter_status').on('change',function(){
        table.draw();
     });

//change lce
$('#lce_id').select2({
    width:"100%",
    placeholder:trans("LCE Name"),
    ajax: {
    url: ajax_url('get_lce_by_name'),
    processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.fullname,
                        id: item.lce_id
                    }
                })
            };
        }
    }
});


//selected lce
$(document).on('select2:select','#lce_id', function (e) {
    var el=$(e.target);
    var data = e.params.data;
    $.ajax({
        url:ajax_url('get_lce'+'?lce_id='+data.id),
        beforeSend:function()
        {
            $('.preloader').show();
            $('.loader').show();
        },
        success:function(lce)
        {
            $("#fullname").val(lce.fullname);
            $("#designation").val(lce.designation);
            $("#prov_code").val(lce.province.prov_desc);
            if(lce.muncit_id>0){
                $("#muncit_id").val(lce.muncit.muncit_desc);
            }else{
                $("#muncit_id").val(lce.province.prov_desc);
            }
        },
        complete:function(){
            $('.preloader').hide();
            $('.loader').hide();
        }
    });
});
var des=$('#destination').val();
$('#destination').change(

    function (){
        if($('#destination').val()==='FOREIGN'){
            $("#appear").show();
        }
        else{
           $("#appear").hide();
        }
//alert ($('#destination').val());
        }



);
 



     //get province select2 intialize
     $('#province').select2({
      width:"100%",
      placeholder:trans("Province Status"),
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
      alert()
   });

     //get muncit select2 intialize
     $('#muncit').select2({
      width:"100%",
      placeholder:trans("Municipality Status"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_muncits'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.muncit_desc,
                           id: item.muncit_id
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


    //delete fta
    $(document).on('click','.delete_fta',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
            title: trans("Are you sure to delete fta ?"),
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
