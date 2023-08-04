(function($){

    "use strict";

    //active
    $('#files').addClass('active');

    //files datatable
    var table=$('#files_table').DataTable( {
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
        url: url("admin/get_files")
      },
      // orderCellsTop: true, {data:"weekday.wd_desc"},
      fixedHeader: true,
      "columns": [
         {data:"id"},
         {data:"filecategory.cat_desc"},
         {data:"file"},
         {data:"ref_num"},
         {data:"file_desc"},
         {data:"title_subject"},
         {data:"action",searchable:false,orderable:false,sortable:false}//action, width: "15%"
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

   

  
   //get category by name select2
   $('#cat_desc').select2({
      width:"100%",
      placeholder:trans("File Category"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_filecategory_by_name'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.cat_desc,
                           id: item.cat_id
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




   //get folder select2 intialize
   $('#filecategory').select2({
      width:"100%",
      placeholder:trans("File Category"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_filecategories'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.cat_desc,
                           id: item.cat_id
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
  

   //create doctor
   $('#create_filecategory').on('submit',function(e){
      e.preventDefault();
      
      var data=$('#create_filecategory').serialize();
       
      var valid=$(this).valid();

      if(valid)
      {
         $.ajax({
            url:ajax_url("create_filecategory"),
            type:"post",
            data:data,
            beforeSend:function(){
               $('.preloader').show();
               $('.loader').show();
            },
            success:function(data){
               $('#filecategory').append(`<option value="`+data.cat_id+`">`+data.cat_desc+`</option>`);
               $('#filecategory').val(data.cat_id).trigger('select2:select');
               $('#filecategory_modal').modal('hide');
               toastr.success(trans('File Category saved successfully'),trans('Success'));
               $('#filecategory_modal_error').html(``);
               $('#create_filecategory_inputs input').val(``);
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
                  $('#filecategory_modal_error').html(error_html);
            },
            complete:function()
            {
               $('.preloader').hide();
               $('.loader').hide();
            }
         });
      }
   });
   


    //delete division
    $(document).on('click','.delete_files',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
          title: trans("Are you sure to file file ?"),
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

