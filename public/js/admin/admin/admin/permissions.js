(function($){

  "use strict";

  //active
  $('#permissions').addClass('active');
  $('#authorization_link').addClass('active');
  $('#authorization').addClass('menu-open');
  //permissions datatable
  var table=$('#permissions_table').DataTable( {
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
      url: url("admin/get_permissions")
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
       {data:"id"},
       {data:"name"},
       {data:"key"},
       {data:"module.name"},
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

  //get patient by name select2
  $('#name').select2({
   width:"100%",
   placeholder:trans("Module Name"),
   ajax: {
      beforeSend:function()
      {
         $('.preloader').show();
         $('.loader').show();
      },
      url: ajax_url('get_module_by_name'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.name,
                        id: item.id
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

   //get division select2 intialize
   $('#module').select2({
      width:"100%",
      placeholder:trans("Module"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_modules'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.name,
                           id: item.id
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
  
  
   //datatables
   $('.datatables').dataTable();
     
    //delete permissions
    $(document).on('click','.delete_permission',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
          title: trans("Are you sure to delete Permissions ?"),
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
  
  