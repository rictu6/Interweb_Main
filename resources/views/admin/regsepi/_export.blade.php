<table>
<<<<<<< Updated upstream
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
          
       
=======
    <thead>
        <tr>
            <td align="right" colspan="15" style="font-style: italic;">{{ __('Annex A.1') }}</td>
        </tr>
        <tr>
            <td align="center" colspan="15">{{ __('REGISTRY OF SEMI-EXPENDABLE PROPERTY ISSUED') }}</td>

        </tr>
        <tr></tr>
        <tr>
            <td align="left" colspan="5">{{ __('Entity Name:') }} </td>
            <td align="right" colspan="10">{{ __('Fund Cluster:___________________') }}</td>
        </tr>
        {{-- @foreach($regsepi as $prop) --}}
        <tr>
            <td align="left" colspan="5">{{ __('Semi-expendable Property:') }} </td>
            <td align="right" colspan="10" >{{ __('Sheet No.:') }} </td>
        </tr>
        {{-- @endforeach --}}

        <tr>
            <th rowspan="2">{{__('Date')}}</th>
            <th colspan="2">{{__('Reference')}}</th>
            <th rowspan="2">{{__('Item Description')}}</th>
            <th rowspan="2">{{__('Estimated Useful Life')}}</th>
            <th colspan="2">{{__('Issued')}}</th>
            <th colspan="2">{{__('Returned')}}</th>
            <th colspan="2">{{__('Re-issued')}}</th>
            <th>{{__('Disposed')}}</th>
            <th>{{__('Balance')}}</th>
            <th rowspan="2">{{__('Amount')}}</th>
            <th rowspan="2">{{__('Remarks')}}</th>
        </tr>
        <tr>
            <th>{{__('ICS/RRSP No.')}}</th>
            <th>{{__('Semi-expendable Property No.')}}</th>
            <th>{{__('Issued Qty')}}</th>
            <th>{{__('Issued Office/Officer')}}</th>
            <th>{{__('Returned Qty')}}</th>
            <th>{{__('Returned Office/Officer')}}</th>
            <th>{{__('Re-Issued Qty')}}</th>
            <th>{{__('Re-Issued Office/Officer')}}</th>
            <th>{{__('Qty')}}</th>
            <th>{{__('Qty')}}</th>
>>>>>>> Stashed changes
        </tr>
 
       
    </thead>
  
    <tbody>
        @foreach($regsepi as $prop)
        <tr>
<<<<<<< Updated upstream
          
=======
            <td align="center">{{ date('Y-m-d', strtotime($prop['date_acquired'])) ?? 'N/A' }}</td>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
     <tfoot>
  <tr>

    <td style="border-bottom:double black;" align="left" rowspan="3" colspan="6">{{__('')}}</td>
   
      <td style="border-bottom:double black;" align="right" rowspan="3" colspan="2">{{__('')}}</td>
    
  </tr>
 
</tfoot>

=======
>>>>>>> Stashed changes
</table>
