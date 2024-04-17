(function($){

    "use strict";
  
    //active
    $('#schedules').addClass('active');
   

// define a render function
function myCustomRenderFunctionfrom(data, type, row, meta) {
   if(type === 'display') {
       return row['start']// this is used to display in the table
   } else { 
       return data; // original data of the cell from your source. this is used for functionalities other than display (like sorting, odering)
   }
}
function myCustomRenderFunctionto(data, type, row, meta) {
   if(type === 'display') {
       return row['end'] // this is used to display in the table
   } else { 
       return data; // original data of the cell from your source. this is used for functionalities other than display (like sorting, odering)
   }
}
    //schedules datatable
    var table=$('#schedules_table').DataTable( {
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
        url: url("admin/get_schedules")
      },
      // orderCellsTop: true,
      fixedHeader: true,
      "columns": [
         {data:"id"},
        //  {data:"posted_by"},
         {data:"title"},
         {data:"venue"},
         {
            data: null, 
            render: myCustomRenderFunctionfrom
           
        } ,
        {
         data: null, 
         render: myCustomRenderFunctionto
     },  {data:"time_start"},
         {data:"time_end"},
         {data:"roles"},

         {
          data: "status",
          render: function (data, type, row) {
              if (row.status === "Approval") { return "For RD's Approval"; }
             else if (row.status === "Returned") { return "Returned"; }
             else if (row.status === "Reconsideration") { return "For RD's Reconsideration"; }
             else { return "N/A"; }
              
              
              
           

          }
      },
      {
        data: "status2",
        render: function (data, type, row) {
            if (row.status2 === "Approved") { return "Approved"; }
           else if (row.status2 === "Disapproved") { return "Disapproved"; }
           
           else { return "N/A"; }
            
            
            
         

        }
    },

         
       
        
    {
      data: "status3",
      render: function (data, type, row) {
          if (row.status3 === "Conducted") { return "Conducted"; }
         else if (row.status3 === "Cancelled") { return "Cancelled"; }
         else if (row.status3 === "Rescheduled") { return "Rescheduled"; }
         
         else { return "N/A"; }
          
          
          
       

      }
  },
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
           roles.push(parseInt(role.emp_id));
           
       });
       console.log(roles);

       $('#role').val(roles).trigger('change');
       
   }

   $('.select2').select2();


   $('#filter_date').on( 'cancel.daterangepicker', function(){
      $(this).val('');
      table.draw();
   });
 
   $('#filter_date').on('apply.daterangepicker',function(){
      table.draw();
   });

   $('.datepickerrange').val('');

///////////////////////////////////
  $(function () {

    $('#status').on('change', function() {
        
              if ( this.value == 'Returned')
                {
                    $("#remarks").show();
                  
                }
              else  if ( this.value == 'Reconsideration')
                {
                    $("#remarks").show();
                  
                }
                else  if ( this.value == 'Approval')
                {
                    $("#remarks").hide();
                  
                }
          
            

        });
    }); 

  $(function () {

    $('#status2_').on('change', function() {
        
               if ( this.value == 'Disapproved')
                {
                    $("#remarks2").show();
                   
                }
              else  if ( this.value == 'Approved')
                {
                    $("#remarks2").hide();
                   
                }
          
             
            
  
        });
    }); 

    
  $(function () {

    $('#status3').on('change', function() {
        
               if ( this.value == 'Rescheduled')
                {
                    $("#remarks3").show();
                   
                }
              else  if ( this.value == 'Cancelled')
                {
                    $("#remarks3").show();
                   
                }
                else  if ( this.value == 'Conducted')
                {
                    $("#remarks3").hide();
                   
                }
          
             
            
  
        });
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
          if(data.id===1)
          {//REGIONAL OFFICE-VI
              $('#division').prop('disabled', false);
              $('#sec_id').prop('disabled', false);
          }
          else if(data.id===2)
          {//REGIONAL OFFICE-VI
              $('#division').prop('disabled', true);
              $('#sec_id').prop('disabled', true);
          }
          else if(data.id===3)
          {//REGIONAL OFFICE-VI
              $('#division').prop('disabled', true);
              $('#sec_id').prop('disabled', true);
          }
          else if(data.id===4)
          {//REGIONAL OFFICE-VI
              $('#division').prop('disabled', true);
              $('#sec_id').prop('disabled', true);
             
          }
          else if(data.id===5)
          {//REGIONAL OFFICE-VI
              $('#division').prop('disabled', true);
              $('#sec_id').prop('disabled', true);
          }
          else if(data.id===6)
          {//REGIONAL OFFICE-VI
              $('#division').prop('disabled', true);
              $('#sec_id').prop('disabled', true);
          }

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
                           text: item.div_acronym,
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
  

$(document).ready(function(){
  $("#position").change(function(){
      var pos_id = $(this).val();

      if (pos_id == "") {
          var pos_id = 0;
      } 
    
      $.ajax
      ({
          url: '/fetch-attendees/'+pos_id,
          type: 'post',
          dataType: 'json',
          success: function(response) {                    
           // $('#state').find('option:not(:first)').remove();
            

              if (response['roles'].length > 0) 
              {
                  $.each(response['roles'], function(key,value){
                      $("#role").append("<option value='"+value['emp_id']+"'>"+value['last_name']+ ', ' + value['first_name']+ ' ' +  value['middle_name']+"</option>")
                  });
                }


            
          }
      }); 
    
      

      
  });

});











    //delete schedule
    $(document).on('click','.delete_schedules',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
          title: trans("Are you sure to delete schedule ?"),
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
  
  