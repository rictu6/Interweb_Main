(function($){

    "use strict";

    $('#users_profiles_link').addClass('active');
    $('#users_profiles').addClass('menu-open');
    var count=$('#count').val();


   //active

    //datatable prop_issued_table
    var table=$('#prop_issued_table').DataTable( {
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
          url: url("admin/property_issued_list"),
        //   data:function(data)
        //   {
        //     data.filter_service_cc=$('#filter_service_cc').val();
        //     data.filter_month_cc=$('#filter_month_cc').val();
        //   }
        },
        // orderCellsTop: true,
        fixedHeader: true,
        "columns": [
            {data:"date_acquired"},
            {data:"ics_rrsp_no"},
            {data:"semi_expendable_property_no"},
            {data:"item_description"},
            {data:"estimated_useful_life"},
            {data:"issued_qty"},
            {data:"issued_office"},
            {data:"returned_qty"},
            {data:"returned_office"},
            {data:"re_issued_qty"},
            {data:"re_issued_office"},
            {data:"disposed_qty"},
            {data:"balance_qty"},
            {data:"amount"},
            {data:"remarks"},
        //    {data:"action",searchable:false,orderable:false,sortable:false}//action
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
    //  $('#filter_service_cc').on('change',function(){
    //     table.draw();
    //  });
    //  $('#filter_month_cc').on('change',function(){
    //     table.draw();
    //  });
    var table=$('#prop_issued_table').DataTable( {
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
          url: url("admin/property_issued_list"),
        //   data:function(data)
        //   {
        //     data.filter_service_cc=$('#filter_service_cc').val();
        //     data.filter_month_cc=$('#filter_month_cc').val();
        //   }
        },
        // orderCellsTop: true,
        fixedHeader: true,
        "columns": [
            {data:"date_acquired"},
            {data:"ics_rrsp_no"},
            {data:"semi_expendable_property_no"},
            {data:"item_description"},
            {data:"estimated_useful_life"},
            {data:"issued_qty"},
            {data:"issued_office"},
            {data:"returned_qty"},
            {data:"returned_office"},
            {data:"re_issued_qty"},
            {data:"re_issued_office"},
            {data:"disposed_qty"},
            {data:"balance_qty"},
            {data:"amount"},
            {data:"remarks"},
        //    {data:"action",searchable:false,orderable:false,sortable:false}//action
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


$('#filter_service_cc').select2({
    width:"100%",
    placeholder:trans("Filter Service Type"),
    ajax: {
    url: ajax_url('get_services'),
    processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.description,
                        id: item.id
                    }
                })
            };
        }
    }
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
//get services
$('#propertyType').select2({
    width:"100%",
    placeholder:trans("Please select the property type"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_property_type'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.property_type_description,
                         id: item.property_type_id
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

    $('#status').change(function() {
        var selectedValue = $(this).val();
        // You can do something with the selectedSurveyType variable here
        console.log('Selected Status:', selectedValue);
        // Assign selected value to a hidden input field or perform any other action as needed
        $('#status').val(selectedValue);

        $.ajax({
            url: url("admin/getStatusContent"),
            method: 'GET',
            data: {
                selectedValue: selectedValue
            },
            success: function(response) {
                // Update a container with the received content
                $('#statusContent').html(response);
            },
            error: function(err) {
                console.error('Error:', err);
            }
        });
    });

    $('#surveyType').change(function() {
        var selectedValue = $(this).val();
        // You can do something with the selectedSurveyType variable here
        console.log('Selected Survey Type:', selectedValue);
        // Assign selected value to a hidden input field or perform any other action as needed
        $('#surveyType').val(selectedValue);

        $.ajax({
            url: url("admin/getSurveyContent"),
            method: 'GET',
            data: {
                selectedValue: selectedValue
            },
            success: function(response) {
                // Update a container with the received content
                $('#surveyContent').html(response);
            },
            error: function(err) {
                console.error('Error:', err);
            }
        });
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
