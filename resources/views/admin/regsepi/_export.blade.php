
<table>
    <!-- Additional rows -->
    <tbody>
        <tr>
            <td align="right" colspan="8" style="font-style: italic;">{{__('Annex A.7')}}</td>

        </tr>
        <tr>
            <td align="center" colspan="8">{{__('REPORT OF SEMI-EXPENDABLE PROPERTY ISSUED')}}</td>
            <!-- Add other cells for the additional row -->
        </tr>
        <tr>
            <td  align="left" colspan="4">{{__('Entity Name:___________________')}}</td>
            <td   align="right" colspan="4">{{__('Fund Cluster:___________________')}}</td>
        </tr>
        <tr>
            <td  align="left" colspan="4">{{__('Serial No.:___________________')}}</td>
            <td   align="right" colspan="4">{{__('Date:_______________________')}}</td>
        </tr>
    </tbody>
    <!-- Data rows -->
    <thead>
        <tr>
         
            <th colspan="6">{{__('To be filled out by the Property and/or Supply Division Unit')}}</th>
            <th  width="250px" colspan="2">{{__('To be filled out by the Accounting Division/Unit')}}</th>
         
         
        </tr>
        <tr>
          
            <th >{{__('ICS/RRSP No.')}}</th>
             <th>{{__('Center Code')}}</th>
            <th>{{__('Semi-expendable Property No.')}}</th>
             <th>{{__('Item Description')}}</th>
              <th>{{__('Unit')}}</th>
                 <th>{{__('Qty Issued')}}</th>
            <th>{{__('Unit Cost')}}</th>
            <th>{{__('Amount')}}</th>
          
       
        </tr>
 
       
    </thead>
  
    <tbody>
        @foreach($regsepi as $prop)
        <tr>
          
            <td align="center">{{$prop->ics_rrsp_no}}</td>
             <td align="center">{{$prop->property_type }}</td>
            <td align="center">{{$prop->semi_expendable_property_no }}</td>
            <td align="center">{{$prop->item_description }}</td>
            <td align="center">{{$prop->property_type }}</td>
            <td align="center">{{$prop->issued_qty}}</td>
            <td align="center">{{$prop->property_type }}</td>
            <td align="center">{{$prop->amount }}</td>
          
        </tr>
        @endforeach
    </tbody>
     <tfoot>
  <tr>

    <td style="border-bottom:double black;" align="left" rowspan="3" colspan="6">{{__('')}}</td>
   
      <td style="border-bottom:double black;" align="right" rowspan="3" colspan="2">{{__('')}}</td>
    
  </tr>
 
</tfoot>

</table>
