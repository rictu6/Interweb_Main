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
                data.filter_year=$('#filter_year').val();
                data.filter_month=$('#filter_month').val();

                data.filter_payee=$('#filter_payee').val();
                data.filter_auth=$('#filter_auth').val();
                data.filter_no=$('#filter_no').val();
                //data.filter_no=$('#filter_no').val();
                data.filter_fundcluster=$('#filter_fundcluster').val();
                data.filter_fundsource=$('#filter_fundsource').val();
                //data.filter_date=$('#filter_date').val();

              }
          },
          // orderCellsTop: true,
          fixedHeader: true,
          "columns": [
            {data:"ors_no",searchable:true,orderable:false,sortable:false},

            {
                data: null,
                render: function(data, type, row) {
                     if (data.fundsource === null) {
      return "NONE";
    } else {
       return data.fundsource.code + "-" + data.fundsource.description;
    }

                }
              },
              {
                data: null,
                render: function(data, type, row) {
                  if (data.payee === null) {
      return "  " + data.particulars;
    } else {
      return data.payee.name + "-" + data.particulars;
    }
                }
              },
              {
                data: null,
                render: function(data, type, row) {
                    var totalAmount = 0;
                    for (var i = 0; i < data.details.length; i++) {
                        totalAmount += parseFloat(data.details[i].amount);
                    }
                    return totalAmount.toFixed(2);
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                                    if (data.processed === null) {
      return "NONE";
    } else {
       return data.processed.first_name;
    }

                }
              },
            //{data:"ors_no",searchable:false,orderable:false,sortable:false}
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

     $('#filter_payee').on('change',function(){
        table.draw();
     });
     $('#filter_auth').on('change',function(){
        table.draw();
     });
     $('#filter_no').on('change',function(){
        table.draw();
     });
        // $('#filter_allotment').on('change', function () {
        // table.draw();
        // });
        $('#filter_fundcluster').on('change', function() {
            table.draw();
        });
        $('#filter_fundsource').on('change', function() {
            table.draw();
        });
   //filter date
//    $('#filter_date').on( 'cancel.daterangepicker', function(){
//     $(this).val('');
//     table.draw();
//  });
//  $('#filter_date').on('apply.daterangepicker',function(){
//     table.draw();
//  });

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




$('#filter_no').select2({
    width: "100%",
    placeholder: trans("Filter ORS No"),
    ajax: {
        url: ajax_url('get_orsheaders'),
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.ors_no,
                        id: item.ors_no
                    }
                })
            };
        }
    }
});


