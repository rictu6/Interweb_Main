<table>
    <thead>
        <tr>
            <td align="right" colspan="7" style="font-style: italic;">{{ __('Annex A.3') }}</td>
        </tr>
        <tr>
            <td align="center" colspan="7">{{ __('INVENTORY CUSTODIAN SLIP') }}</td>

        </tr>
        <tr></tr>
        <tr>
            <td align="left" colspan="4">{{ __('Entity Name:') }} {{ $entityName }}</td>

        </tr>
        {{-- //@foreach($ics as $prop) --}}
        <tr>
            <td align="left" colspan="4">{{ __('Fund Cluster:___________________') }}</td>
            <td align="right"  colspan="2">{{ __('ICS No:') }} </td>
            <
        </tr>
        {{-- @endforeach --}}

        <tr>
            <th rowspan="2">{{ __('Quantity') }}</th>
            <th rowspan="2">{{ __('Unit') }}</th>
            <th colspan="2">{{ __('Amount') }}</th>
            <th rowspan="2">{{ __('Description') }}</th>
            <th rowspan="2">{{ __('Item No.') }}</th>
            <th rowspan="2">{{ __('Estimated Useful Life') }}</th>

        </tr>
        <tr>

            <th>{{ __('Unit Cost') }}</th>
            <th>{{ __('Total Cost') }}</th>

        </tr>
    </thead>
    <tbody>
        @foreach($ics as $prop)
        <tr>
            <td align="center">
                @php
                    $qty = match($prop['status']) {
                        0 => $prop['issued_qty'],
                        1 => $prop['returned_qty'],
                        2 => $prop['re_issued_qty'],
                        default => 0,
                    };
                @endphp
                {{ $qty ? $qty : 'N/A' }}
            </td>
            <td align="center">{{  'N/A' }}</td>
            <td align="center">{{ $prop['amount'] ?? 'N/A' }}</td>
            <td align="center">
                @php
                    $amount = $prop['amount'] ?? 0;
                    $total_amount = $amount * $qty;
                @endphp
                {{ $total_amount ? $total_amount : 'N/A' }}
            </td>
            <td align="center">{{ $prop['item_description'] ?? 'N/A' }}</td>
            <td align="center">{{ $prop['ics_rrsp_no'] ?? 'N/A' }}</td>
            <td align="center">{{ $prop['estimated_useful_life'] ?? 'N/A' }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
