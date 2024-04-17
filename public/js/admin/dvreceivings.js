(function($){

    "use strict";

    $('#ordheaders').addClass('active');
    $('#users_profiles_link').addClass('active');
    $('#users_profiles').addClass('menu-open');
    var count=$('#count').val();
    var dynamic_chargeto;
    var currentDate = new Date();
    var formattedDate = currentDate.toISOString().split('T')[0];
    var dynamic_fund_source;
    var dynamic_budget_type;
    var pap_datas;
   //active

    //datatable
    var table=$('#dv_receiving_table').DataTable( {
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
              url:url("admin/get_dvreceivings"),
              data:function(data)
              {
                data.filter_year=$('#filter_year').val();
                data.filter_month=$('#filter_month').val();
                // data.filter_status=$('#filter_status').val();
                // data.filter_date=$('#filter_date').val();
              }
          },
          // orderCellsTop: true,
          fixedHeader: true,
          "columns": [
            {data:"dv_no"},
            {data:"obli"}

//           {
//     data: null,
//     render: function(data, type, row) {
//    var orsHdrIds = data.ors_hdr_id.split(',');
//         if (data.o_r_s.length===0) {
//             var orsNos = data.ors_hdr_id.map(function(no) {
//                 //get ors by ors_hdr_id here
//                 return no.ors_no;
//             });
//             return 'None';
//         } else {
//             var orsNos = data.o_r_s.map(function(no) {
//                 return no.ors_no;
//             });
//             return orsNos.join(', '); // Display a comma-separated list of ors_no values
//         }
//     }
// }
,
              {
                data: null,
                render: function(data, type, row) {
                  return data.payee.name;
                }
              },

            {
                data: null,
                render: function(data, type, row) {
                  return data.processed.first_name + " " + data.processed.last_name;
                }
              },
              {
                data: null,
                render: function(data, type, row) {
                  return data.processed.first_name + " " + data.processed.last_name;
                }
              },

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
    $('#filter_year').on('change',function(){
        table.draw();
     });
     $('#filter_month').on('change',function(){
        table.draw();
     });


   // filter date
   $('#filter_date').on( 'cancel.daterangepicker', function(){
    $(this).val('');
    table.draw();
 });
 $('#filter_date').on('apply.daterangepicker',function(){
    table.draw();
 });


  //prepare edit user page
  var user_roles=$('#user_roles').val();

  if(user_roles!=null)
  {
      var user_roles= JSON.parse(user_roles);
      var o_r_s=[];
      console.log('yes');
      user_roles.forEach(function(role){
        o_r_s.push(parseInt(role.emp_id));
      });
      console.log(roles);

     // $('#ors_assign').val(o_r_s).trigger('change');
  }



 //ors_date
 $('#ors_date').val(formattedDate);
 function setORSNO(){//not used
    //ors_no
var uacs_subclass_Value = $('#uacs_subclass_id').val();

var currentDate = new Date();
var formattedDate = currentDate.toISOString().slice(0, 7);
var orsNoValue = uacs_subclass_Value+'-'  + fundSourceCode + '-' + formattedDate;
// Set the value of the ors_no input field to the constructed ORS No value
$('#ors_no').val(orsNoValue);
 }



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
//assign value to dynamic allotment class
//$('#allotment_class_id').on('change', function() {
$(document).on('change', '.allotment_class_id', function() {//if me count wala gagana
    var selectedChargeto = $(this).val();
//dynamic_chargeto=selectedChargeto;
trigger_get_pAp(selectedChargeto);
console.log(count);
if(selectedChargeto==1){
 // Empty the selection of the "suballotment" dropdown
 $('#sub_allotment_id'+count).val('');
 $('#uacs_id'+count).val('');
 // Disable the "suballotment" dropdown
 $('#sub_allotment_id'+count).prop('disabled', true);
}else{

 // Disable the "suballotment" dropdown
 $('#sub_allotment_id'+count).prop('disabled', false);
 $('#uacs_id'+count).val('');
}
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
                        text:item.cluster_code + ' - ' + item.description,
                        id: item.cluster_code
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

//get rc
$('#office').select2({
    width:"100%",
    placeholder:trans("Office"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_res_center'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                    //var description = item.res_center_id >= 1 && item.res_center_id <= 6 ? "Regional Office" : item.description;
                    return {
                        text: item.description,
                        id: item.res_center_id
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
//get dv type
$('#dv_type').select2({
    width:"100%",
    placeholder:trans("DV Type"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_dv_type'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.title,
                         id: item.dv_type_id
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
  //get dv type
$('#ors').select2({
    width:"100%",
    placeholder:trans("ORS No"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_orsheaders'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.ors_no,
                         id: item.ors_hdr_id
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
   //fundsource by budget_id and get pap by fundsource ors
   function trigger_get_pAp(charge_to){
    $.ajax({
        url:ajax_url('get_paps'+'?fund_source_id='+ dynamic_fund_source+ '&allotment_class_id=' + charge_to+ '&budget_type=' + dynamic_budget_type),
        beforeSend:function(){
            $('.preloader').show();
            $('.loader').show();
        },
        success:function(pap)
        {
            //$('#pap_id').empty();


            var papIds = [];
            $.each(pap, function(index, item) {

                 papIds.push(item.pap_code);
            });
     //Make a new AJAX request to retrieve the $paps data
    $.ajax({
        url:ajax_url('get_pap_by_id'+'?pap_ids=' + papIds),
        success: function(pap_data) {
            // Process the $paps data as needed
            $.each(pap_data, function(index, item) {
                if(index == 0) {
            $("#pap_id"+count).empty();
            $('#pap_id'+count).append('<option value="">-SELECT-</option>');
                }


                 $('#pap_id'+count).append('<option value="' + item.pap_id + '">'+ item.code + "-"  + item.description +'</option>');
                 console.log(count);
            });
            //console.log(('#pap_id'+count));
            //pap_datas=pap_data;
        }
    });
    //added june 6
    $('#pap_id'+count).on('change', function() {

        var selectedPapId = $(this).val();
        $('#sub_allotment_id'+count).val('');
        $('#uacs_id'+count).val('');
        if(charge_to==2){
            $.ajax({
                url:ajax_url('get_sub_allotment_by_pap'+'?pap_code='+ selectedPapId),
                beforeSend:function(){
                    $('.preloader').show();
                    $('.loader').show();
                },
                success:function(subAllotmentNo)
                {   $('#sub_allotment_id'+count).empty();
                    $.each(subAllotmentNo, function(index, item) {
                    if(index == 0) {
                        $('#sub_allotment_id'+count).append('<option value="">-SELECT-</option>');
                    }

                    $('#sub_allotment_id'+count).append('<option value="' + item.sub_allotment_no + '">'+ item.sub_allotment_no + '</option>');
                   });

                    // $('#sub_allotment_no').val(subAllotmentNo);
                },
                error:function(xhr, status, error)
                {
                    console.error('Error:', error); // log the error to console
                },

                complete:function()
                {
                    $('.preloader').hide();
                    $('.loader').hide();
                }
            });
        }else{
            $.ajax({

                url:ajax_url('get_uacs_by_pap'+'?pap_code='+ selectedPapId.trimEnd()),
                beforeSend:function(){
                    $('.preloader').show();
                    $('.loader').show();
                },
                success:function(allotmentclass)
                {   $('#uacs_id'+count).empty();
                    $.each(allotmentclass, function(index, item) {
                    if(index == 0) {
                        $('#uacs_id'+count).append('<option value="">-SELECT-</option>');
                    }

                    $('#uacs_id'+count).append('<option value="' + item.appro_setup_id + '">'+ item.uacs_subobject_code + '</option>');
                   });

                    // $('#sub_allotment_no').val(subAllotmentNo);
                },
                error:function(xhr, status, error)
                {
                    console.error('Error:', error); // log the error to console
                },

                complete:function()
                {
                    $('.preloader').hide();
                    $('.loader').hide();
                }
            });
        }

    });
     // Get uacs by pap
     // DIRI ANG CONDITION IF PAG CLICK SANG PAP UACS KUHAON YA OR SUB ALLOTMENT
    //  if(selected_chargeto==1)
     $('#sub_allotment_id'+count).on('change', function() {
        var selectedaclass = $(this).val();

        $.ajax({

            url:ajax_url('get_uacs_by_sub_allotment'+'?sub_allotment_no='+ selectedaclass.trimEnd()),
            beforeSend:function(){
                $('.preloader').show();
                $('.loader').show();
            },
            success:function(allotmentclass)
            {   $('#uacs_id'+count).empty();
                $.each(allotmentclass, function(index, item) {
                if(index == 0) {
                    $('#uacs_id'+count).append('<option value="">-SELECT-</option>');
                }

                $('#uacs_id'+count).append('<option value="' + item.appro_setup_id + '">'+ item.uacs_subobject_code + '</option>');
               });

                // $('#sub_allotment_no').val(subAllotmentNo);
            },
            error:function(xhr, status, error)
            {
                console.error('Error:', error); // log the error to console
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
}
   $(document).on('select2:select', '#budget_type', function (e) {
    var el=$(e.target);
    var data = e.params.data;
dynamic_budget_type=data.id;
$('#sub_allotment_id'+count).val('');
$('#uacs_id'+count).val('');
$('#pap_id'+count).val('');
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
                dynamic_fund_source=selectedFundsourceId;
                $('#sub_allotment_id').val('');
                $('#uacs_id').val('');
                console.log(count);
                trigger_get_pAp();
            });

            // gn omit ko diri ang pap onchange ke d na ma pass ang value sang count

        },
        complete:function()
        {
            $('.preloader').hide();
            $('.loader').hide();
        }
    });
});


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

//$('#ors_assign').val(o_r_s).trigger('change')
//componenst
//var detailsData = {};

$(document).on('select2:select','#ors_assign', function (e) {
    var el=$(e.target);
    var data = e.params.data;
    $.ajax({
        url:ajax_url('get_orsdetails'+'?ors_no='+data.id),
        beforeSend:function()
        {
            $('.preloader').show();
            $('.loader').show();
        },
        success:function(data)
        { //detailsData = data;
            $.each(data, function(index, item) {
                count++;
            
                var currency = "PHP";
                var newRow = `
                <tr num="${count}">
                    <td>
                        <div class="form-group">
                            <select class="form-control uacs_subobject_code" name="details[${count}][uacs_id]" id="uacs_id${count}" readonly>
                                <option value="${item.uacs_id}" selected>${item.uacs_code}</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <div class="input-group form-group mb-3">
                                <input type="number" class="form-control amount" name="details[${count}][amount]" min="0" id="amount${count}" value="${item.running_balance}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">${currency}</span>
                                </div>
                            </div>
                            <div class="error-message" id="error-message${count}" style="color: red;"></div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger delete_row">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                `;
            
                // Append the new row to the table
                $('.components .items').append(newRow);
            
                // Get the initial value of the amount input field
                var initial_amount = parseFloat(item.running_balance);
                item.identifier=count;
                $('#amount' + count).on('input', function() {
                  
                    var inputValue = parseFloat($(this).val());
                    var errorMessage = '';
                    //var currentCount = $(this).data('count');
                    // Check the condition for displaying an error message
                    if (inputValue >  initial_amount) {
                        errorMessage = 'Amount must be less than or equal to ' + initial_amount;
                    }
                    // else{
                    //     errorMessage='test';
                    // }
                    console.log('initial_amount:', initial_amount);
                    console.log('Count:', item.identifier);
                    console.log('Input Value:', inputValue);;
                    // Display or clear the error message
                    $('#error-message' + item.identifier).text(errorMessage);
                    //alert(errorMessage); 
                    //$('#error-message' + currentCount).text(errorMessage);
                });
            });
        },
        complete:function(){
            $('.preloader').hide();
            $('.loader').hide();
        
        }
    });
    
});


})(jQuery);