$('#filter_allotment').select2({
    width:"100%",
    placeholder:trans("Filter Allotment Class"),
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
 $('#filter_payee').select2({
    width:"100%",
    placeholder:trans("Filter Payee"),
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
$('#filter_auth').select2({
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
  $('#filter_fundcluster').select2({
    width:"100%",
    placeholder:trans("Fund Cluster"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_fund_cluster_by_desc'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.description,
                         id: item.fund_cluster_id
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
  $('#filter_fundsource').select2({
    width:"100%",
    placeholder:trans("FundSource"),
    ajax: {
       beforeSend:function()
       {
          $('.preloader').show();
          $('.loader').show();
       },
       url: ajax_url('get_fundsource'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.code,
                         id: item.fund_source_id
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
//ORS DETAILS
//get budgetype
$('#responsibility_center').select2({
    width:"100%",
    placeholder:trans("Resposibility Center"),
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

   //fundsource by budget_id and get pap by fundsource
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

                    $('#uacs_id'+count).append('<option value="' + item.uacs_subobject_id + '">'+ item.code + '</option>');
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

                // $('#uacs_id'+count).append('<option value="' + item.appro_setup_id + '">'+ item.uacs_subobject_code + '</option>');
                $('#uacs_id'+count).append('<option value="' + item.uacs_subobject_id + '">'+ item.code + '</option>');
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

//componenst
$('.add_component').on('click', function() {

    count++;
   //console.log(count);
    $('.components .items').append(`
     <tr  num="${count}" >
     <td>
     <div class="form-group">
         <select class="form-control responsibility_center" name="details[${count}][responsibility_center]" id="responsibility_center${count}">
             <option value="" disabled selected>- SELECT -</option>
            <option value="1" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
                OFFICE OF THE REGIONAL DIRECTOR (ORD)</option>
            <option value="2" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
                OFFICE OF THE ASSISTANT REGIONAL DIRECTOR</option>
            <option value="3" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
                PROJECT DEVELOPMENT AND MANAGEMENT UNIT</option>
            <option value="4" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
                PLANNING UNIT</option>
            <option value="5" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
                LOCAL GOVERNMENT MONITORING AND EVALUATION DIVISION (LGMED)
            </option>
            <option value="6" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
                LOCAL GOVERNMENT CAPACITY DEVELOPMENT DIVISION (LGCDD)</option>
            <option value="7" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
                PROJECT DEVELOPMENT AND MANAGEMENT UNIT</option>
            <option value="8" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
                FINANCE AND ADMINISTRATIVE DIVISION (FAD)</option>
            <option value="9" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
                AKLAN PROVINCIAL OFFICE</option>
            <option value="10" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
                ANTIQUE PROVINCIAL OFFICE</option>
            <option value="11" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
                CAPIZ PROVINCIAL OFFICE</option>
            <option value="12" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
                GUIMARAS PROVINCIAL OFFICE</option>
            <option value="13" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
            ILOILO PROVINCIAL OFFICE</option>
            <option value="14" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
            ILOILO CITY OFFICE</option>
            <option value="15" {{ old('responsibility_center') =="ALLOTMENT"? "selected" : '' }}>
            NEGROS OCCIDENTAL PROVINCIAL OFFICE</option>
            <option value="16" {{ old('responsibility_center') =="SUB- ALLOTMENT"? "selected" : '' }}>
            BACOLOD CITY OFFICE</option>

 </select>
     </div>
 </td>
 <td>
 <div class="form-group">

 <select class="form-control allotment_class_id" name="details[${count}][allotment_class_id]" placeholder="{{__(' to')}}"
 id="allotment_class_id${count}" required>
     <option value="" disabled selected>CHARGE TO</option>
     <option value="1" {{ old('allotment_class_id') =="ALLOTMENT"? "selected" : '' }}>
             ALLOTMENT</option>
     <option value="2" {{ old('allotment_class_id') =="SUB- ALLOTMENT"? "selected" : '' }}>
             SUB- ALLOTMENT</option>

 </select>
</div>
 </td>

      <td>
           <div class="form-group">

                  <select class="form-control pap_id" name="details[${count}][pap_id]" id="pap_id${count}">
                  <option value=""  disabled selected>- SELECT-</option>
                <option value="${papOption}" selected>${papOption}</option>
                  </select>
           </div>
      </td>

    <td>
                                    <div class="form-group">

                                        <select class="form-control sub_allotment_id" name="details[${count}][sub_allotment_id]"
                                         id="sub_allotment_id${count}">
                                         <option value=""  disabled selected>-- SELECT--</option>
                                         <option value="${subOption}" selected>${subOption}</option>

                                        </select>
                                    </div>
                                </td>
        <td>
           <div class="form-group">

                                            <select class="form-control uacs_subobject_code" name="details[${count}][uacs_id]"
                                            id="uacs_id${count}">
                                            <option value="">-SELECT-</option>
                                            <option value="${uacsOption}" selected>${uacsOption}</option>
                                            </select>
           </div>
      </td>
      <td>
                                        <div class="form-group">
                                                            <div class="input-group form-group mb-3">
                                                                <input type="number" class="form-control amount" name="details[${count}][amount]"  min="0" class="amount" required>
                                                                <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    ${currency}
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

      <td>
           <button type="button" class="btn btn-danger delete_row">
               <i class="fa fa-trash"></i>
           </button>
      </td>
   </tr>
   `);
    //initialize text editor
    $('#component_' + count).find('textarea').summernote({
        toolbar: []
    });
});
// $('#searchButton').on('click', function() {

//     trigger_get_search();
//     table.draw();

// });
//fundsource by budget_id and get pap by fundsource
// function trigger_get_search(){
//     $.ajax({
//         url:ajax_url('get_orsheaders_by_filter'),
//         success: function(data) {

//             {
//               data.filter_no=$('#filter_no').val();
//             //   data.filter_leave=$('#filter_leave').val();
//             //   data.filter_status=$('#filter_status').val();
//             //   data.filter_date=$('#filter_date').val();
//             }
//         }
//     });
//         }

// // check amount whenever change
// $(document).on('change','.input_amount',function(){
//     var checked=$(this).prop('checked');
//     var culture_id=$(this).val();
//     var price=$(this).attr('price');
//     if(checked)
//     {
//        $('.cultures').append(`
//        <div class="selected_tests" id="selected_culture_`+culture_id+`">
//           <input type="hidden"  name="cultures[]" value="`+culture_id+`">
//           <input type="hidden"  class="price" value="`+price+`">
//        </div>`);
//     }
//     else{
//        $('#selected_culture_'+culture_id).remove();
//     }
//     calculate_total();
//  });
$('#deposit_payment_checkbox').on('change', function() {
    if ($(this).is(':checked')) {
        console.log('Checkbox is checked');
        orstype = 1; // Update orstype directly
    } else {
        console.log('Checkbox is not checked');
        orstype = 2; // Update orstype directly
    }
});

  //submit form
//   $('#ors_form').on('submit',function(){
//     //event.preventDefault();

//     // var toastMessage = $('#toast_message').val();
//     // if (toastMessage) {
//     //     toastr.error(toastMessage, 'Failed');
//     // }
//     //    toastr.error(trans('Amount should be less or equal to allotment balance'),trans('Failed'));
//  });

// $('#ors_form').on('submit', function(event) {
//     //event.preventDefault(); // Prevent the form from submitting normally

//     // Perform your AJAX request here
//     $.ajax({
//         url: 'admin.orsheaders.store',
//         method: 'POST',
//         data: $(this).serialize(),
//         success: function(response) {

//         },
//         error: function(xhr, status, error) {
//             if (xhr.status === 422) {
//                 var errorMessage = xhr.responseJSON.message;

//                 // Update the toast_message element with the error message
//                 $('#toast_message').text(errorMessage);

//                 // Display the toast message using a toast library of your choice
//                 toastr.error(errorMessage, 'Failed');
//             } else {
//                 // Handle other error scenarios or actions
//             }
//         }

//     });
// });
//

$('#ors_form').on('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Perform your AJAX request here
    $.ajax({
        url: $(this).attr('action'), // Get the form action URL dynamically
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            // Handle the success response, if needed
            // For example, redirect to a success page
            // window.location.href = '{{ route("admin.orsheaders.store") }}';
            // window.location.href = '{{ route("admin.orsheader_list") }}';
//flash and redirect
//Flash.success('ORS has been successfully added.');

    // Redirect to the desired page
    toastr.success(response.toast_message);
    window.location.href = response.redirect_to;
        },
        error: function(xhr, status, error) {
            if (xhr.status === 422) {
                var errorMessage = xhr.responseJSON.message;

                // Update the toast_message element with the error message
                //$('#toast_message').text(errorMessage);

                // Display the toast message using a toast library of your choice
                toastr.error(errorMessage, 'Failed');
            } else {
                // Handle other error scenarios or actions
            }
        }

    });
});

})(jQuery);
