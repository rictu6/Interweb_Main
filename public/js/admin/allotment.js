(function($){

    "use strict";

    $('#ordheaders').addClass('active');
    $('#users_profiles_link').addClass('active');
    $('#users_profiles').addClass('menu-open');
    var count=$('#count').val();


   //active

    //datatable
    var table=$('#ordheaders_table').DataTable( {
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
              url:url("admin/get_orsheaders"),
              data:function(data)
              {
                // data.filter_destination=$('#filter_destination').val();
                // data.filter_leave=$('#filter_leave').val();
                // data.filter_status=$('#filter_status').val();
                // data.filter_date=$('#filter_date').val();
              }
          },
          // orderCellsTop: true,
          fixedHeader: true,
          "columns": [
            {data:"ors_no"},
            {data:"office"},


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

    // $('#filter_status').on('change',function(){
    //     table.draw();
    //  });
    //  $('#filter_leave').on('change',function(){
    //     table.draw();
    //  });
    //  $('#filter_destination').on('change',function(){
    //     table.draw();
    //  });

   // filter date
   $('#filter_date').on( 'cancel.daterangepicker', function(){
    $(this).val('');
    table.draw();
 });
 $('#filter_date').on('apply.daterangepicker',function(){
    table.draw();
 });

  $('.datepickerrange').val('');

    // $('#filter_date').datepicker({
    //   format: 'yyyy-mm-dd',
    //   autoclose: true
    // });

// Datepicker
$('#datefrom, #dateto').datepicker({
    defaultDate: "{{ old('datefrom') }}",
    defaultDate: "{{ old('dateto') }}",
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: '-100:+0'
});

// Validate date range
$('#datefrom, #dateto').on('change', function() {
    var date_from = $('#datefrom').datepicker('getDate');
    var date_to = $('#dateto').datepicker('getDate');

    if (datefrom > dateto) {
        alert('Date To must be greater than or equal to Date From');
        $('#dateto').val('');
    }
});

//get budgetype
$('#budget_type').select2({
    width:"100%",
    placeholder:trans("Authorization"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_budget_type_by_desc'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.description,
                         id: item.budget_type_id
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

  //fundsource by budget_id and get pap by fundsource

  $(document).on('select2:select', '#budget_type', function (e) {
    var el=$(e.target);
    var data = e.params.data;
    $.ajax({
        url:ajax_url('get_fundsource_by_auth'+'?budget_type='+ data.id),
        beforeSend:function(){
            $('.preloader').show();
            $('.loader').show();
        },

        success:function(fundsrc)
        {
            $('#fund_source_id').empty();
            $.each(fundsrc, function(index, item) {
                if(index == 0) {
                    $('#fund_source_id').append('<option value="">-SELECT-</option>');
                }
                $('#fund_source_id').append('<option value="' + item.fund_source_id + '">' + item.code + ' - ' + item.description + '</option>');
            });

            // Load PAP dropdown based on fundsource selection
            $('#fund_source_id').on('change', function() {
                var selectedFundsourceId = $(this).val();
                $.ajax({
                    url:ajax_url('get_paps_by_fundsource'+'?fund_source_id='+ selectedFundsourceId),
                    beforeSend:function(){
                        $('.preloader').show();
                        $('.loader').show();
                    },
                    success:function(pap)
                    {
                        $('#pap_id').empty();
                        $.each(pap, function(index, item) {
                            if(index == 0) {
                                $('#pap_id').append('<option value="">-SELECT-</option>');
                            }
                            $('#pap_id').append('<option value="' + item.pap_id + '">'+ item.code+'-'  + item.description + '</option>');
                        });
                    },
                    complete:function()
                    {
                        $('.preloader').hide();
                        $('.loader').hide();
                    }
                });
            });
        },
        complete:function()
        {
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
//select payee
$('#payee_id').select2({
    width:"100%",
    placeholder:trans("Payee"),
    ajax: {
    url: ajax_url('get_payee_by_name'),
    processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.payee_id
                    }
                })
            };
        }
    }
});
//select allotmentclass
$('#uacs_subclass_id').select2({
    width:"100%",
    placeholder:trans("Allotment Class"),
    ajax: {
    url: ajax_url('get_alot_by_desc'),
    processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text:item.code + ' - ' + item.description,
                        id: item.uacs_subclass_id
                    }
                })
            };
        }
    }
});
//select fundcluster
$('#fund_cluster_id').select2({
    width:"100%",
    placeholder:trans("Fund Cluster"),
    ajax: {
    url: ajax_url('get_fund_cluster_by_desc'),
    processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text:item.code + ' - ' + item.description,
                        id: item.fund_cluster_id
                    }
                })
            };
        }
    }
});
//get budgetype
$('#budget_type_id').select2({
    width:"100%",
    placeholder:trans("Authorization"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_budget_type_by_desc'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.description,
                         id: item.budget_type_id
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
//get uacs_subobject_code  sa appro details all
$('#uacs_subobject_code').select2({
    width:"100%",
    placeholder:trans("UACS"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_uacs_subobject_code'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.uacs_subobject_code,
                         id: item.uacs_subobject_id
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


  //get uacs_subobject_code
$('#component_2_uacs_subobject_code').select2({
    width:"100%",
    placeholder:trans("UACS"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_uacs_subobject_code'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.description,
                         id: item.uacs_subobject_code
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
 //get

//  $(document).on('select2:select','#budget_type_id', function (e) {
//   var el=$(e.target);
//   var data = e.params.data;
//   $.ajax({
//       url:ajax_url('get_fundsource_by_auth'+'?budget_type='+ data.id),
//       beforeSend:function(){
//         $('.preloader').show();
//         $('.loader').show();
//       },

//       success:function(fundsrc)
//       {
//         $('#fund_source_id').empty();
//         $.each(fundsrc, function(index, item) {

//             $('#fund_source_id').append('<option value="' + item.fund_source_id + '">' + item.code + ' - ' + item.description + '</option>'); // name refers to the objects value when you do you ->lists('name', 'id') in laravel
//         });


//       },
//       complete:function()
//       {
//         $('.preloader').hide();
//         $('.loader').hide();
//       }
//   });
//  });

    //delete row
    $(document).on('click','.delete_row',function(e){
        var dtl_id=$(this).closest('tr').attr('dtl_id');
        e.preventDefault();
        var el=$(this);
        swal({
            title: trans("Are you sure to delete UACS ?"),
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: trans("Delete"),
            cancelButtonText: trans("Cancel"),
            closeOnConfirm: true
        },
        function(){
            if(dtl_id!==undefined)
            {
              $.ajax({
                url:ajax_url('delete_uacs/'+dtl_id),
                beforeSend:function()
                {
                   $('.preloader').show();
                   $('.loader').show();
                },
                success:function()
                {
                  $(el).parent().parent().remove();
                },
                complete:function(){
                  $('.preloader').hide();
                  $('.loader').hide();
                }
              });
            }
            else{
              $(el).parent().parent().remove();
            }
        });
    });

})(jQuery);
