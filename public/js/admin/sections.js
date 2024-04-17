(function($){

    "use strict";

    //active
    $('#sections').addClass('active');
    $('#maintenance_link').addClass('active');
    $('#maintenance').addClass('menu-open');
    //sections datatable
    var table=$('#sections_table').DataTable( {
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
        url: url("admin/get_sections")
        
      },
      // orderCellsTop: true,
      fixedHeader: true,
      "columns": [
         {data:"sec_id"},
         {data:"sec_desc"},
        
    
         {data:"action",searchable:false,orderable:false,sortable:false}//action
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
               $('#office').val(data.id).trigger('select2:select');
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



   //get division select2 intialize
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
                           text: item.div_desc,
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
               $('#division').val(data.id).trigger('select2:select');
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
  

 
   //get postion select2 intialize
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
               $('#position').val(data.id).trigger('select2:select');
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
  

    //delete sections
    $(document).on('click','.delete_section',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
          title: trans("Are you sure to delete section ?"),
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

