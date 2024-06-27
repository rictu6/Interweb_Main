<table>
    <thead>
        <tr>
            <td align="right" colspan="15" style="font-style: italic;">{{ __('Annex A.7') }}</td>
        </tr>
        <tr>
            <td align="center" colspan="15">{{ __('REPORT OF SEMI-EXPENDABLE PROPERTY ISSUED') }}</td>

        </tr>
        <tr></tr>
        <tr>
            <td align="left" colspan="5">{{ __('Entity Name:') }} </td>
            <td align="right" colspan="10">{{ __('Serial No.:___________________') }}</td>
        </tr>
        {{-- @foreach($regsepi as $prop) --}}
        <tr>
            <td align="left" colspan="5">{{ __('Fund Cluster:') }} </td>
            <td align="right" colspan="10" >{{ __('Date.:') }} </td>
        </tr>
        {{-- @endforeach --}}
        <tr>
            <th colspan="6">{{__('To be filled out by the Property and/or Supply Division/Unit')}}</th>
            <th colspan="2">{{__('To filled out by the Accounting Division/Unit')}}</th>

        </tr>
        <tr>
            <th >{{__('ICS No.')}}</th>
            <th >{{__('Responsibility Center Code')}}</th>
            <th >{{__('Semi-expendable Property No.')}}</th>
            <th >{{__('Item Description')}}</th>
            <th >{{__('Unit')}}</th>
            <th >{{__('Quantity Issued')}}</th>
            <th >{{__('Unit Cost')}}</th>
            <th >{{__('Amount')}}</th>

        </tr>

    </thead>
    <tbody>
        @foreach($rsepi as $prop)
        <tr>
            <td align="center">{{$prop->ics_rrsp_no}}</td>
            <td align="center">{{""}}</td>
            <td align="center">{{$prop->semi_expendable_property_no }}</td>
            <td align="center">{{$prop->item_description }}</td>
            <td align="center">{{"" }}</td>
            <td align="center">{{$prop->issued_qty}}</td>
            <td align="center">{{$prop->amount }}</td>
            <td align="center">{{$prop->amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
