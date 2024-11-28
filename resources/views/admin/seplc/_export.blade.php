<table>
    <thead>
        <tr>
            <td align="right" colspan="7" style="font-style: italic;">{{ __('Annex A.2') }}</td>
        </tr>
        <tr>
            <td align="center" colspan="7">{{ __('SEMI-EXPENDABLE PROPERTY LEDGER CARD') }}</td>

        </tr>
        <tr></tr>
        <tr>
            <td align="left" colspan="6">{{ __('Entity Name:') }} {{ $entityName }}</td>
            <td align="right" colspan="4">{{ __('Fund Cluster:___________________') }}</td>
        </tr>
        {{-- //@foreach($ics as $prop) --}}
        <tr>
            <td align="left" colspan="6">{{ __('Semi-expendable Property:___________________') }}</td>
            <td align="right" colspan="4">{{ __('Semi-expendable Property No.:___________________') }}</td>
        </tr>
        <tr>
            <td align="left" colspan="6">{{ __('Description:___________________') }}</td>
            <td  colspan="2">{{ __('UACS Object Code:___________________') }}</td>
            <td align="right" colspan="2">{{ __('Repair History:___________________') }}</td>
        </tr>
        {{-- @endforeach --}}
        <tr>
            <th rowspan="2">{{ __('Date') }}</th>
            <th rowspan="2">{{ __('Reference') }}</th>
            <th colspan="3">{{ __('Receipt') }}</th>
            <th rowspan="2">{{ __('Unit Cost') }}</th>
            <th rowspan="2">{{ __('Total cost') }}</th>
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
