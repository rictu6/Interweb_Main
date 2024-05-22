<table>
    <thead>
        <tr>
            <td align="right" colspan="15" style="font-style: italic;">{{ __('Annex A.4') }}</td>
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
        </tr>
    </thead>
    <tbody>
        @foreach($regsepi as $prop)
        <tr>
            <td align="center">{{ date('Y-m-d', strtotime($prop['date_acquired'])) ?? 'N/A' }}</td>
            <td align="center">{{$prop->ics_rrsp_no}}</td>
            <td align="center">{{$prop->semi_expendable_property_no }}</td>
            <td align="center">{{$prop->item_description }}</td>
            <td align="center">{{$prop->estimated_useful_life }}</td>
            <td align="center">{{$prop->issued_qty}}</td>
            <td align="center">{{$prop->issued_office }}</td>
            <td align="center">{{$prop->returned_qty }}</td>
            <td align="center">{{$prop->returned_office }}</td>
            <td align="center">{{$prop->re_issued_qty}}</td>
            <td align="center">{{$prop->re_issued_office}}</td>
            <td align="center">{{$prop->disposed_qty }}</td>
            <td align="center">{{$prop->balance_qty }}</td>
            <td align="center">{{$prop->amount }}</td>
            <td align="center">{{$prop->remarks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
